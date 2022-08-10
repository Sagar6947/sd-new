<?php
$image = runQuery("SELECT company_name, company_logo, company_banner FROM company WHERE rgid = '" . sessionId('login_user_id') . "' ");
if (sessionId('sahar')) {
	foreach ($image as $img) {
?>
		<section class="bg-cover position-relative" style="background:red url(uploads/company/<?= $img['company_banner']; ?>) no-repeat;" data-overlay="3">
		<?php
	}
} else {
		?>
		<section class="bg-cover position-relative" style="background:red url(assets/images/default-banner.png) no-repeat;" data-overlay="3">
		<?php
	}
		?>

		<div class="abs-list-sec right_pos <?= sessionId('sahar') ? "" : "d-none"; ?>"><a href="" class="add-list-btn"><i class="fas fa-id-card me-2"></i>Visit your vcard/website</a></div>
		<div class="abs-list-sec <?= sessionId('sahar') ? "" : "d-none"; ?>"><a href="dashboard-add-listing.php" class="add-list-btn"><i class="fas fa-plus me-2"></i>Add Product</a></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

					<div class="dashboard-head-author-clicl">
						<div class="dashboard-head-author-thumb">
							<?php
							if (sessionId('sahar')) {
								foreach ($image as $img) {
							?>
									<img src="<?= base_url() ?>uploads/company/<?= $img['company_logo']; ?>" class="img-fluid" alt="company-logo" />
								<?php
								}
							} else {
								?>
								<img src="<?php echo base_url() . 'assets/images/user_logo.png' ?>" class="img-fluid" alt="company-logo" />
							<?php
							}
							?>

						</div>
						<div class="dashboard-head-author-caption">
							<div class="dashploio">
								<h4><?= sessionId('login_user_name'); ?></h4>
							</div>
							<div class="dashploio"><span class="agd-location"><i class="lni lni-phone me-1"></i><?= sessionId('login_user_contact'); ?></span></div>
							<div class="dashploio"><span class="agd-location"><i class="lni lni-envelope me-1"></i><?= sessionId('login_user_emailid'); ?></span></div>

						</div>
					</div>
				</div>
			</div>
		</div>
		</section>