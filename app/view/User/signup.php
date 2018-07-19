<!--start-breadcrumbs-->
<div class="breadcrumbs">
	<div class="container">
		<div class="breadcrumbs-main">
			<ol class="breadcrumb">
				<li><a href="<?= PATH ?>">Главная</a></li>
				<li>Регистрация</li>
			</ol>
		</div>
	</div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
	<div class="container">
		<div class="prdt-top">
			<div class="col-md-12">
				<div class="product-one signup">
					<div class="register-top heading">
						<h2>REGISTER</h2>
					</div>

					<div class="register-main">
						<div class="col-md-6 account-left">
							<form method="post" action="user/signup" id="signup" role="form"
										data-toggle="validator">
								<div class="form-group has-feedback">
									<label for="login">Login</label>
									<input type="text" name="login" class="form-control" id="login"
												 placeholder="Login" required
												 value="<?=isset($_SESSION['form_data']['login']) ?
														 h($_SESSION['form_data']['login']) : '' ;?>">
								</div>
								<div class="form-group has-feedback">
									<label for="pasword">Password</label>

									<input type="password" data-minlength="3" class="form-control"
												 id="inputPassword" placeholder="Password" required
												 name="password"
												 value="<?=isset($_SESSION['form_data']['password']) ?
                             h($_SESSION['form_data']['password']) : '' ;?>">
									<div class="help-block">Minimum of 3 characters</div>
								</div>
								<div class="form-group has-feedback">
									<input type="password" class="form-control" id="inputPasswordConfirm"
												 data-match="#inputPassword" data-match-error="Whoops, these don't match"
												 placeholder="Confirm" required>
									<div class="help-block with-errors"></div>
								</div>

								<div class="form-group has-feedback">
									<label for="name">Имя</label>
									<input type="text" name="name" class="form-control" id="name" placeholder="Имя"
												 value="<?=isset($_SESSION['form_data']['name']) ?
                             h($_SESSION['form_data']['name']) : '' ;?>"
									>
								</div>
								<div class="form-group has-feedback">
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control" id="email"
												 placeholder="Email" required
												 value="<?=isset($_SESSION['form_data']['email']) ?
                             h($_SESSION['form_data']['email']) : '' ;?>"
									>
								</div>
								<div class="form-group has-feedback">
									<label for="address">Address</label>
									<input type="text" name="address" class="form-control" id="address"
												 placeholder="Address" required
												 value="<?=isset($_SESSION['form_data']['address']) ?
                             h($_SESSION['form_data']['address']) : '' ;?>"
									>
								</div>
								<button type="submit" class="btn btn-default">Зарегистрировать</button>
							</form>

							<?php if(isset($_SESSION['form_data']))unset($_SESSION['form_data']); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--product-end-->