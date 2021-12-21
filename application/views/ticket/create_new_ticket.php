<?php
$FormOpen = form_open('ticket/add-ticket');
$ticketTitle = form_input(array(
		'name' => 'ticket-title',
		'placeholder' => 'عنوان تیکت را وارد نمایید',
		'class' => 'form-control',
));
$options = array(
		null => 'انتخاب نمایید'
);
foreach ($departments as $department) {
	$options[$department->id] = $department->name;
}
$ticketDepartment = form_dropdown('department', $options, '0', array(
		'class' => 'form-control'
));

$ticketContent = form_textarea(array(
		'name' => 'ticket-content',
		'placeholder' => 'متن تیکت را وارد نمایید',
		'class' => 'form-control',
		'id' => 'ticket-content'
));

$form_button = form_button(array(
		'value' => 'create_ticket',
		'name' => 'create_ticket',
		'content' => 'ارسال',
		'class' => 'btn btn-primary',
		'type' => 'submit'
));
$formClose = form_close();
?>

<div class="col-lg-5 col-md-5 col-sm-5">
	<?= $FormOpen ?>
	<div class="form-group">
		<label for="username">عنوان تیکت</label>
		<?= $ticketTitle ?>
	</div>
	<div class="form-group">
		<label for="username">دپارتمان</label>
		<?= $ticketDepartment ?>
	</div>
	<div class="form-group">
		<label for="username">متن تیکت</label>
		<?= $ticketContent ?>
	</div>
	<div class="form-group">
		<?= $form_button ?>
	</div>
	<?= $formClose ?>

	<?php
	if (@$ticketFormErrors != '') {
		foreach ($ticketFormErrors as $ticketFormError) {
			echo "<span style='color:red'>" . $ticketFormError . "</span>";
		}
	}
	?>

	<?php
	if (@$ticketInsertionSuccessMessage != '') {
		echo "<span style='color: green'>$ticketInsertionSuccessMessage</span>";
	}
	?>
