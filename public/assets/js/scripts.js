var $ = jQuery;

$(document).ready(function () {
	if ($('.textarea-wysihtml5').length > 0) {
		$('.textarea-wysihtml5').wysihtml5({
			toolbar: {
				'fa': true,
				"image": false,
				"link": false,
			}
		});
	}
	if ($('.textarea-wysihtml51').length > 0) {
		$('.textarea-wysihtml51').wysihtml5({
			toolbar: {
				'fa': true,
				"image": false,
				"link": false,
			}
		});
	}
});


$('#left-nav .nav-bottom-sec').slimScroll({
	height: '100%',
	size: '10px',
	color: '#999'
});

$('#bar-setting').click(function (e) {
	e.preventDefault();

	if ($(window).width() > 767) {
		$('body.has-left-bar').toggleClass('left-bar-open');
	} else {
		$('.left-nav-bar .nav-bottom-sec').slideToggle(500, function () {
			$('body.has-left-bar').toggleClass('left-bar-open');
		});
	}

});



$('#left-navigation').find('li.has-sub>a').on('click', function (e) {
	e.preventDefault();
	var $thisParent = $(this).parent();

	if ($thisParent.hasClass('sub-open')) {

		// Hide the Submenu
		$thisParent.removeClass('sub-open').children('ul.sub').slideUp(150);

	} else {

		// Show the Submenu
		$thisParent.addClass('sub-open').children('ul.sub').slideDown(150);

		// Hide Others Submenu
		$thisParent.siblings('.sub-open').removeClass('sub-open').children('ul.sub').slideUp(150);

	}
});

// Tooltip init

$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});

// Form
(function () {

	$('.form-group.form-group-default .form-control').on('focus', function (e) {
		$(this).closest('.form-group').addClass('focused');
	}).on('blur', function (e) {
		var $closest = $(this).closest('.form-group');
		if ($(this).val().length > 0) {
			$closest.addClass('filled');
		} else {
			$closest.removeClass('filled');
		}
		$closest.removeClass('focused');
	});

	$('.form-group.form-group-default select.form-control').on('change', function () {
		$(this).closest('.form-group').addClass('filled');
	});

})();

'use strict';

; (function (document, window, index) {
	var inputs = document.querySelectorAll('.inputfile');
	Array.prototype.forEach.call(inputs, function (input) {
		var label = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener('change', function (e) {
			var fileName = '';
			if (this.files && this.files.length > 1)
				fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
			else
				fileName = e.target.value.split('\\').pop();

			if (fileName)
				label.querySelector('span').innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener('focus', function () { input.classList.add('has-focus'); });
		input.addEventListener('blur', function () { input.classList.remove('has-focus'); });
	});
}(document, window, 0));





// Chat responsive
$(".back-btn-profile").click(function () {
	$(".content-right").hide();
});

$(".check-main").click(function () {
	//	$(".content-right").show();


});

$(".right-option-menu").click(function () {
	$(".title-right-desk").toggle();
});

$(".msg-option-menu").click(function () {
	$(".chat-buttons").toggle();
});





