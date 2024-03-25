/**
 * Theme Scripts Child Theme
**/



jQuery(document).ready(function($) {
	//console.log('child script load');

    $('#wp-alphabet-listing').isotope({
    	sortBy: 'class',
    	layoutMode: 'vertical',
    	transitionDuration: '0'
    }).isotope( 'reloadItems' );

    $('#filters a').click(function(){
        var selector = '.' + $(this).attr('data-filter');

        $('#wp-alphabet-listing').isotope({ filter: selector });
  

        return false;
   });


    $('#filters a').click(function(){
        //console.log($( this ));
         $('#filters a').removeClass('is-checked');
         $( this ).addClass('is-checked');
    });

    $('.office-wrap').hide();
    $('.flags').click(function(e) {
       e.preventDefault();
       $expand = $(this).next('.office-wrap').toggle();

    });



}); 

