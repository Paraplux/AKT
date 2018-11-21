$(document).ready(function() {
	$(document).on('submit', '#cart_submit', function (event) {
		$("button.add-to-cart").addClass("size");
		setTimeout(function() {
			$("button.add-to-cart").addClass("hover");
		}, 300);
		setTimeout(function() {
			$("button.add-to-cart").removeClass("hover");
			$("button.add-to-cart").removeClass("size");
		}, 600);
			$.ajax({
				type: 'post',
				url: '../actions/action-cart.php',
				data: $(this).serialize(),
				success: function () {
					var count = $('.counter').html();
					$("a.cart > span.counter").text(count);
					$('.add-to-cart-container div').load('../components/countcart.php');
				}
			});
		event.preventDefault();
	});
});