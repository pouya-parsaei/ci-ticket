<?php

$formOpen = form_open('admin/support/create-new-support');

$supportEmail = form_input(array(
		'name' => 'email',
		'placeholder' => 'ایمیل خود را وارد نمایید.',
		'class' => 'form-control',
));

$supportPassword = form_password(array(
		'name' => 'password',
		'placeholder' => 'رمز عبور را وارد کنید. بین 5 تا 12 کاراکتر',
		'class' => 'form-control',
));

$supportFullName = form_input(array(
		'name' => 'full-name',
		'placeholder' => 'نام و نام خانوادگی خود را وارد نمایید.',
		'class' => 'form-control',
));

$options = array(
		null => 'انتخاب نمایید'
);
foreach ($departments as $department) {
	$options[$department->id] = $department->name;
}
$supportDepartment = form_dropdown('department', $options, '0', array(
		'class' => 'form-control'
));

$formButton = form_button(array(
		'value' => 'create-support',
		'name' => 'create-support',
		'content' => 'ارسال',
		'class' => 'btn btn-primary',
		'type' => 'submit'
));
$formClose = form_close();
?>
<h3>ساخت پشتیبان جدید</h3>
<div class="col-lg-8 col-md-8 col-sm-5">
	<?= $formOpen ?>

	<div class="form-group">
		<?= $supportEmail ?>
	</div>

	<div class="form-group">
		<?= $supportPassword ?>
	</div>

	<div class="form-group">
		<?= $supportFullName ?>
	</div>

	<div class="form-group">
		<?= $supportDepartment ?>
	</div>

	<div class="form-group">
		<?= $formButton ?>
	</div>
	<?= $formClose ?>
	<?php
	if (@$supportFormErrors != '') {
		foreach ($supportFormErrors as $supportFormError) {
			echo "<span style='color:red'>" . $supportFormError . "</span>";
		}
	}
	?>

	<?php
	if (@$userCreationErrorMessage != '') {
		echo "<span style='color: red'>$userCreationErrorMessage</span>";
	}
	?>

	<?php
	if (@$supportCreationErrorMessage != '') {
		echo "<span style='color: red'>$supportCreationErrorMessage</span>";
	}
	?>

	<?php
	if (@$supportCreationSuccessMessage != '') {
		echo "<span style='color: green'>$supportCreationSuccessMessage</span>";
	}
	?>


</div>
