jQuery(document).ready(function($) {
	
	(function() {
		var jqElemsTmplExpandingNav = $(".tmpl-expanding-navi"),
			jqElemHtml = $("html");
		if (0 == jqElemsTmplExpandingNav.length) return;

		WebMobileNavManager = function() {
			this.webMobileNavs = [];
			this.currentNav = null;
		}

		WebMobileNavManager.prototype.addNav = function(webMobileNav) {
			this.webMobileNavs.push(webMobileNav);
		}
		
		WebMobileNavManager.prototype.setCurrentNav = function(webMobileNav) {
			this.currentNav = webMobileNav;
		}
		
		WebMobileNavManager.prototype.getCurrentNav = function() {
			return this.currentNav;
		}
		
		WebMobileNavManager.prototype.closeCurrentNav = function(speed) {
			this.currentNav.closeNav(speed);
		}
		
		WebMobileNavManager.prototype.removeCurrentNav = function() {
			this.currentNav = null;
		}
		
		WebMobileNavManager.prototype.isOtherNavOpen = function (webMobileNav) {
			return this.currentNav !== null && this.currentNav !== webMobileNav;
		}

		WebMobileNavEntry = function(jqElem) {
			this.jqElem = jqElem.css({
				"position": "relative"
			}).addClass('web-mobile-nav-expandable-li');
			this.jqElemA = jqElem.children("a:first").addClass("web-mobile-nav-expandable-link");
			this.jqElemSpanChildsToggler = $("<span/>", {"class": "nav-more-btn"}).appendTo(this.jqElemA);
			this.jqElemUlChilds = this.jqElemA.next().hide();
			
			(function(_obj) {
				if (this.jqElemA.parent().hasClass("open") || (this.jqElemUlChilds.find('li.active').length > 0)) {
					this.jqElemUlChilds.show();
				};
				
				this.jqElemSpanChildsToggler.click(function(e) {
					e.preventDefault();
					_obj.jqElemUlChilds.slideToggle("fast");
					_obj.jqElemSpanChildsToggler.toggleClass("open");
				});
			}).call(this, this);
		};

		WebMobileNav = function(jqElem, manager) {
			this.jqElem = jqElem.hide();
			this.manager = manager;
			this.isOpen = false;
			this.isExpandable = this.jqElem.data('expandable') || false;
			this.jqElemToggler = $(this.jqElem.data('toggler-ref'));
			this.jqElemsLiWithChilds = this.jqElem.find("li.has-children.level-1");
			
			(function(_obj) {
				if (_obj.isExpandable) {
					_obj.jqElem.addClass("web-mobile-nav-expandable");
					_obj.applyExpandableChildren();
				} 
				
				this.jqElemToggler.click(function(e) {
					e.preventDefault();
					var speed = null;
					if (_obj.manager.isOtherNavOpen(_obj)) {
						speed = 1;
						_obj.manager.closeCurrentNav(speed);
					}
					if (_obj.isOpen) {
						_obj.closeNav(speed);
					} else {
						_obj.openNav(speed);
						_obj.manager.setCurrentNav(_obj);
						
					}
				});
				
				this.manager.addNav(_obj);
				
				
			}).call(this, this);
			
		};
		
		WebMobileNav.prototype.applyExpandableChildren = function() {
			var _obj = this;
			this.jqElemsLiWithChilds.each(function() {
				if ($(this).find("ul:first").children().length > 0) {
					new WebMobileNavEntry($(this));
				}
			});
		}

		WebMobileNav.prototype.closeNav = function(speed) {
			var speed = speed || WebMobileNav.DEFAULT_TOGGLE_SPEED;
			this.jqElemToggler.removeClass("open");
			this.jqElem.stop(true, true).slideUp(speed);
			this.manager.removeCurrentNav();
			this.isOpen = false;
		}

		WebMobileNav.prototype.openNav = function(speed) {
			var speed = speed || WebMobileNav.DEFAULT_TOGGLE_SPEED;
			this.jqElemToggler.addClass("open");
			this.jqElem.stop(true, true).slideDown(speed);
			this.isOpen = true;
		}

		WebMobileNav.TOGGLE_OPEN_CLASS = "open";
		WebMobileNav.DEFAULT_TOGGLE_SPEED = 200;

		var webMobileNavManager = new WebMobileNavManager();

		jqElemsTmplExpandingNav.each(function() {
			webMobileNav = new WebMobileNav($(this), webMobileNavManager);
		});
	})();
	
	(function() {
		var jqElemsPriorityNav = $(".priority-nav");
		if (jqElemsPriorityNav.length === 0) return;
		
		PriorityNav = function(jqElem) {
			this.jqElem = jqElem.css({
				"white-space": "nowrap"
			});
			this.jqElemUl = jqElem.find("ul:first").css({
				"white-space": "nowrap",
				"position": "relative",
				"overflow": "hidden"
			});
			this.jqElemLis = this.jqElemUl.children("li");
			this.jqElemLisClones = null;
			this.jqElemTogglerContainer = $("<div/>", {"class": "priority-nav-toggler-container"}).appendTo(this.jqElem);
			this.jqElemToggler = $("<a/>", {"href": "#","text": jqElem.data("toggle-txt")}).css({
				"text-decoration": "none",
				"cursor": "pointer",
				"position": "absolute",
				"background": "white",
				"border": "1px solid #e9e9e9",
				"padding": "0px 10px",
				"display": "flex",
				"justify-content": "center",
				"align-items": "center",
				"height": this.jqElemUl.height() + "px",
				"right": "0px",
				"top": "0px"
			}).hide().appendTo(this.jqElemTogglerContainer);
			this.jqElemUlHidden = $("<ul/>", {"class": "priority-hidden-nav"}).css({
				"position": "absolute",
				"z-index": "400",
				"background": "white",
				"border":	"1px solid #e9e9e9",
				"box-shadow": "2px 2px 3px rgba(0,0,0,0.25)",
				"bottom": "0px",
				"right": "0px",
				"transform": "translateY(100%)"
			}).hide().appendTo(this.jqElemTogglerContainer);
			this.hiddenNavOpen = false;
			this.jqElemLast = this.jqElemLis.last();
			this.applyReferences();
			this.baseWidth = jqElem.width();
			this.smallWidth = this.baseWidth - this.jqElemToggler.outerWidth();
			(function(_obj) {
				
				$("html body").click(function() {
					if (_obj.hiddenNavOpen) {
						_obj.hideHiddenNav();
					}
				});
				
				$(document).keyup(function(e) {
				     if (e.keyCode == 27) {
				    	 if (_obj.hiddenNavOpen) {
							_obj.hideHiddenNav();
						}
				    }
				});
				
				_obj.jqElemUlHidden.click(function(e) {
					e.stopPropagation();
				});
				
				_obj.jqElemToggler.click(function(e) {
					e.preventDefault();
					e.stopPropagation();
					if (_obj.hiddenNavOpen) {
						_obj.hideHiddenNav();
					} else {
						_obj.showHiddenNav();
						console.log();
					}
				});
				
				$(window).resize(function() {
					if (_obj.isElemOutOfBounds(_obj.jqElemLast)) {
						_obj.jqElemToggler.show();
					} else {
						_obj.jqElemToggler.hide();
					}
					
					if (_obj.jqElemUlHidden.children(':visible').length === 0) {
						_obj.jqElemUlHidden.hide();
					}
					  _obj.UpdateWidths();
					  
					  _obj.jqElemUl.children("li").each(function() {
						  var jqElemLi = $(this);
						  if (_obj.isElemOutOfBounds(jqElemLi)) {
							  jqElemLi.css({"opacity": "0","visibility": "hidden"});
							  _obj.jqElemLisClones.each(function() {
								  var liClone = $(this);
								  if (liClone.data("priority-nav-ref-id") == jqElemLi.data("priority-nav-ref-id")) {
									  liClone.show();
								  }
							  });
						  } else {
							  jqElemLi.css({"opacity": "1","visibility": "visible"});
							  _obj.jqElemLisClones.each(function() {
								  var liClone = $(this);
								  if (liClone.data("priority-nav-ref-id") == jqElemLi.data("priority-nav-ref-id")) {
									  liClone.hide();
								  }
							  });
						  }
					  });
					});
				
				$(window).resize();
				
			}).call(this, this);
		}
		
		PriorityNav.prototype.applyReferences = function() {
			var num = 1;
			this.jqElemLis.each(function() {
				$(this).attr("data-priority-nav-ref-id", num);
				num++;
			});
			
			this.jqElemLisClones = this.jqElemLis.clone();
			this.jqElemLisClones.hide().appendTo(this.jqElemUlHidden);
		};
		
		PriorityNav.prototype.showHiddenNav = function() {
			this.jqElemUlHidden.stop(true, true).fadeIn("fast");
			this.hiddenNavOpen = true;
		};
		
		PriorityNav.prototype.hideHiddenNav = function() {
			this.jqElemUlHidden.stop(true, true).fadeOut("fast");
			this.hiddenNavOpen = false;
		};
		
		PriorityNav.prototype.UpdateWidths = function () {
			this.baseWidth = this.jqElem.width();
			this.smallWidth = this.baseWidth - this.jqElemToggler.outerWidth();
		};
		
		PriorityNav.prototype.isElemLastElem = function(jqElem) {
			return (this.jqElemLast.data("priority-nav-ref-id") == jqElem.data("priority-nav-ref-id"));
		}
		
		PriorityNav.prototype.isElemOutOfBounds = function(jqElem) {
			if (this.isElemLastElem(jqElem)) {
				return this.baseWidth < (jqElem.position().left + jqElem.width());				
			} else {
				return this.smallWidth < (jqElem.position().left + jqElem.width());
			}
		}
		
		jqElemsPriorityNav.each(function(){
			new PriorityNav($(this));
		});
	})();
	
	(function() {
		var jqElemFancyBoxAs = $(".fancybox");
		if (jqElemFancyBoxAs.length === 0) return;
		
		jqElemFancyBoxAs.fancybox({
				openEffect	: 'elastic',
				closeEffect	: 'elastic',
				mouseWheel : true,
				margin: 50,
				helpers: {
					title : {
						type : 'inside' // 'float', 'inside', 'outside' or 'over'
					}
				},
				beforeShow: function () {
			        $(".fancybox-image:first").attr("srcset", $(this.element).data("src-set")).attr("sizes", $(this.element).data("sizes"));
				}
		});
	})();
	
});