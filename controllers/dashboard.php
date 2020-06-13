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
  if($exchange_rate->getValue('mmk'))
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
    exit("fail");
  }
  else
  {
    $exchange_rate->createExchangeRate();
  }
}
 ?>
