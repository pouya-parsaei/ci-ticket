<div class="col-lg-9 col-md-9 col-sm-9">
	<div class="table-responsive">
		<table class="table">
			<thead>
			<th>ردیف</th>
			<th>نام دپارتمان</th>
			<th>عملیات</th>
			</thead>
			<tbody>
			<?php $i = 1;
			foreach ($departments as $department):
				?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $department->name ?></td>
					<td>
						<a href="<?= base_url("admin/department/rename/{$department->id}") ?>" class="btn btn-info">تغییر نام</a>
						<a href="<?= base_url("admin/department/toggle/{$department->id}") ?>" class="btn btn-<?= $department->status ? 'warning':'success' ?>">
							<?= $department->status ? 'غیرفعال':'فعال' ?>
						</a>
						<a href="<?= base_url("admin/department/delete/{$department->id}") ?>" class="btn btn-danger" onclick="return confirm('دپارتمان <?= $department->name ?> حذف شود؟');" >حذف</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
