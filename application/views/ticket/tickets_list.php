<?php

use Hekmatinasser\Verta\Verta;

?>
<?php if ($this->session->userdata('role') == 'admin'): ?>
	<a href="<?= base_url() ?>admin/tickets-list" class="btn btn-primary">همه تیکت ها</a>
	<?php foreach (@$departments as $department): ?>
		<a href="<?= base_url() ?>admin/tickets-list/<?= $department->id ?>"
		   class="btn btn-primary"><?= $department->name ?></a>
	<?php endforeach; ?>
<?php endif; ?>
<div class="table-responsive">
	<table class="table">
		<thead>
		<tr>
			<th>ردیف</th>
			<th>عنوان تیکت</th>
			<?php if (@$showUsernameColumn): ?>
				<th>ارسال کننده</th>
			<?php endif; ?>
			<th>تاریخ ثبت</th>
			<?php if (@$departments != null): ?>
				<th>دپارتمان مربوطه</th>
			<?php endif; ?>
			<th>وضعیت</th>
			<th>عملیات</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$i = 1;
		foreach ($tickets as $ticket):
			?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $ticket->title ?></td>
				<?php if (@$showUsernameColumn): ?>
					<td><?= $ticket->owner ?></td>
				<?php endif; ?>
				<td><?= Verta::instance($ticket->created_at)->format('%d %B ، %Y') ?></td>
				<?php if (@$departments != null): ?>
					<td><?= @$ticket->department ?></td>
				<?php endif; ?>

				<td>
					<?php if ($ticket->status === 0): ?>
						<div class="bg-warning">منتظر پاسخ</div>
					<?php endif; ?>
					<?php if ($ticket->status === 1): ?>
						<div class="bg-warning">پاسخ داده شده</div>
					<?php endif; ?>
					<?php if ($ticket->status === 2): ?>
						<div class="bg-warning">بسته شده توسط کاربر</div>
					<?php endif; ?>
					<?php if ($ticket->status === 3): ?>
						<div class="bg-warning">بسته شده توسط پشتیبان</div>
					<?php endif; ?>
					<?php if ($ticket->status === 4): ?>
						<div class="bg-warning">بسته شده توسط مدیر</div>
					<?php endif; ?>

				</td>
				<td>
					<a href="<?= base_url("ticket/show-ticket/{$ticket->id}") ?>" class="btn btn-primary">مشاهده</a>
					<a href="<?= base_url("ticket/close-ticket/{$ticket->id}") ?>" class="btn btn-danger">بستن</a>
				</td>
			</tr>
			<?php
			++$i;
		endforeach;
		?>
		</tbody>
	</table>
</div>
