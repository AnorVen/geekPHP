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
  location = path + '/currency/change?curr=' + $(this).val();

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

//cart


function getCart() {
  $.ajax({
    url: '/cart/show',
    type: 'GET',
    success: function(res){
      console.log(res);
      showCart(res);
    },
    error: function(){
      alert('Ошибка! Попробуйте позже');
    }
  });
}


/*Cart*/
$('body').on('click', '.add-to-cart-link', function(e){
  e.preventDefault();
  var id = $(this).data('id'),
    qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
    mod = $('.available select').val();
  $.ajax({
    url: '/cart/add',
    data: {id: id, qty: qty, mod: mod},
    type: 'GET',
    success: function(res){
     // showCart(res);
      addProductToCart(res);

    },
    error: function(){
      alert('Ошибка! Попробуйте позже');
    }
  });
});

function addProductToCart(cart){
  $('#cart .modal-body').html(cart);
  if($('.cart-sum').text()){
    if($('.cart-sum').text() === "$ 0"){
      $('.simpleCart_total').text('Empty Cart');
    } else {
      $('.simpleCart_total').html($('#cart .cart-sum').text());
    }
  }else{
    $('.simpleCart_total').text('Empty Cart');
  }
}

$('#cart .modal-body').on('click', '.del-item', function(){
  var id = $(this).data('id');
  $.ajax({
    url: '/cart/delete',
    data: {id: id},
    type: 'GET',
    success: function(res){
      showCart(res);
    },
    error: function(){
      alert('Error!');
    }
  });
});

function showCart(cart){
  if($.trim(cart) == '<h3>Корзина пуста</h3>'){
    $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
  }else{
    $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
  }
  addProductToCart(cart);
  $('#cart').modal();
}

function getCart() {
  $.ajax({
    url: '/cart/show',
    type: 'GET',
    success: function(res){
      showCart(res);
    },
    error: function(){
      alert('Ошибка! Попробуйте позже');
    }
  });
}

function clearCart() {
  $.ajax({
    url: '/cart/clear',
    type: 'GET',
    success: function(res){
      showCart(res);
    },
    error: function(){
      alert('Ошибка! Попробуйте позже');
    }
  });
}
/*Cart*/

/* Search */
var products = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: {
    wildcard: '%QUERY',
    url: path + '/search/typeahead?query=%QUERY'
  }
});

products.initialize();

$("#typeahead").typeahead({
  // hint: false,
  highlight: true
},{
  name: 'products',
  display: 'title',
  limit: 10,
  source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
  // console.log(suggestion);
  window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});

