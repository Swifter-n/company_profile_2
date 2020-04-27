$(document).ready(function () {
	var index = 0,
		items = $('.thumbnail img'),
		total = items.length;

	function slide() {
		var item = $('.thumbnail img').eq(index);
		items.hide();
		item.css('display', 'block');
	}

	var load = setInterval(function () {
		index++;
		if (index > total - 1) index = 0;
		slide();
	}, 3000);

	$('#next').click(function () {
		index++;
		if (index > total - 1) index = 0;
		slide();
	});
	$('#prev').click(function () {
		index--;
		if (index < 0) total - 1;
		slide();
	});
});

$("#menu-toggle").click(function (e) {
	e.preventDefault();
	$("#sidebar-wrapper").toggleClass("active");
});

$(document).ready(function () {
  $('#carousel-example-generic').find('.item').first().addClass('active');
});

