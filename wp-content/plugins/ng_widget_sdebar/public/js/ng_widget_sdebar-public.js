(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );


window.addEventListener('load', function(){

	(function(){
		var toggle = {

			main:function() {
				this.iterateAllArrowItems( this.getAllArrowItems() );
			},
			getAllArrowItems:function() {
				return ( document.querySelectorAll('.icon-drop-down') ? document.querySelectorAll('.icon-drop-down') : false );
			},
			iterateAllArrowItems:function(list) {
				if(list && list.length) {
					for( var i in list ){
						if(list[i].tagName == 'P') {
							this.addClickEvent(list[i]);
						}
					}
				}
			},
			addClickEvent:function(item){
				var _self = this;
				item.addEventListener('click', function(){
					var parentUL = this.closest('ul');
					if(parentUL) {
						if(parentUL.classList.contains('active')){
						   parentUL.classList.remove('active')
						}
						else{
						   parentUL.classList.add('active')
						}
					}
				});
			}

		}.main();
	})();
});