<?php
function chatUserList($userList)
{
  $returnUserList = '';
  foreach($userList as $ul)
  {
    $returnUserList .= '<li id="chat-person-'.$ul['id'].'">
            <span class="chat-person">'.$ul['username'].'</span> <!--for person name-->
            <span class="is-typing">Typing</span> <!--when this person is typing show this text-->
            <span class="active-person"></span>  <!--when this person is active show this text-->
            </li>
            ';
  }
  echo $returnUserList;
}
 ?>

<!-- ***************************Ajax form************************************* -->
 <h1>Ajax form</h1>
 <form id="ajax-form" class="myclass" action="" method="post" enctype="multipart/form-data">
   <input type="number" name="to_user_id" placeholder="To User ID"><br>
   <input type="file" name="photo" id="photo" value=""><br>
   <input type="button" value="Send" id="btn-send">
 </form>
 <script type="text/javascript">

   $('#btn-send').click(function(){
     var formElem = document.querySelector("#ajax-form");
     console.log(formElem);
     var formData = new FormData(formElem)
     console.log(formData);

     $.ajax({
       method:"POST",
       url: "http://localhost/merchant/conversation/send_photo",
       data: formData,
       contentType: false,
       processData: false,
       success: function(returnUserLists){
         console.log(returnUserLists);
         }
     });
   });


 </script>
<!-- ***************************Ajax form************************************* -->
