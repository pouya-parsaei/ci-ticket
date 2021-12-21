<div class="col-lg-7 col-md-7">
	<div class="table-responsive">
		<table class="table">
			<thead>
			<tr>
				<th>ردیف</th>
				<th>ایمیل</th>
				<th>نام و نام خانوادگی</th>
				<th>عملیات</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			foreach ($users as $user): ?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $user->email ?></td>
					<td><?= $user->full_name ?></td>
					<td>
						<a href="<?= base_url() ?>/admin/user/toggle-user-status/<?= $user->id ?>" class="btn btn-<?= $user->status ? 'warning' : 'success' ?>">
							<?= $user->status ? 'غیرفعالسازی' : 'فعالسازی' ?>
						</a>
					</td>
				</tr>
				<?php
				++$i;
			endforeach; ?>
			</tbody>
		</table>
	</div>

</div>
