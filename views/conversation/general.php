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
