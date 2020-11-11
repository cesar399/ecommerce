$(document).ready(function() {
	$('#products').pinterest_grid({

		no_columns: 4,
		padding_x: 10,
		padding_y: 10,
		margin_bottom: 50,
		single_column_breakpoint: 700
	});
	//update item cart
	$(".btn-update-item").on('click', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var href = $(this).data('href');
		var quantity = $("#product_" + id).val();
		window.location.href = href + "/" + quantity;
	});
// external js: isotope.pkgd.js


// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.element-item',
  layoutMode: 'fitRows',
  getSortData: {
    name: '.name',
    symbol: '.symbol',
    number: '.number parseInt',
    category: '[data-category]',
    weight: function( itemElem ) {
      var weight = $( itemElem ).find('.weight').text();
      return parseFloat( weight.replace( /[\(\)]/g, '') );
    }
  }
});

// bind sort button click
$('.sort-by-button-group').on( 'click', 'button', function() {

    /* Get the element name to sort */
    var sortValue = $(this).attr('data-sort-value');

    /* Get the sorting direction: asc||desc */
    var direction = $(this).attr('data-sort-direction');

    /* convert it to a boolean */
    var isAscending = (direction == 'asc');
    var newDirection = (isAscending) ? 'desc' : 'asc';

    /* pass it to isotope */
    $grid.isotope({ sortBy: sortValue, sortAscending: isAscending });



  });







//

// external js: isotope.pkgd.js


// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.element-item',
  layoutMode: 'fitRows',
  getSortData: {
    name: '.name',
    symbol: '.symbol',
    number: '.number parseInt',
    category: '[data-category]',

  }
});

// bind sort button click
$('.sort-by-button-group').on( 'click', 'button', function() {
  var sortValue = $(this).attr('data-sort-value');
  $grid.isotope({ sortBy: sortValue });
});





});
