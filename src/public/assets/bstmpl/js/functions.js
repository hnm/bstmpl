jQuery(document).ready(function($) {
	
	(function() {
        var jqElemExpandNav = $(".expand-nav");
        if (0 === jqElemExpandNav) return;
       
        ExpandNavItem = function(jqElemLi, jqElemNav) {
            this.isOpen = false;
            this.jqElem = jqElemLi;
            this.jqElemChildUl = this.jqElem.children("ul:first").hide();
            this.jqElemA = this.jqElem.children("a:first").css({
                "position": "relative"
            });
            this.jqElemToggler = $("<span/>").appendTo(this.jqElemA);
            this.jqElemToggler.addClass(jqElemNav.data("child-toggler-class"));
            var _that = this;
           
            if (this.jqElem.hasClass("open") || (this.jqElemChildUl.find('li.active').length > 0)) {
                this.openSubNavi();
            };
           
            this.jqElemToggler.click(function(e){
                e.preventDefault();
                if (_that.isOpen) {
                    _that.closeSubNavi();
                } else {
                    _that.openSubNavi();
                }
            });
        };
       
        ExpandNavItem.prototype.openSubNavi = function(instantly) {
            if (instantly) {
                this.jqElemChildUl.stop(true, true).show();
            } else {
                this.jqElemChildUl.stop(true, true).slideDown();
            }
            this.jqElemToggler.addClass("is-open");
            this.isOpen = true;
        };
        ExpandNavItem.prototype.closeSubNavi = function(instantly) {
            if (instantly) {
                this.jqElemChildUl.stop(true, true).hide();
            } else {
                this.jqElemChildUl.stop(true, true).slideUp();
            }
            this.jqElemToggler.removeClass("is-open");
            this.isOpen = false;
        };
       
        ExpandNav = function(jqElemNav) {
            this.jqElem = jqElemNav.hide();
            this.jqElemToggler = $(this.jqElem.data('toggler-ref'));
            this.jqElemLiHasChildren = this.jqElem.find(".has-children");
            var _that = this;
           
            this.jqElemToggler.click(function(e) {
            	e.preventDefault();
            	_that.jqElem.slideToggle("fast");
            	_that.jqElemToggler.toggleClass("open");
            });
            
            this.jqElemLiHasChildren.each(function() {
                var expandLimit = _that.jqElem.data("expand-limit") || null;
                if (expandLimit && $(this).hasClass(expandLimit)) return false;
                new ExpandNavItem($(this), jqElemNav);
            });
        };
       
        new ExpandNav(jqElemExpandNav);
    })();


	(function() {
		var jqElemCookieBanner = $(".bstmpl-cookie-banner");
		if (jqElemCookieBanner.length === 0) return;
		
		var setCookie = function(name, value, hours) {
			var expires, date;
		    if (hours) {
		        date = new Date();
		        date.setTime(date.getTime() + (hours * 60 * 60 * 1000));
		        expires = "; expires=" + date.toGMTString();
		    } else {
		    	expires = "";
		    }
		    document.cookie = name + "=" + value + expires + "; path=/";
		};
		
		var CookieBanner = function(jqElem) {
			var cookieAnalyticsAccepted = jqElem.data("cookie-analytics-accepted");
			var cookieSaved = 'cookies-saved';
			if (getCookie(cookieAnalyticsAccepted) || getCookie(cookieSaved)) {
				return;
			}
			jqElem.removeClass("d-none");
			
			var jqElemAnalytics = jqElem.find('#bstmpl-external-cookies');
			this.jqElemBtn = jqElem.find(".btn-save-cookie").click(function() {
				setCookie(cookieAnalyticsAccepted, jqElemAnalytics.prop('checked'));
				//30 Tage = 30 * 24 Stunden = 720
				setCookie(cookieSaved, true, 720);
				jqElem.hide();
				window.location.reload();
			});
		};
		
		new CookieBanner(jqElemCookieBanner);
	})();
	
	
	(function() {
		
		var jqElemsResponsiveBgImages = $('.cover-bg-image');
		if (jqElemsResponsiveBgImages.length === 0) return;
		
		var ResponsiveBgImage = function(jqElem) {
			this.jqElem = jqElem;
			this.jqElemImg = jqElem.find("img:first");
			if (this.jqElemImg.length === 0) return; 
			this.src = '';
			
			(function(_obj) {
				this.jqElem.css({
					"background-color": "green",
					"background-size": "cover",
					"background-position": "center center",
					"background-repeat": "no-repeat",
					"min-height": "200px",
					"min-width": "200px"
				});
				this.jqElemImg.css({
					"display": "none"
				});
				_obj.jqElemImg.on('load', function() {
					_obj.update();
				});
					
				if (_obj.jqElemImg.complete) {
					_obj.update();
				};
				
			}).call(this, this);
		};
		
		ResponsiveBgImage.prototype.update = function() {
			
			
			var src = typeof this.jqElemImg.prop('currentSrc') !== 'undefined' ? this.jqElemImg.prop('currentSrc') : this.jqElemImg.prop('src');
	        if (this.src !== src) {
	            this.src = src;
	            this.jqElem.css({
	            	'background-image': 'url("' + this.src + '")'
	            	});
            }
		};
		
		jqElemsResponsiveBgImages.each(function() {
			new ResponsiveBgImage($(this));
			
		});
	})();
	
	
//	(function() {
//		var jqElemsTmplExpandingNav = $(".tmpl-expanding-navi"),
//			jqElemHtml = $("html");
//		if (0 == jqElemsTmplExpandingNav.length) return;
//
//		WebMobileNavManager = function() {
//			this.webMobileNavs = [];
//			this.currentNav = null;
//		}
//
//		WebMobileNavManager.prototype.addNav = function(webMobileNav) {
//			this.webMobileNavs.push(webMobileNav);
//		}
//		
//		WebMobileNavManager.prototype.setCurrentNav = function(webMobileNav) {
//			this.currentNav = webMobileNav;
//		}
//		
//		WebMobileNavManager.prototype.getCurrentNav = function() {
//			return this.currentNav;
//		}
//		
//		WebMobileNavManager.prototype.closeCurrentNav = function(speed) {
//			this.currentNav.closeNav(speed);
//		}
//		
//		WebMobileNavManager.prototype.removeCurrentNav = function() {
//			this.currentNav = null;
//		}
//		
//		WebMobileNavManager.prototype.isOtherNavOpen = function (webMobileNav) {
//			return this.currentNav !== null && this.currentNav !== webMobileNav;
//		}
//
//		WebMobileNavEntry = function(jqElem) {
//			this.jqElem = jqElem.css({
//				"position": "relative"
//			}).addClass('web-mobile-nav-expandable-li');
//			this.jqElemA = jqElem.children("a:first").addClass("web-mobile-nav-expandable-link");
//			this.jqElemSpanChildsToggler = $("<span/>", {"class": "nav-more-btn"}).appendTo(this.jqElemA);
//			this.jqElemUlChilds = this.jqElemA.next().hide();
//			
//			(function(_obj) {
//				if (this.jqElemA.parent().hasClass("open") || (this.jqElemUlChilds.find('li.active').length > 0)) {
//					this.jqElemUlChilds.show();
//				};
//				
//				this.jqElemSpanChildsToggler.click(function(e) {
//					e.preventDefault();
//					_obj.jqElemUlChilds.slideToggle("fast");
//					_obj.jqElemSpanChildsToggler.toggleClass("open");
//				});
//			}).call(this, this);
//		};
//
//		WebMobileNav = function(jqElem, manager) {
//			this.jqElem = jqElem.hide();
//			this.manager = manager;
//			this.isOpen = false;
//			this.isExpandable = this.jqElem.data('expandable') || false;
//			this.jqElemToggler = $(this.jqElem.data('toggler-ref'));
//			this.jqElemsLiWithChilds = this.jqElem.find("li.has-children.level-1");
//			
//			(function(_obj) {
//				if (_obj.isExpandable) {
//					_obj.jqElem.addClass("web-mobile-nav-expandable");
//					_obj.applyExpandableChildren();
//				} 
//				
//				this.jqElemToggler.click(function(e) {
//					e.preventDefault();
//					var speed = null;
//					if (_obj.manager.isOtherNavOpen(_obj)) {
//						speed = 1;
//						_obj.manager.closeCurrentNav(speed);
//					}
//					if (_obj.isOpen) {
//						_obj.closeNav(speed);
//					} else {
//						_obj.openNav(speed);
//						_obj.manager.setCurrentNav(_obj);
//						
//					}
//				});
//				
//				this.manager.addNav(_obj);
//				
//				
//			}).call(this, this);
//			
//		};
//		
//		WebMobileNav.prototype.applyExpandableChildren = function() {
//			var _obj = this;
//			this.jqElemsLiWithChilds.each(function() {
//				if ($(this).find("ul:first").children().length > 0) {
//					new WebMobileNavEntry($(this));
//				}
//			});
//		}
//
//		WebMobileNav.prototype.closeNav = function(speed) {
//			var speed = speed || WebMobileNav.DEFAULT_TOGGLE_SPEED;
//			this.jqElemToggler.removeClass("open");
//			this.jqElem.stop(true, true).slideUp(speed);
//			this.manager.removeCurrentNav();
//			this.isOpen = false;
//		}
//
//		WebMobileNav.prototype.openNav = function(speed) {
//			var speed = speed || WebMobileNav.DEFAULT_TOGGLE_SPEED;
//			this.jqElemToggler.addClass("open");
//			this.jqElem.stop(true, true).slideDown(speed);
//			this.isOpen = true;
//		}
//
//		WebMobileNav.TOGGLE_OPEN_CLASS = "open";
//		WebMobileNav.DEFAULT_TOGGLE_SPEED = 200;
//
//		var webMobileNavManager = new WebMobileNavManager();
//
//		jqElemsTmplExpandingNav.each(function() {
//			webMobileNav = new WebMobileNav($(this), webMobileNavManager);
//		});
//	})();
	
//	(function() {
//		var jqElemsPriorityNav = $(".priority-nav");
//		if (jqElemsPriorityNav.length === 0) return;
//		
//		PriorityNav = function(jqElem) {
//			this.jqElem = jqElem.css({
//				"white-space": "nowrap"
//			});
//			this.jqElemUl = jqElem.find("ul:first").css({
//				"white-space": "nowrap",
//				"position": "relative",
//				"overflow": "hidden"
//			});
//			this.jqElemLis = this.jqElemUl.children("li");
//			this.jqElemLisClones = null;
//			this.jqElemTogglerContainer = $("<div/>", {"class": "priority-nav-toggler-container"}).appendTo(this.jqElem);
//			this.jqElemToggler = $("<a/>", {"href": "#","text": jqElem.data("toggle-txt")}).css({
//				"text-decoration": "none",
//				"cursor": "pointer",
//				"position": "absolute",
//				"background": "white",
//				"border": "1px solid #e9e9e9",
//				"padding": "0px 10px",
//				"display": "flex",
//				"justify-content": "center",
//				"align-items": "center",
//				"height": this.jqElemUl.height() + "px",
//				"right": "0px",
//				"top": "0px"
//			}).hide().appendTo(this.jqElemTogglerContainer);
//			this.jqElemUlHidden = $("<ul/>", {"class": "priority-hidden-nav"}).css({
//				"position": "absolute",
//				"z-index": "400",
//				"background": "white",
//				"border":	"1px solid #e9e9e9",
//				"box-shadow": "2px 2px 3px rgba(0,0,0,0.25)",
//				"bottom": "0px",
//				"right": "0px",
//				"transform": "translateY(100%)"
//			}).hide().appendTo(this.jqElemTogglerContainer);
//			this.hiddenNavOpen = false;
//			this.jqElemLast = this.jqElemLis.last();
//			this.applyReferences();
//			this.baseWidth = jqElem.width();
//			this.smallWidth = this.baseWidth - this.jqElemToggler.outerWidth();
//			(function(_obj) {
//				
//				$("html body").click(function() {
//					if (_obj.hiddenNavOpen) {
//						_obj.hideHiddenNav();
//					}
//				});
//				
//				$(document).keyup(function(e) {
//				     if (e.keyCode == 27) {
//				    	 if (_obj.hiddenNavOpen) {
//							_obj.hideHiddenNav();
//						}
//				    }
//				});
//				
//				_obj.jqElemUlHidden.click(function(e) {
//					e.stopPropagation();
//				});
//				
//				_obj.jqElemToggler.click(function(e) {
//					e.preventDefault();
//					e.stopPropagation();
//					if (_obj.hiddenNavOpen) {
//						_obj.hideHiddenNav();
//					} else {
//						_obj.showHiddenNav();
//						console.log();
//					}
//				});
//				
//				$(window).resize(function() {
//					if (_obj.isElemOutOfBounds(_obj.jqElemLast)) {
//						_obj.jqElemToggler.show();
//					} else {
//						_obj.jqElemToggler.hide();
//					}
//					
//					if (_obj.jqElemUlHidden.children(':visible').length === 0) {
//						_obj.jqElemUlHidden.hide();
//					}
//					  _obj.UpdateWidths();
//					  
//					  _obj.jqElemUl.children("li").each(function() {
//						  var jqElemLi = $(this);
//						  if (_obj.isElemOutOfBounds(jqElemLi)) {
//							  jqElemLi.css({"opacity": "0","visibility": "hidden"});
//							  _obj.jqElemLisClones.each(function() {
//								  var liClone = $(this);
//								  if (liClone.data("priority-nav-ref-id") == jqElemLi.data("priority-nav-ref-id")) {
//									  liClone.show();
//								  }
//							  });
//						  } else {
//							  jqElemLi.css({"opacity": "1","visibility": "visible"});
//							  _obj.jqElemLisClones.each(function() {
//								  var liClone = $(this);
//								  if (liClone.data("priority-nav-ref-id") == jqElemLi.data("priority-nav-ref-id")) {
//									  liClone.hide();
//								  }
//							  });
//						  }
//					  });
//					});
//				
//				$(window).resize();
//				
//			}).call(this, this);
//		}
//		
//		PriorityNav.prototype.applyReferences = function() {
//			var num = 1;
//			this.jqElemLis.each(function() {
//				$(this).attr("data-priority-nav-ref-id", num);
//				num++;
//			});
//			
//			this.jqElemLisClones = this.jqElemLis.clone();
//			this.jqElemLisClones.hide().appendTo(this.jqElemUlHidden);
//		};
//		
//		PriorityNav.prototype.showHiddenNav = function() {
//			this.jqElemUlHidden.stop(true, true).fadeIn("fast");
//			this.hiddenNavOpen = true;
//		};
//		
//		PriorityNav.prototype.hideHiddenNav = function() {
//			this.jqElemUlHidden.stop(true, true).fadeOut("fast");
//			this.hiddenNavOpen = false;
//		};
//		
//		PriorityNav.prototype.UpdateWidths = function () {
//			this.baseWidth = this.jqElem.width();
//			this.smallWidth = this.baseWidth - this.jqElemToggler.outerWidth();
//		};
//		
//		PriorityNav.prototype.isElemLastElem = function(jqElem) {
//			return (this.jqElemLast.data("priority-nav-ref-id") == jqElem.data("priority-nav-ref-id"));
//		}
//		
//		PriorityNav.prototype.isElemOutOfBounds = function(jqElem) {
//			if (this.isElemLastElem(jqElem)) {
//				return this.baseWidth < (jqElem.position().left + jqElem.width());				
//			} else {
//				return this.smallWidth < (jqElem.position().left + jqElem.width());
//			}
//		}
//		
//		jqElemsPriorityNav.each(function(){
//			new PriorityNav($(this));
//		});
//	})();
	
	
// 	Fancybox-2 
//	(function() {
//		var jqElemFancyBoxAs = $(".fancybox");
//		if (jqElemFancyBoxAs.length === 0) return;
//		
//		jqElemFancyBoxAs.fancybox({
//				openEffect	: 'elastic',
//				closeEffect	: 'elastic',
//				mouseWheel : true,
//				margin: 50,
//				helpers: {
//					title : {
//						type : 'inside' // 'float', 'inside', 'outside' or 'over'
//					}
//				},
//				beforeShow: function () {
//			        $(".fancybox-image:first").attr("srcset", $(this.element).data("src-set")).attr("sizes", $(this.element).data("sizes"));
//				}
//		});
//	})();
	
});
