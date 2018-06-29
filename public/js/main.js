$(function () {
  $("#slider4").responsiveSlides({
    auto: true,
    pager: true,
    nav: true,
    speed: 500,
    namespace: "callbacks",
    before: function () {
      $('.events').append("<li>before event fired.</li>");
    },
    after: function () {
      $('.events').append("<li>after event fired.</li>");
    }
  });

});

$('#currency').change(function () {
  location = 'http://gu/currency/change?curr=' + $(this).val();

});



$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});


$('.available select').on('change', function () {
  var modId = $(this).val();
  var color = $(this).find('option').filter(':selected').data('title');
  var price = $(this).find('option').filter(':selected').data('price');
  var productTitle =  $('.item__title');
  var productPrice = $('.item_price .item_price--new');
  var productPriceOld = $('.item_price .old_price');
  var productPriceData = $('.item_price .item_price--new').data('price');
  var selary = parseInt(productPriceOld.text())/parseInt(productPrice.text());


  if(modId == 0){
    color = '';
    price = Math.round(productPriceData);
  }
  productTitle.text(productTitle.data('title')+ ' ' + color);
  productPrice.text(price);
  productPriceOld.text(  Math.round(selary*price));


});