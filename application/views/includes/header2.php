<div class="header header-light dark-text head-shadow">
	<div class="container">
		<nav id="navigation" class="navigation navigation-landscape">
			<div class="nav-header">
				<a class="nav-brand" href="./index.php">
					<img src="assets/images/logo-white.png" class="logo" alt="" />
				</a>
				<div class="nav-toggle"></div>
				<div class="mobile_nav">
					<ul>
						<li>
							<a href="" class="crs_yuo12 w-auto text-dark gray">
								<span class="embos_45"><i class="lni lni-power-switch mr-1 mr-1"></i>Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="nav-menus-wrapper" style="transition-property: none;">


				<ul class="nav-menu pabs">
					<li class=""><a href="<?= base_url() ?>">Home</a>
					</li>
					<li><a href="blog.php">Blogs</a>
					</li>
					<li><a href="view-services.php">Listing</a>
					</li>
					<?php
					if ($this->session->has_userdata('login_user_id')) {
					?>
						<li><a href="<?= base_url('dashboard') ?>">Dashboard</a>
						</li>
					<?php
					}
					?>
				</ul>


				<ul class="nav-menu nav-menu-social align-to-right">

					<?php
					if ($this->session->has_userdata('login_user_id')) {
					?>
						<li class="add-listing gray">
							<a href="<?= base_url() ?>logout">
								<i class="lni lni-user mr-1"></i> Logout
							</a>
						</li>
					<?php
					} else {
					?>
						<li class="add-listing gray">
							<a href="<?= base_url('login') ?>">
								<i class="lni lni-power-switch mr-1"></i> Login
							</a>
						</li>
					<?php
					}
					?>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>