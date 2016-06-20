/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	
	
	
	
	// Flexslider
	// front page slider 
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	
	
	/*// Colorbox for frame
	$('a.frame').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});*/
	
	
	// Colorbox for Single Portfolio
		$('a.gallery').colorbox({
			rel:'gal',
			width: '80%', 
			height: '80%',
			inline:true,
		});
	
	
	
	
	
	
	//Isotope with images loaded ...
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options

	 itemSelector: '.item',
		  masonry: {
			gutter: 30
			}
 		 });
	});
	
	// filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };
  // bind filter button click
  $('#filters').on( 'click', 'button', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $container.isotope({ filter: filterValue });
  });
  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });
	
	
	// Equal heights divs
	$('.blocks').matchHeight();
	
	// Paralax
	skrollr.init({
    	forceHeight: false,
		 mobileCheck: function() {
                //hack - forces mobile version to be off
                return false;
            }
		
	});
	
		// Make active current page
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	
	});
	
	if ( document.location.href.indexOf('website-design-development') > -1 ) {
        $('li#menu-item-26 a').addClass("active");
    }
	if ( document.location.href.indexOf('staff') > -1 ) {
        $('li#menu-item-20 a').addClass("active");
    }
	if ( document.location.href.indexOf('digital-marketing-services') > -1 ) {
        $('li#menu-item-22 a').addClass("active");
    }

});// END #####################################    END