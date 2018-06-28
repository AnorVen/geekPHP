<!--start-breadcrumbs-->
<div class="breadcrumbs">
	<div class="container">
		<div class="breadcrumbs-main">
			<ol class="breadcrumb">
				<!--	<li><a href="<? /*= PATH */ ?>">Home</a></li>
				<li><a href="<? /*= PATH */ ?>">Home</a></li>
				<li class="active">Single</li>-->

          <?= $breadcrumbs ?>
			</ol>
		</div>
	</div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<!--start-single-->
<!--start-single-->
<!--start-single-->

<?php $curr = \shop\App::$app->getProperty('currency'); ?>
<?php $cats = \shop\App::$app->getProperty('categories');
?>
<div class="single contact">
	<div class="container">
		<div class="single-main">
			<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">

              <?php if ($gallery): ?>
								<div class="flexslider">
									<ul class="slides">
                      <?php foreach ($gallery as $img): ?>
												<li data-thumb="/images/<?= $img->img ?>">
													<div class="thumb-image">
														<img src="/images/<?= $img->img ?>" data-imagezoom="true"
																 class="img-responsive" alt=""/></div>
												</li>
                      <?php endforeach; ?>

									</ul>
								</div>


								<!-- FlexSlider -->

              <?php else: ?>
								<img src="/images/<?= $product->img ?>" alt="">


              <?php endif; ?>
					</div>
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem product">
							<h2><?= $product['title'] ?></h2>
							<div class="star-on">
								<ul class="star-footer">
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
								</ul>
								<div class="review">
									<a href="#"> 1 customer review </a>

								</div>
								<div class="clearfix"></div>
							</div>

							<h5 class="item_price">
								<span
										class="">
													<?= $curr['symbol_left'] ? $curr['symbol_left'] . ' ' . $product->price * $curr['value'] : $product->price * $curr['value'] . ' ' . $curr['symbol_right'] ?>
											</span>
                  <?php if ($product->old_price != 0): ?>
										<span class="old_price">
															<?= $curr['symbol_left'] ? $curr['symbol_left'] . ' ' . $product->old_price * $curr['value'] : $product->old_price * $curr['value'] . ' ' . $curr['symbol_right'] ?>
													</span>
                  <?php endif ?>
							</h5>
							<p><?= $product->content ?></p>
							<div class="available">
								<ul>
									<li>Color
										<select>
											<option value="0">выбрать цвет</option>

											<?php foreach ($mods as $item => $val): ?>
											<option>
												<?=$item['title']?>

											</option>
											<?php endforeach ?>

										</select>
									</li>
									<div class="clearfix"></div>
								</ul>
							</div>
							<ul class="tag-men">
								<li><span>Category</span>
									<span>: <a href="<?= $cats[$product->category_id]['alias'] ?>">
											"<?= $cats[$product->category_id]['title'] ?>
										</a></span></li>
							</ul>
							<div class="quantity">
								<input type="number" size="4" class="input-text" value="1" name="quantity" min="1"
											 step="1">
								<a href="/card/add?id=<?= $product->id ?>" id="productAdd"
									 data-id="<?= $product->id ?>" class="add-cart item_add add-to-cart-link">ADD TO
									CART</a>
							</div>


						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="tabs">
					<ul class="menu_drop">
						<li class="item1"><a href="#"><img src="/images/arrow.png" alt="">Description</a>
							<ul>
								<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing
										elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
										erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
										ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
										vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
										facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
										luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
										putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
										quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
										clari, fiant sollemnes </a></li>
							</ul>
						</li>
						<li class="item2"><a href="#"><img src="/images/arrow.png" alt="">Additional information</a>
							<ul>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
										vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
										facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
										luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
										putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
										quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
										clari, fiant sollemnes </a></li>
							</ul>
						</li>
						<li class="item3"><a href="#"><img src="/images/arrow.png" alt="">Reviews (10)</a>
							<ul>
								<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing
										elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
										erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
										ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
										vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
										facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
										luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
										putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
										quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
										clari, fiant sollemnes </a></li>
							</ul>
						</li>
						<li class="item4"><a href="#"><img src="/images/arrow.png" alt="">Helpful Links</a>
							<ul>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
										vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
										facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
										luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
										putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
										quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
										clari, fiant sollemnes </a></li>
							</ul>
						</li>
						<li class="item5"><a href="#"><img src="/images/arrow.png" alt="">Make A Gift</a>
							<ul>
								<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing
										elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
										erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
										ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
								<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
										vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
										facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
										luptatum zzril delenit augue duis dolore</a></li>
								<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
										putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
										quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
										clari, fiant sollemnes </a></li>
							</ul>
						</li>
					</ul>
				</div>

          <?php if ($related): ?>
						<div class="latestproducts">

							<div class="product-one">
								<h4>recomendet product</h4>
                  <?php foreach ($related as $item): ?>
										<div class="col-md-4 product-left p-left">
											<div class="product-main simpleCart_shelfItem">
												<a href="/product/<?= $item['alias'] ?>" class="mask">
													<img class="img-responsive zoom-img"
															 src="/images/<?= /*file_exists('/images/' . $item['img']) ? $item['img'] : 'no_image.jpg'*/
                               $item['img'] ?>" alt=""/></a>
												<div class="product-bottom">
													<h3><?= $item['title'] ?></h3>
													<p>Explore Now</p>

													<h4><a href="/card/add?id=<?= $item['id'] ?>" id="productAdd"
																 data-id="<?= $item['id'] ?>"
																 class="add-cart item_add add-to-cart-link">ADD TO CART</a></h4>
													<p class=" item_price">  <?= $curr['symbol_left'] ? $curr['symbol_left'] . ' ' . $item['price'] * $curr['value'] : $item['price'] * $curr['value'] . ' ' . $curr['symbol_right'] ?></p>
												</div>
												<div class="srch">
													<span><?= $item['old_price'] ? (round(($item['old_price'] - $item['price']) / $item['old_price'] * 100) != 0 ? round(($item['old_price'] - $item['price']) / $item['old_price'] * 100) : '10') . '%' : 'Ваще нужно X)' ?></span>
												</div>
											</div>
										</div>
                  <?php endforeach; ?>
								<div class="clearfix"></div>
							</div>
						</div>
          <?php endif; ?>

          <?php if ($recentlyViewed): ?>
						<div class="latestproducts">

							<div class="product-one">
								<h4>recentlyViewed</h4>
                  <?php foreach ($recentlyViewed as $item): ?>
										<div class="col-md-4 product-left p-left">
											<div class="product-main simpleCart_shelfItem">
												<a href="/product/<?= $item['alias'] ?>" class="mask">
													<img class="img-responsive zoom-img"
															 src="/images/<?= /*file_exists('/images/' . $item['img']) ? $item['img'] : 'no_image.jpg'*/
                               $item['img'] ?>" alt=""/></a>
												<div class="product-bottom">
													<h3><?= $item['title'] ?></h3>
													<p>Explore Now</p>

													<h4><a href="/card/add?id=<?= $item['id'] ?>" id="productAdd"
																 data-id="<?= $item['id'] ?>"
																 class="add-cart item_add add-to-cart-link">ADD TO CART</a></h4>
													<p class=" item_price">  <?= $curr['symbol_left'] ? $curr['symbol_left'] . ' ' . $item['price'] * $curr['value'] : $item['price'] * $curr['value'] . ' ' . $curr['symbol_right'] ?></p>
												</div>
												<div class="srch">
													<span><?= $item['old_price'] ? (round(($item['old_price'] - $item['price']) / $item['old_price'] * 100) != 0 ? round(($item['old_price'] - $item['price']) / $item['old_price'] * 100) : '10') . '%' : 'Ваще нужно X)' ?></span>
												</div>
											</div>
										</div>
                  <?php endforeach; ?>
								<div class="clearfix"></div>
							</div>
						</div>
          <?php endif; ?>
			</div>

		</div>
		<div class="col-md-3 single-right">
			<div class="w_sidebar">
				<section class="sky-form">
					<h4>Catogories</h4>
					<div class="row1 scroll-pane">
						<div class="col col-4">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All
								Accessories</label>
						</div>
						<div class="col col-4">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women
								Watches</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids
								Watches</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men
								Watches</label>
						</div>
					</div>
				</section>
				<section class="sky-form">
					<h4>Brand</h4>
					<div class="row1 row2 scroll-pane">
						<div class="col col-4">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
						</div>
						<div class="col col-4">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
							<label class="checkbox"><input type="checkbox"
																						 name="checkbox"><i></i>Fastrack</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
							<label class="checkbox"><input type="checkbox"
																						 name="checkbox"><i></i>Citizen</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>
						</div>
					</div>
				</section>
				<section class="sky-form">
					<h4>Colour</h4>
					<ul class="w_nav2">
						<li><a class="color1" href="#"></a></li>
						<li><a class="color2" href="#"></a></li>
						<li><a class="color3" href="#"></a></li>
						<li><a class="color4" href="#"></a></li>
						<li><a class="color5" href="#"></a></li>
						<li><a class="color6" href="#"></a></li>
						<li><a class="color7" href="#"></a></li>
						<li><a class="color8" href="#"></a></li>
						<li><a class="color9" href="#"></a></li>
						<li><a class="color10" href="#"></a></li>
						<li><a class="color12" href="#"></a></li>
						<li><a class="color13" href="#"></a></li>
						<li><a class="color14" href="#"></a></li>
						<li><a class="color15" href="#"></a></li>
						<li><a class="color5" href="#"></a></li>
						<li><a class="color6" href="#"></a></li>
						<li><a class="color7" href="#"></a></li>
						<li><a class="color8" href="#"></a></li>
						<li><a class="color9" href="#"></a></li>
						<li><a class="color10" href="#"></a></li>
					</ul>
				</section>
				<section class="sky-form">
					<h4>discount</h4>
					<div class="row1 row2 scroll-pane">
						<div class="col col-4">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and
								above</label>
							<label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
							<label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
						</div>
						<div class="col col-4">
							<label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
							<label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
							<label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<!--end-single-->