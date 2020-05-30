$(document).ready(function() {
  $('.ky-sidemenu-list li').on('click', function() {
    $(this).addClass("active").siblings().removeClass("active");
  });

  $('.ky-user-container i.fa-caret-down').on('click', function() {
    $('.ky-logout-dropdown-menu').parent().toggle();
  });

});
