// Our custom js
$(document).ready(function(){
	
	$('.Slider').owlCarousel({
        loop:true,
        margin:10,
        autoplay: true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
	
	$(".owl-next").html("<i class='fa fa-chevron-right'></i>");
    $(".owl-prev").html("<i class='fa fa-chevron-left'></i>");
	
	//
    
    $(".scrolltop").click(function(){
        $("html,body").animate({ scrollTop:0} , 600)
    });
	
});





