  var swiper = new Swiper(".mySwiper", {
	    loop: true,
            effect: "fade",
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '" ><div class="block-one-pagination"><div class="btn-pagination bardiap"   id="bar'+index+'" ></div><div class="load-text">' + jQuery("#diap"+index).data("title")+ "</div></div></span>";
			console.log("text");
          },
        },
      });
	  jQuery(document).ready(function() {
	barlong =  jQuery(".btn-pagination").parent().width();
	console.log(barlong);
    var maxWidth = barlong;
    var duration = 10000;
    var $log = jQuery('#log');
    var $start = jQuery('#start');
    var $stop = jQuery('#stop');
    var timer;
	
	function regularprogressbar(elem){
	 //  console.log("enter"+elem);
	    var $bar = jQuery('#bar'+elem);
        var barTest = jQuery('#bar'+elem).parent().width();
        console.log("hbar 2 test "+barTest);
        //Horloge(barTest); 
    
        timer = setInterval(barTest, 1000);

        $bar.animate({
            width: barTest*10
        }, duration, function() {
            
			 var $bar0 = jQuery('.btn-pagination');
           // $bar0.stop();
			jQuery(".btn-pagination").css('width', '0');
            clearInterval(timer);
			
			//jQuery(".btn-pagination").width(0);
			swiper.slideNext();
			
			//regularprogressbar(elem);
        });
	
	}
	regularprogressbar(0);


    function stopborgress(elem){
	    var $bar = jQuery('#bar'+elem);
        $bar.stop();
        
       // clearInterval(timer);

        var w = $bar.width();
        var percent = parseInt((w * 100) / maxWidth);
       
	}

jQuery("#controlbtn").click(function(){
    id=jQuery(".swiper-slide-active").data("id");
	console.log(id);
   if (jQuery(this).hasClass("close")) {
           stopborgress(id);
		   jQuery(this).removeClass("close").addClass("open").children("i").removeClass("fa-pause").addClass("fa-play");

          
   }else{
         regularprogressbar(id);
         jQuery(this).removeClass("open").addClass("close").children("i").removeClass("fa-play").addClass("fa-pause");
       
   }
})

swiper.on('slideChange', function ( ) {
    var currentSlideIndex = this.realIndex ;
    console.log(currentSlideIndex ,"test");
	 var $bar1 = jQuery('.btn-pagination');
        $bar1.stop();

      //  clearInterval(timer);
	//stopborgress("all");
	jQuery(".btn-pagination").css('width', '0');
	regularprogressbar(currentSlideIndex);
	jQuery("#controlbtn").removeClass("open").addClass("close").children("i").removeClass("fa-play").addClass("fa-pause");
})


});

function Horloge(maxWidth) {
   // var w = jQuery('#bar').width();
	//w=300;
    var percent = parseInt(maxWidth);
    
    jQuery('#log').html(percent + ' %');
}