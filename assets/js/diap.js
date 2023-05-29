jQuery(document).ready(function(){
   jQuery(".block-pagination #onglet_215").click(function(){
      jQuery('.zerda_diaporama_video video').get(0).play();
    });
  });


  var zerda_swiper = {};
  
  i=0;
  jQuery(".cl_poste_zerda").each(function(index){
     id = jQuery(this).val();
     ligne = index ;
     jQuery(this).parent().children("#zerda_lk_swiper_diapo"+id).addClass("zerda_lk_swiper_diapo"+index+id);
     var  zerda_swiper = new Swiper(".zerda_swiper_diapo"+id, {
	    loop: true,
            effect: "fade",
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '"  ><div id="onglet_'+id+'"  class="block-one-pagination" data-id="'+id+'" ><div class="bar'+index+' point-pos-'+id+' btn-pagination bardiap"  data-ligne="'+ligne+'"  ></div><div class="load-text">' + jQuery(".zerda_lk_swiper_diapo"+ligne+id+" .diap"+index).data("title")+ "</div></div></span>";
			          console.log(index);
          },
        },
        autoplay: {
          delay: 6000,
          disableOnInteraction: false,
        },
      });
     console.log(id);

    
  

    
      zerda_swiper.on('slideChange', function ( id) {
       
       // console.log(zerda_swiper); 
   
          jQuery(".cl_poste_zerda").each(function(index){

              id = jQuery(this).val();
        

          });

      
      })

      jQuery("#control"+id).click(function(){
        point = jQuery(this).data("id");
        id=jQuery(".swiper-slide-active").data("id");
          console.log(point);
          if (jQuery(this).hasClass("close")) {
               //   stopborgress(id);
              jQuery(this).removeClass("close").addClass("open").children("i").removeClass("fa-pause").addClass("fa-play");
                    zerda_swiper.autoplay.stop();
                    
                    jQuery(".point-pos-"+point+".bardiap").removeClass("hidden");
                    jQuery(".point-pos-"+point+".bar"+id).addClass("hidden");
                   
                  
          }else{
              //  regularprogressbar(id);
                jQuery(".point-pos-"+point+".bardiap").removeClass("hidden");
                jQuery(this).removeClass("open").addClass("close").children("i").removeClass("fa-play").addClass("fa-pause");
                    zerda_swiper.autoplay.start();
                    zerda_swiper.slideNext();
              
          }
      })
      i++;

     
 })
  

