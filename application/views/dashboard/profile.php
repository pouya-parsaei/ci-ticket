<?php
$editFormOpen = form_open('');
$fullName = form_input(array('class' => 'form-control','name' => 'full_name', 'placeholder' => 'نام کامل خود را وارد کنید','value' =>@$userInfo->full_name));
$email = form_input(array('class' => 'form-control','name' => 'email', 'placeholder' => 'ایمیل خود را وارد کنید','value' =>@$userInfo->email));
$password = form_password(array('class' => 'form-control','name' => 'password', 'placeholder' => 'رمز خود را وارد کنید','value' =>@$userInfo->password));
$editButton = form_button(array(
	'value' => 'edit_profile',
	'name' => 'edit_profile',
	'content' => 'ویرایش پروفایل',
	'class' => 'btn btn-primary',
	'type' => 'submit'
));
$formClose = form_close();
?>
<section class="body">

	<?= $editFormOpen ?>

		<div class="w-100 text-right pink-color form-group">
			<label for="name">نام و نام خانوادگی
		<?= $fullName ?>
			</label>
		</div>
	<div class="w-100 text-right pink-color form-group">
		<label for="email">ایمیل
			<?= $email ?>
		</label>
	</div>
	<div class="w-100 text-right pink-color form-group">
		<label for="email">رمز عبور
			<?= $password ?>
		</label>
	</div>
	<div class="w-100 text-right pink-color form-group">
			<?= $editButton ?>
	</div>
	<?= $formClose ?>
</section>
<?php
	if(@$updateMessageSuccessfull != ''){
		echo "<span style='color: green'>$updateMessageSuccessfull</span>";
	}
?>
<?php
if (isset($formErrors)) {
	foreach ($formErrors as $formError) {
		echo "<span style='color:red'>" . $formError . "</span>";
	}
}
?>
