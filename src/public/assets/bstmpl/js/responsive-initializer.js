if (typeof window.hnm == 'undefined') {
	window.hnm = new function(){};
}

(function($, hnm) {
	var HnmInitializerManager = function() {
		this.initializers = new Array();
		this.lastInitializedClass = null;
		this.classesVisible = [];
		
		for (var i in this.resolutions) {
			this.classesVisible.push(this.resolutionToClassName(this.resolutions[i]));
		}
	};
	
	HnmInitializerManager.prototype.initHandlers = function() {
		var _obj = this;
		$(window).on('load', function() {
			_obj.runInitializersForCurrentClassVisible();
		});
		
		$(window).on('resize', function() {
			_obj.runInitializersForCurrentClassVisible();
		});		
	};
	
	HnmInitializerManager.prototype.resolutions = new Array("xs", "sm", "md", "lg", "xl");
	
	HnmInitializerManager.prototype.runInitializerListeners = function(classVisible) {
		for (var i in this.initializers) {
			this.initializers[i].initializeForClassVisible(classVisible);
		}
	};
	
	HnmInitializerManager.prototype.resolutionToClassName = function(resolution) {
		if (this.resolutions.indexOf(resolution) >= 0) {
			return "hnm-visible-" + resolution;
		}
		
		return null;
	};
	
	HnmInitializerManager.prototype.classNameToResolution = function(className) {
		var resolution = className.replace("hnm-visible-", "");
		if (this.resolutions.indexOf(resolution) >= 0) {
			return resolution;
		}
		
		return null;
	};
	
	HnmInitializerManager.prototype.determineCurrentClassVisible = function() {
		for (var i in this.classesVisible) {
			var jqElemDiv = jQuery("<div/>").addClass(this.classesVisible[i]);
			jQuery("body").append(jqElemDiv);
			if (jqElemDiv.is(":visible")) {
				jqElemDiv.remove();
				return this.classesVisible[i];
			}
			jqElemDiv.remove();
		}
		return null;
	};
	
	HnmInitializerManager.prototype.runInitializersForCurrentClassVisible = function() {
		var currentClassVisible = this.determineCurrentClassVisible();
		
		if (currentClassVisible == this.lastInitializedClass) return;
		this.lastInitializedClass = currentClassVisible;
		
		
		this.runInitializerListeners(currentClassVisible);
	};
	
	HnmInitializerManager.prototype.addInitializer = function(initializer) {
		initializer.initializeForClassVisible(this.determineCurrentClassVisible());
		this.initializers.push(initializer);
	};
	
	hnm.initializerManager = new HnmInitializerManager();
	
	var HnmInitializer = function(defaultListener, runOnClassChange) {
		this.runOnClassChange = runOnClassChange || true;
		this.lastListener = null;
		this.defaultListener = defaultListener;
		this.listeners = new Object();
		this.lastClassVisible = null;
	};
	
	HnmInitializer.prototype.addListenerForClassVisible = function(classVisible, listener) {
		this.listeners[classVisible] = listener;
	};
	
	
	HnmInitializer.prototype.addListenerForResolution = function(resolution, listener) {
		var classVisible = hnm.initializerManager.resolutionToClassName(resolution);
		if (null === classVisible) return;
		
		this.listeners[classVisible] = listener;
	};
	
	HnmInitializer.prototype.initializeForClassVisible = function(classVisible) {
		if (this.lastClassVisible === classVisible) return;
		var listener = this.getListenerForClassVisible(classVisible)
		if (!(listener)) {
			listener = this.defaultListener;
		} 
		if (listener && (this.runOnClassChange || (this.lastListener !== listener))) {
			this.lastListener = listener;
			this.lastClassVisible = classVisible;
			listener(hnm.initializerManager.classNameToResolution(classVisible), classVisible);
		}
	};
	
	HnmInitializer.prototype.initializeForCurrentClassVisible = function() {
		this.initializeForClassVisible(hnm.initializerManager.determineCurrentClassVisible());
	};
	
	HnmInitializer.prototype.getListenerForClassVisible = function(classVisible) {
		if (classVisible == null) {
			return null;
		}
		var listener = null;
		if (this.listeners.hasOwnProperty(classVisible)) {
			listener = this.listeners[classVisible];
		} else {
			listener = this.getListenerForClassVisible(this.getNextClassVisible(classVisible));
		}
		return listener;
	};
	
	HnmInitializer.prototype.getNextClassVisible = function(classVisible) {
		var nextClassVisible = null;
		var takeNext = false;
		for (var index in hnm.initializerManager.classesVisible) {
			if (takeNext) {
				nextClassVisible = hnm.initializerManager.classesVisible[index];
				break;
			}
			if (hnm.initializerManager.classesVisible[index] == classVisible) {
				takeNext = true;
			}
		}
		return nextClassVisible;
	};
	
	HnmInitializer.prototype.getPrevClassVisible = function(classVisible) {
		var prevClassVisible = null;
		for (var index in hnm.initializerManager.classesVisible) {
			if (hnm.initializerManager.classesVisible[index] == classVisible) {
				return prevClassVisible;
			}
			prevClassVisible = hnm.initializerManager.classesVisible[index];
		}
		return null;
	};
	
	HnmInitializer.prototype.getPrevResolution = function(resolution) {
		var prevClassVisible = this.getPrevClassVisible(hnm.initializerManager.resolutionToClassName(resolution));
		if (null === prevClassVisible) return null;
		
		return hnm.initializerManager.classNameToResolution(prevClassVisible)
	};
	
	hnm.Initializer = HnmInitializer;
	hnm.initializerManager.initHandlers();
})(jQuery, window.hnm);