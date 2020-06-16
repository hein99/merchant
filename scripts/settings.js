$(document).ready(function() {
  $('.ky-current-account-container input').on('focus', function(){
    $('#new-text').removeClass('ky-onfocus');
    $('#current-text').addClass('ky-onfocus');
  });

  $('.ky-new-account-container input').on('focus', function(){
    $('#current-text').removeClass('ky-onfocus');
    $('#new-text').addClass('ky-onfocus');
  });

  $('.ky-account-configure-form').validate({
    rules: {
      phone: {
        required: true,
        number: true
      },
      current_password: "required",
      new_username: {
        required: true,
        minlength: 2
      },
      new_password1: {
        required: true,
        minlength: 6
      },
      new_password2: {
        required: true,
        minlength: 6,
        equalTo: "#new_password1"
      }
    }
  });

});
