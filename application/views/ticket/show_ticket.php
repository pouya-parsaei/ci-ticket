<?php

use Hekmatinasser\Verta\Verta;

?>
<div class="col-lg-8 col-md-8">
	<div class="card">
		<div class=" card-header">
			<h3 class="card-title"><?= $ticket->title ?></h3>
		</div>
		<div class="card-body">

			<?= $ticket->content ?>
		</div>
		<div class="card-footer">
			تاریخ ثبت تیکت:<?= Verta::instance($ticket->created_at)->format('%d %B ، %Y - H:i'); ?>
		</div>
	</div>

	<!-- show answers list -->

	<?php if (!empty(@$answers)): ?>
		<div class="card" style="margin-top:10px !important">
			<div class="card_body">
				<?php foreach ($answers as $answer): ?>
					<div class="alert alert-<?= $answer->user_role != 'support' ? 'info' : 'success' ?>" role="alert">
						<?= "{$answer->full_name}:" ?>
						<?= $answer->answer_content ?>
						<br>
						<?= Verta::instance($answer->created_at)->format('%d %B ، %Y - H:i'); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
	<div style="margin-top: 20px">
		<h3>پاسخ به تیکت</h3>
		<form action="<?= base_url('ticket/create-answer/') ?><?= $ticket->id ?>" method="POST">
		<textarea name="ticket-answer-content" id="ticket-answer-content" cols="30" rows="10"
				  class="form-control"></textarea>
			<button name="send-ticket-answer" class="btn btn-success" style="margin-top: 10px">ارسال</button>
		</form>
	</div>
	<?php
	if (@$ticketAnswerFormErrors != '') {
		foreach ($ticketAnswerFormErrors as $ticketAnswerFormError) {
			echo "<span style='color:red'>" . $ticketAnswerFormError . "</span>";
		}
	}
	?>

	<?php
	if (@$updateTicketStatusFailureMessage != '') {
		echo "<span style='color: red'>$updateTicketStatusFailureMessage</span>";
	}
	?>

	<?php
	if (@$answerInsertionFailureMessage != '') {
		echo "<span style='color: red'>$answerInsertionFailureMessage</span>";
	}
	?>

	<?php
	if (@$answerInsertionResult != '') {
		echo "<span style='color: green'>$answerInsertionResult</span>";
	}
	?>
</div>



