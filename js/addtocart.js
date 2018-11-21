$(document).ready(function() {
	$(document).on('submit', '#cart_submit', function (event) {
		$("button.add-to-cart").addClass("size");
		setTimeout(function() {
			$("button.add-to-cart").addClass("hover");
		}, 200);
		setTimeout(function() {
			$("button.add-to-cart").removeClass("hover");
			$("button.add-to-cart").removeClass("size");
		}, 400);
		// setTimeout(function (event) {
			$.ajax({
				type: 'post',
				url: '../actions/action-cart.php',
				data: $(this).serialize(),
				success: function () {
					var count = $('.counter').html();
					$("a.cart > span.counter").text(count);
					$('.AddToCartDiv div').load('../components/countcart.php');
				}
			});
		// }, 500);
		event.preventDefault();
	});
});