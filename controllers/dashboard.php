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
 ?>
