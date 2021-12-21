<div class="col-lg-8 col-md-8">
	<div class="table-responsive">
		<table class="table">
			<thead>
			<tr>
				<td>ردیف</td>
				<td>نام و نام خانوادگی</td>
				<td>دپارتمان مربوطه</td>
				<td>وضعیت</td>
				<td>عملیات</td>
			</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			foreach ($supports as $support):
				?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $support->full_name ?></td>
					<td><?= $support->department ?></td>
					<td><?= $support->status ? 'فعال' : 'غیرفعال' ?></td>
					<td>
						<a href="<?= base_url() ?>admin/support/edit/<?= $support->id ?>" class="btn btn-primary">ویرایش</a>
						<a href="<?= base_url() ?>admin/support/toggle-status/<?= $support->id ?>"
						   class="btn btn-<?= $support->status ? 'warning' : 'success' ?>">
							<?= $support->status ? 'غیرفعالسازی' : 'فعالسازی' ?>
						</a>
					</td>
				</tr>
				<?php
				++$i;
			endforeach;
			?>
			</tbody>
		</table>
	</div>

</div>
