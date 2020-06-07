$(document).ready(function() {

	setInterval(function(){
	  update_last_activity();
	}, 3000);

	function update_last_activity(){
		$.ajax({
			url: PAGE_URL+'/conversation/update_activity_time',
			success: function(){

			}
		})
	}

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
