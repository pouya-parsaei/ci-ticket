<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= asset_url() ?>panel/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
			 class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">پنل <?= $this->session->userdata('role') == 'admin' ? 'مدیریت' : 'کاربری' ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar" style="direction: ltr">
		<div style="direction: rtl">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?= "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->session->userdata('email')))) ?>"
						 class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="<?= base_url() ?>profile/edit"
					   class="d-block"><?= $this->session->userdata('full_name') ?></a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
					<?php if ($this->session->userdata('role') == 'admin'): ?>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-pie-chart"></i>
								<p>
									مدیریت کاربران
									<i class="right fa fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url() ?><?= base_url() ?><?= $this->session->userdata('role') == 'admin' ? 'admin' : 'ticket' ?>admin/users-list"
									   class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>نمایش همه کاربران</p>
									</a>
								</li>

							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-pie-chart"></i>
								<p>
									مدیریت پشتیبان ها
									<i class="right fa fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/support/all" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>نمایش و ویرایش پشتیبان ها</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/support/add-support" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>افزودن پشتیبان</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-tree"></i>
								<p>
									مدیریت دپارتمان ها
									<i class="fa fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/department/create" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>افزودن دپارتمان</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/department/list" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>نمایش و ویرایش دپارتمان</p>
									</a>
								</li>
							</ul>
						</li>
					<?php endif; ?>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-edit"></i>
							<p>
								مدیریت تیکت ها
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url() ?>
								<?php if ($this->session->userdata('role') == 'admin'): ?>
									<?= 'admin/tickets-list' ?>
								<?php endif; ?>
								<?php if ($this->session->userdata('role') == 'user'): ?>
									<?= 'ticket/tickets-list' ?>
								<?php endif; ?>
								<?php if ($this->session->userdata('role') == 'support'): ?>
									<?= 'support/unread-tickets' ?>
								<?php endif; ?>"

								class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>تیکت ها<?= $this->session->userdata('role') == 'support' ? 'ی خوانده نشده':'' ?></p>
								</a>

							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url() ?>ticket/add-ticket" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>افزودن تیکت</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-header">متفاوت</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>profile/edit" class="nav-link">
							<i class="nav-icon fa fa-file"></i>
							<p>ویرایش پروفایل</p>
						</a>
					</li>

				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
	</div>
	<!-- /.sidebar -->
</aside>  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('dashboard') ?>" class="brand-link">
		<img src="<?= asset_url() ?>panel/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
			 class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">پنل <?= $this->session->userdata('role') == 'admin' ? 'مدیریت' : 'کاربری' ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar" style="direction: ltr">
		<div style="direction: rtl">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?= "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->session->userdata('email')))) ?>"
						 class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="<?= base_url() ?>profile/edit"
					   class="d-block"><?= $this->session->userdata('full_name') ?></a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->

					<?php if ($this->session->userdata('role') == 'admin'): ?>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-pie-chart"></i>
								<p>
									مدیریت کاربران
									<i class="right fa fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/users-list" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>نمایش همه کاربران</p>
									</a>
								</li>


							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-pie-chart"></i>
								<p>
									مدیریت پشتیبان ها
									<i class="right fa fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/support/all" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>نمایش و ویرایش پشتیبان ها</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/support/add-support" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>افزودن پشتیبان</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-tree"></i>
								<p>
									مدیریت دپارتمان ها
									<i class="fa fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/department/create" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>افزودن دپارتمان</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>admin/department/list" class="nav-link">
										<i class="fa fa-circle-o nav-icon"></i>
										<p>نمایش و ویرایش دپارتمان</p>
									</a>
								</li>
							</ul>
						</li>
					<?php endif; ?>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-edit"></i>
							<p>
								مدیریت تیکت ها
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url() ?>
								<?php if ($this->session->userdata('role') == 'admin'): ?>
									<?= 'admin/tickets-list' ?>
								<?php endif; ?>
								<?php if ($this->session->userdata('role') == 'user'): ?>
									<?= 'ticket/tickets-list' ?>
								<?php endif; ?>
								<?php if ($this->session->userdata('role') == 'support'): ?>
									<?= 'support/unread-tickets' ?>
								<?php endif; ?>"
								class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>تیکت ها<?= $this->session->userdata('role') == 'support' ? 'ی خوانده نشده':'' ?></p>
								</a>

							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url() ?>ticket/add-ticket" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>افزودن تیکت</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-header">متفاوت</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>profile/edit" class="nav-link">
							<i class="nav-icon fa fa-file"></i>
							<p>ویرایش پروفایل</p>
						</a>
					</li>


				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
	</div>
	<!-- /.sidebar -->
</aside>
