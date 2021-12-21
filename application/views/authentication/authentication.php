<?php
$registerFormOpen = form_open('Authentication/registerUser');
$loginFormOpen = form_open('Authentication/login');
$fullName = form_input(array('name' => 'full_name', 'placeholder' => 'نام کامل خود را وارد کنید'));
$email = form_input(array('name' => 'email', 'placeholder' => 'ایمیل خود را وارد کنید'));
$password = form_password(array('name' => 'password', 'placeholder' => 'رمز خود را وارد کنید'));
$options = array(
		null => 'انتخاب نمایید',
		'user' => 'مشتری',
		'support' => 'پشتیبان',
);

$userRole = form_dropdown('role', $options,null);
$loginButton = form_button(array(
		'value' => 'login',
		'name' => 'login',
		'content' => 'ورود',
		'class' => 'blue text-center',
		'type' => 'submit'
));
$signUpButton = form_button(array(
		'value' => 'signUp',
		'name' => 'signUp',
		'content' => 'ثبت نام',
		'class' => 'pink text-center',
		'type' => 'submit'
));
$formClose = form_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= @$title ?></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
		  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/xm-yekan" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="<?= asset_url() ?>css/authentication.css">

</head>
<body>
<!-- partial:index.partial.html -->


<?php
if (@$loginFailureMessage != '') echo "<span style='color:red'>" . $loginFailureMessage . "</span>";
?>

<?php if (isset($resultMessage)) {
	echo "<span style='color:green'>" . $resultMessage . "</span>";
} ?>

<div id="app">
	<section class="auth-box shadow" id="app">
		<section class="login">
			<section class="header">
				<h2>ورود</h2>
			</section>
			<section class="item-list">
				<section class="item shadow">
					<i class="fab fa-google"></i>
					<i class="fab fa-github"></i>
					<i class="fab fa-linkedin-in"></i>
				</section>
			</section>
			<section class="body">
				<?php
				if (isset($formErrors)) {
					foreach ($formErrors as $formError) {
						echo "<span style='color:red'>" . $formError . "</span>";
					}
				}
				?>
				<?= $loginFormOpen ?>
				<label for="email">
					<div class="w-100 text-right blue-color"><i class="far fa-envelope"></i></div>
					<?= $email ?>
				</label>
				<label for="password">
					<div class="w-100 text-right blue-color"><i class="fas fa-lock"></i></div>
					<?= $password ?>
				</label>
				<label class="d-flex flex-column">
					<?= $loginButton ?>
					<a href="" class="forget-password">
						فراموشی رمز عبور؟
					</a>
				</label>
				<?= $formClose ?>
			</section>
		</section>
		<section class="register">
			<section class="header">
				<h2>ثبت نام</h2>
			</section>
			<section class="item-list">
				<section class="item shadow">
					<i class="fab fa-google"></i>
					<i class="fab fa-github"></i>
					<i class="fab fa-linkedin-in"></i>
				</section>
			</section>
			<section class="body">
				<?php echo validation_errors(); ?>
				<?= $registerFormOpen ?>
				<label for="name">
					<div class="w-100 text-right pink-color"><i class="fas fa-user-alt"></i></div>
					<?= $fullName ?>
				</label>
				<label for="email">
					<div class="w-100 text-right pink-color"><i class="far fa-envelope"></i></div>
					<?= $email ?>
				</label>
				<label for="password">
					<div class="w-100 text-right pink-color"><i class="fas fa-lock"></i></div>
					<?= $password ?>
				</label>
				<label for="role">سمت:
					<div class="w-100 text-right pink-color"><i class="fas fa-lock"></i></div>
					<?= $userRole ?>
				</label>

				<label class="d-flex flex-column">
					<?= $signUpButton ?>
				</label>
				</form>
			</section>

		</section>
		<section class="box-color">
			<h3 class="title">هنوز ثبت نام نکردی؟</h3>
			<button type="button" class="register-btn pink text-center">ثبت نام</button>
			<h3 class="title2">قبلا ثبت نام کردی؟</h3>
			<button type="button" class="login-btn blue text-center">ورود</button>
		</section>
	</section>

</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src="<?= asset_url() ?>js/authentication.js"></script>

</body>
</html>
