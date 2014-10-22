(function($){
  Drupal.behaviors.lazy_image_loader = function(context){
    $(function() { 
	  $(Drupal.settings.lazy_image_loader_classes).lazyload({
	    threshhold: Drupal.settings.lazy_image_loader_threshold,
	    placeholder: Drupal.settings.lazy_image_loader_placeholder,
	    event: Drupal.settings.lazy_image_loader_event,
	    effect: Drupal.settings.lazy_image_loader_effect,
	    failurelimit: Drupal.settings.lazy_image_loader_failurelimit
	  });
    });
  };
})(jQuery);