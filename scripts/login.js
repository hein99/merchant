$(function(){

  $('#phone-js').focus();

  $close = $('.close-eye');
  $password = $('#password');

  $('.login-eye').click(function(){
    $close.toggle();
    $('.open-eye svg, .inner').toggleClass('show');

    if($password.attr('type') == 'password'){
      $password.attr('type', 'text');
      $password.focus();
    }else{
      $password.attr('type', 'password');
      $password.focus();
    }
  });

  $('#password').keydown(function(e){
    if(e.which == 115){
      $password.attr('type', 'text');
      $password.focus();
      $close.hide();
      $('.open-eye svg, .inner').addClass('show');
    }
  });

  $('#password').keyup(function(e){
    if(e.which == 115){
      $password.attr('type', 'password');
      $password.focus();
      $close.show();
      $('.open-eye svg, .inner').removeClass('show');
    }
  });

  $('.login-body').validate({
    rules: {
      phone: {
        required: true,
        number: true
      },
      password: "required"
    }
  });

  $('#password').focus(function(){
    $('.login-eye').css('background-color', '#dfdfdf');
  });

  $('#password').blur(function(){
    $('.login-eye').css('background-color', '#efefef');
  });
});
