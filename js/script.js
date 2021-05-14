// MDB Lightbox Init
$(function () {
 $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");


$(document).ready(function(){
	           var image_name;
               var photo_id;
               

                $('.imagery').click(function(){

                    $('#select_btn').prop('disabled',false);
                   $(this).toggleClass('selected').siblings().removeClass('selected');



                     var tach = $('.selected').prop('src');
                     var image_href = tach.split("/");
                      image_name = image_href[image_href.length -1];

                      photo_id = $(this).attr('data');

                      $.ajax({

                        url:"ajax.php",
                        data:{photo_id:photo_id},
                        type:"POST",
                        success:function(data){

                            if(!data.error){
                               
                                $('.sidebar_image').html(data)
                            }
                        }
                    })
                    
    })


                 $('#select_btn').click(function(){
                     
                    $.ajax({

                        url:"ajax.php",
                        data:{image_name:image_name},
                        type:"POST",
                        success:function(data){

                            if(!data.error){
                                // alert(data);
                            }
                        }
                    })

                })

                

})

});