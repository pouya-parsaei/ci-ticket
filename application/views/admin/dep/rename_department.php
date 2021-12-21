<?php
$FormOpen = form_open('');
$department_name = form_input(array(
		'name' => 'department_name',
		'placeholder' => 'نام دپارتمان را وارد کنید',
		'class' => 'form-control',
		'value' => @$currentDepartmentName->name
));
$form_button = form_button(array(
		'value' => 'rename_department',
		'name' => 'rename_department',
		'content' => 'ارسال',
		'class' => 'btn btn-primary',
		'type' => 'submit'
));
$formClose = form_close();

?>

<div class="col-lg-5 col-md-5 col-sm-5">
	<?= $FormOpen ?>
	<div class="form-group">
		<label for="username">نام دپارتمان</label>
		<?= $department_name ?>
	</div>
	<?= $form_button ?>
	<?= $formClose ?>

	<?php if (@$updateDepartmentResult != ''): ?>
		<div class="alert alert-success"><?= $updateDepartmentResult ?></div>
	<?php endif; ?>
	<?php if (@$createDepartmentFormError != ''): ?>
		<div class="alert alert-danger"><?= $createDepartmentFormError ?></div>
	<?php endif; ?>
