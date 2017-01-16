$(document).ready(function() {
	$('form').on('submit', function (e) {
		e.preventDefault();
		var $form = $(this);

		var destination = $('#destination').val();
		var nights = $('#nights').val();

		$form.addClass('loading');

		$.ajax({
			type: this.method,
			url: this.action,
			data: $form.serializeArray()
		})
		.always(function () {
			$form.removeClass('loading');
		})
		.done(function (response) {
			var message = 'Trip to ' + destination + ' at ' + response.price + ' for ' + nights + 
				' nights. Your confirmation code: ' + response.confirmation + '.';

			$('.message-success').html(message);

			$form.addClass('success').trigger('reset');
		})
		.fail(function () {
			alert("Something went wrong. Please try again later. ");
		});

	});
});
