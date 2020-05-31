<?php
$text='';
switch($ERR_STATUS)
{
  case 1:
    $text = 'Not Found Any Controller';
    break;
  case 2:
    $text = 'Not Found Any Action';
    break;
  case 3:
    foreach($error_messages as $error_message)
      $text .= $error_message;
    break;
  case 4:
    $text = 'Invalid URL';
    break;
  default:
    $text = 'Unknown Error';
}
  displayPageHeader('Error | ' . WEB_NAME);
?>
 <section>
   <h1><?php echo $text ?></h1>
 </section>

 <?php displayPageFooter(); ?>
