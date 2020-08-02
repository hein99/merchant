<?php
switch($action)
{
  case '':
  case 'display':
    require('./views/dashboard/display.php');
  break;

  case 'get_exchange_rates':
    getExchangeRates();
  break;

  case 'created_exchange_rate':
    createExchangeRates();
  break;

  case 'edit_float_text':
    editFloatText();
  break;

  case 'create_photo':
    createPhoto();
  break;

  case 'edit_photo_link':
    editPhotoLink();
  break;

  case 'edit_photo_order':
    editPhotoOrder();
  break;

  case 'delete_photo':
    deletePhoto();
  break;

  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();

}

function getExchangeRates()
{
  $rates = ExchangeRate::getAllExchangeRates();
  $return_rates = array();
  foreach($rates as $rate)
  {
    $return_rates[] = (object)array(
      'mmk' => $rate->getValueEncoded('mmk'),
      'created_date' => $rate->getValueEncoded('created_date')
    );
  }
  echo json_encode($return_rates);
}

function createExchangeRates()
{
  $exchange_rate = new ExchangeRate(array(
    'mmk' => isset($_POST['mmk']) ? preg_replace('/[^.\0-9]/', '', $_POST['mmk']) : ''
  ));
  if(!$exchange_rate->getValue('mmk'))
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
    exit("fail");
  }
  else
  {
    $latest_rate = ExchangeRate::getLatestExchangeRate();
    if($latest_rate->getValue('mmk') != $exchange_rate->getValue('mmk'))
      $exchange_rate->createExchangeRate();
  }
}

function editFloatText()
{
  $float_text = new FloatText(array(
    'text' => isset($_POST['text']) ? $_POST['text'] : ''
  ));
  if(!$float_text->getValue('text'))
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
    exit("fail");
  }
  else
  {
    $float_text->UpdateText();
  }
}

function createPhoto()
{
  if(isset($_FILES['photo']['type']) AND $_FILES['photo']['type'] == 'image/gif' OR $_FILES['photo']['type'] == 'image/jpeg' OR $_FILES['photo']['type'] == 'image/png')
  {
    $photo_data = new BannerPhotos(array(
      'photo_name' => isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '',
      'link' => isset($_POST['link']) ? $_POST['link'] : ''
    ));
    $last_insert_id = $photo_data->insertPhoto();
    $tmp = $_FILES['photo']['tmp_name'];
    $photo_name = 'id_' . $last_insert_id . '_' . $_FILES['photo']['name'];
    move_uploaded_file($tmp, './photos/banner/' . $photo_name);
  }
  header('location: ' . URL . '/dashboard/');
}

function editPhotoLink()
{
  $required_fields = array('id', 'link');
  $missing_fields = array();
  $error_messages = array();

  $photo = new BannerPhotos(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'link' => isset($_POST['link']) ? $_POST['link'] : ''
  ));

  foreach($required_fields as $required_field)
  {
    if(!$photo->getValue($required_field) )
      $missing_fields[] = $required_field;
  }

  if(!$photo->getValue('id'))
  {
    $error_messages[] = 'Failed request. Not include related Id.';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $photo->UpdateLinkById();
    header('location: ' . URL . '/dashboard/');
  }
}

function editPhotoOrder()
{
  $required_fields = array('id', 'order_no');
  $missing_fields = array();
  $error_messages = array();

  $photo = new BannerPhotos(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'order_no' => isset($_POST['order_no']) ? preg_replace('/[^0-9]/', '', $_POST['order_no']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if(!$photo->getValue($required_field) )
      $missing_fields[] = $required_field;
  }

  if(!$photo->getValue('id'))
  {
    $error_messages[] = 'Failed request. Not include related Id.';
  }

  if($error_messages)
  {
    echo 'Failed' ;
  }
  else
  {
    $photo->UpdateOrderById();
    header('location: ' . URL . '/dashboard/');
  }
}

function deletePhoto()
{
  $id = isset($_POST['id']) ? $_POST['id'] : '';
  if($id)
  {
    $photo = BannerPhotos::getPhotoById($id);
    if($photo)
    {
      $photo_name = 'id_' . $id . '_' . $photo->getValueEncoded('photo_name');
      $dir = './photos/banner/';
      $dirHandle = opendir($dir);
      while($file = readdir($dirHandle))
      {
        if($file === $photo_name)
          unlink($dir."/".$file);
      }
      closedir($dirHandle);
      BannerPhotos::DeleteById($id);
      echo 'success';
    }
  }
}
 ?>
