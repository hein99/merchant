$(document).ready(function() {
	$('.ky-sidemenu-list li').on('click', function(e) {
		$(this).addClass("active").siblings().removeClass("active");
	});

	$('.ky-user-content').on('click', function() {
		$('.ky-user-content .fa-caret-down, .ky-logout-dropdown-menu').toggleClass('dropdown');
	});

	$('.ky-user-container').on('mouseleave', function() {
		$('.ky-user-content .fa-caret-down, .ky-logout-dropdown-menu').removeClass('dropdown');
	});

});
