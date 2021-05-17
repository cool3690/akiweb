//3D輪播p1-1
$(document).ready(function(){
	var slideImages = [
		{src: 'images/e1.jpg'},
	    {src: 'images/e2.jpg'},
	    {src: 'images/e3.jpg'},
	    {src: 'images/e5.jpg'} 
	]
	//var jR3DCarousel;
	
	jR3DCarousel = $('.jR3DCarouselGallery').jR3DCarousel({
		width: 1920, 		/* largest allowed width */
		height: 1280, 		/* largest allowed height */
		slides: slideImages /* array of images source */
	});

})

//3D輪播p1-2
$(document).ready(function(){
	var slideImages = [
		{src: 'picture/1/1.jpg'},
	    {src: 'picture/1/2.jpg'},
	    {src: 'images/e3.jpg'},
	    {src: 'images/e5.jpg'} 
	]
	//var jR3DCarousel;
	
	jR3DCarousel = $('.jR3DCarouselGallery2').jR3DCarousel({
		width: 1920, 		/* largest allowed width */
		height: 1280, 		/* largest allowed height */
		slides: slideImages /* array of images source */
	});

})


//3D輪播p1-2
$(document).ready(function(){
	var slideImages = [
		{src: 'picture/1/1.jpg'},
	    {src: 'picture/1/2.jpg'},
	    {src: 'images/e3.jpg'},
	    {src: 'images/e5.jpg'} 
	]
	//var jR3DCarousel;
	
	jR3DCarousel = $('.jR3DCarouselGallery3').jR3DCarousel({
		width: 1920, 		/* largest allowed width */
		height: 1280, 		/* largest allowed height */
		slides: slideImages /* array of images source */
	});

})
// $(function() {
    // $('.dropdown-toggle').mouseover(function() {
        // $(this).next('.dropdown-menu').slideDown(500);
    // });
    // $('.dropdown-toggle').mouseout(function() {
        // $(this).next('.dropdown-menu').slideUp(500);
    // });	
// });