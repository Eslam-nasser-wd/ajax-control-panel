// Our custom js
$(document).ready(function(){
	
    // $('#sidebar').css('top', $('header').height())
    // Kill links
    $('a[href="#"]').on('click', function(event) {
        event.preventDefault();
    });
    // Fix Right side width and height
    function fixRightsidebarWidth(){
    	$('#rightSide').css({
	        position: 'relative',
	        left: $('aside').width()
	    });
    }
    fixRightsidebarWidth()
    $(window).resize(function(){
    	fixRightsidebarWidth()
    });
    
	
});