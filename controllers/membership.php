<?php
switch($action)
{
  case '':
  case 'display':
    $memberships = Membership::getAllMembership();
    require('./views/membership/display.php');
    break;

  case 'change_percentage':
    changePercentage();
    break;

  case 'change_definition':
    changeDefinition();
    break;

  default:
    $ERR_STATUS = ERR_ACTION;
    require('./views/error_display.php');
    exit();
}

function changePercentage()
{
  $required_fields = array('id', 'percentage');
  $missing_fields = array();
  $error_messages = array();

  $membership = new Membership(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'percentage' => isset($_POST['percentage']) ? preg_replace('/[^.\0-9]/', '', $_POST['percentage']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if($membership->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }

  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $membership->updatePercentage();
    header('location: ' . URL . '/membership/');
  }
}

function changeDefinition()
{
  $required_fields = array('id', 'definition');
  $missing_fields = array();
  $error_messages = array();

  $membership = new Membership(array(
    'id' => isset($_POST['id']) ? preg_replace('/[^0-9]/', '', $_POST['id']) : '',
    'definition' => isset($_POST['definition']) ? preg_replace('/[^ \,\-\_a-zA-Z0-9]/', '', $_POST['definition']) : ''
  ));

  foreach($required_fields as $required_field)
  {
    if($membership->getValue($required_field) == '' )
      $missing_fields[] = $required_field;
  }

  if($missing_fields)
  {
    $error_messages[] = 'Please fill all required field';
  }

  if($error_messages)
  {
    $ERR_STATUS = ERR_FORM;
    require('./views/error_display.php');
  }
  else
  {
    $membership->updateDefinition();
    header('location: ' . URL . '/membership/');
  }
}

 ?>
