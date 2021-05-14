$(document).ready(function(){
   $('.button-collapse').sideNav();
    $('.scrollspy').scrollSpy();

     $('.modal').modal({
      dismissible: false,
      outDuration:500,
      inDuration:500,
    });

    $('select').material_select();
//    $(".carousel").carousel();
    $(".carousel").carousel({fullWidth:true}); 

       $('.dropdown-button').dropdown({
    // hover:true,
    constrainWidth: false, // Does not change width of dropdown to that of the activator
    // gutter: 4, // Spacing from edge
    belowOrigin: true, // Displays dropdown below the button
    alignment: 'left', // Displays dropdown with edge aligned to the left of button
    // stopPropagation: false // Stops event propagation
  }
);

// $('.del-cat-btn').click(function(){
//     alert('Category removed succesfully');
// })


// $('.delpost').click(function(){
//     alert('Post removed succesfully');
// })

// $('.delpst').click(function(){
//     alert('Contact message deleted succesfully');
// })

// $('.delcom').click(function(){
//     alert('comment deleted succesfully');
// })


// $('.pst-btn').click(function(){
//     alert('Post Edited Successfully');
// })

// $('#abcd').click(function(){
//     alert("Comment Updated succesfully");
// })


// $('.pubpost').click(function(){
//     alert('Post published succesfully!')
// })

// $('.unpubpost').click(function(){
//     alert('Post unpublished succesfully!')
// })


$('.del-cat-btn').click(function(){
    var id = $(this).attr("id");

    var delUrl = "cat.php?delCat=" + id + " ";

    var tit = $(this).attr("rel");

    $('.modalCat').attr("href", delUrl); 

    $('.para').text(tit);
})

$('.del_comment').click(function(){
    var id = $(this).attr("id");
    var rel = $(this).attr("rel");

    var del = "comment.php?del_com=" + id + " ";
    $('.modalDel').attr("href", del); 

    $('.para').text(rel);
})


$('.del_single_comment').click(function(){
    var id = $(this).attr("id");
    var rel = $(this).attr("rel");

    var photo_id = $(this).attr("alt");

    var del = "photo_comment.php?photo_comment=" + photo_id +" && del_com=" + id + " ";
    $('.modalDel').attr("href", del); 

    $('.para').text(rel);
})




$('.reply_del_comment').click(function(){
    var id = $(this).attr("id");
    var rel = $(this).attr("rel");

    var photo_id = $(this).attr("alt");

    var del = "reply_comment.php?replypst=" + photo_id +" && del_com=" + id + " && comment= " + id + " ";
    $('.modalDel').attr("href", del); 

    $('.para').text(rel);
})




$('.reply_admin_comment').click(function(){
    var id = $(this).attr("id");
    var rel = $(this).attr("rel");
    var com_id = $(this).attr("link");  
    var photo_id = $(this).attr("alt");

    var del = "reply_comment.php?replypst=" + photo_id +" && del_reply_com=" + id + " && comment= " + com_id + " ";
    $('.modalRep').attr("href", del); 

    $('.para_rep').text(rel);
})







$('.comment_cnt').click(function(){
  return confirm("Do you want view all comments for this post?");
})


$('#select_all').click(function(){
   
   if(this.checked){
      $('.checkboxes').each(function(){
          this.checked = true;
      })
   }else
       $('.checkboxes').each(function(){
          this.checked = false;
      })
})



$('.delpst').click(function(){
    return confirm('Do you want to delete?');
})


$('.delcom').click(function(){

  var com_id = $(this).attr("rel");

  var com_msg = $(this).attr("id");

  var delComUrl = "comment.php?delcom=" + com_id + " ";

  $('.modalCom').attr("href",delComUrl);

  $('.para').text(com_msg);

})

// edit_user.php?edit_user=<?php echo $users->id ?>


$('.edit_user').click(function(){

    var id = $(this).attr("id");
    var det = $(this).attr("rel");
    var del_link = "edit_user.php?edit_user=" + id + " ";

    $('.modalEdit').attr("href",del_link);

    $('.para').text(det);

})
 

$('.del_user').click(function(){

    var id = $(this).attr("id");
    var det = $(this).attr("rel");
    var del_link = "users.php?del_user=" + id + " ";

    $('.modalDel').attr("href",del_link);

    $('.para').text(det);

})
 


$('.delete_upload').click(function(){
    var id = $(this).attr('id');
    var rel = $(this).attr('rel');

    var del_link = "display_post.php?del_upload=" + id + " ";

    $('.modalDel').attr("href",del_link);

    $('.para').text(rel);

})


$('.edit_upload').click(function(){
    var id = $(this).attr('id');
    var rel = $(this).attr('rel');
    var edit_link = "edit_post.php?edit_ups=" + id + " ";

    $('.modalEdit').attr('href',edit_link);
     $('.para').text(rel);
})

















$('.delcmt').click(function(){
   var id = $(this).attr("rel");
   var con_det = $(this).attr('id');

    var delUrl = "contact.php?delCon=" + id + " "

$('.modalDel').attr("href", delUrl);

$('.para').text(con_det);

})




$('.actionPerform').click(function(){
    return confirm('Do you want to perform operation?');
})




// PRELOADER

// var divbox = "<div id='load-screen'><div id='loading'></div></div>";


// $("body").prepend(divbox);

// $('#load-screen').delay(900).fadeOut(500, function(){
//   $(this).remove();
// })


// $('#reset-btn').click(function(){
//   alert("Post view reset was succesfully");
// })


// PRELOADER



$('.resetView').click(function(){
  return confirm('Do you want to Reset post view count to zero?');
})


$('.resetCmt').click(function(){
  return confirm('Do you want to Reset post comment count to zero?');
})



// RELOADING PAGE IN ORDER TO GET USERS WITHOUT REFRESHING

    function loadUsers(){
         $.get("function.php?onlineUsers=result", function(data){

      $(".users_online_span").text(data);

    });
    }
   

    setInterval(function(){
      loadUsers();
    },500);

// RELOADING PAGE IN ORDER TO GET USERS WITHOUT REFRESHING





$('#signup').click(function(){
    alert('hello');
})




$('imagery').click(function(){

    alert ('image clicked');
})













});