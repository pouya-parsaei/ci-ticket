<?php

$formOpen = form_open("admin/support/update/{$support->id}",['method'=>'POST']);

$supportEmail = form_input(array(
	'name' => 'email',
	'placeholder' => 'ایمیل خود را وارد نمایید.',
	'class' => 'form-control',
	'value' =>$support->email
));

$supportPassword = form_password(array(
	'name' => 'password',
	'placeholder' => 'رمز عبور را وارد کنید. بین 5 تا 12 کاراکتر',
	'class' => 'form-control',
	'value' =>$support->password
));

$supportFullName = form_input(array(
	'name' => 'full-name',
	'placeholder' => 'نام و نام خانوادگی خود را وارد نمایید.',
	'class' => 'form-control',
	'value' =>$support->full_name
));

$options = array(
	null => 'انتخاب نمایید'
);
foreach ($departments as $department) {
	$options[$department->id] = $department->name;
}
$supportDepartment = form_dropdown('department', $options, $support->selectedDepartment, array(
	'class' => 'form-control'
));

$formButton = form_button(array(
	'value' => 'update-support',
	'name' => 'update-support',
	'content' => 'ارسال',
	'class' => 'btn btn-primary',
	'type' => 'submit'
));
$formClose = form_close();
?>
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
	if (@$userUpdateErrorMessage != '') {
		echo "<span style='color: red'>$userUpdateErrorMessage</span>";
	}
	?>

	<?php
	if (@$supportUpdateErrorMessage != '') {
		echo "<span style='color: red'>$supportUpdateErrorMessage</span>";
	}
	?>

	<?php
	if (@$emailError != '') {
		echo "<span style='color: red'>$emailError</span>";
	}
	?>

	<?php
	if (@$supportUpdateSuccessMessage != '') {
		echo "<span style='color: #19a75e'>$supportUpdateSuccessMessage</span>";
	}
	?>


</div>
