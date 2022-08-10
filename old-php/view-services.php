<?php include 'includes/header-link.php';
include 'db_connect.php';
?>





<div id="main-wrapper">


	<!-- Start Navigation -->
	<?php include 'includes/header2.php' ?>
	<!-- End Navigation -->

	


	<section class="space min gray">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="sec_title position-relative text-center mb-5">
						<h6 class="mb-0 theme-cl">All Listing</h6>
						<h2 class="ft-bold">Companies</h2>
					</div>
				</div>
			</div>

			<!-- row -->
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
					<?php include 'filter.php' ?>
					<!-- Sidebar End -->

				</div>


				<div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">

					<!-- row -->
					<div class="row justify-content-center gx-3">


						<?php

						$limit = 20;

						if (isset($_GET['page'])) {
							$page = $_GET['page'];
						} else {
							$page = 1;
						}

						$offset = ($page - 1) * $limit;
						$services = "SELECT * FROM website_subservice LIMIT {$offset}, {$limit}";
						$res = mysqli_query($conn, $services) or die("Query Unsuccessful.");
						if (mysqli_num_rows($res) > 0) {

							while ($serv = mysqli_fetch_assoc($res)) {
						?>

								<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
									<div class="Goodup-grid-wrap">
										<div class="Goodup-grid-upper">
											<div class="Goodup-pos ab-left">
												<?php
												if ($serv['featured'] == 0) {
												?>
													<div class="Goodup-featured-tag">Featured</div>
												<?php
												}
												?>
											</div>
											<div class="Goodup-grid-thumb">
												<a href="" class="d-block text-center m-auto"><img src="assets/images/default-image.png" class="img-fluid" alt=""></a>
											</div>

										</div>
										<div class="Goodup-grid-fl-wrap">
											<div class="Goodup-caption px-3 py-2">

												<h4 class="mb-0 ft-medium medium"><a href="" class="text-dark fs-md"><?php echo $serv['name'] ?></a></h4>
												<div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>Delhi, India</div>
												<div class="Goodup-middle-caption mt-3">
													<!-- <p> <?php echo $serv['description'] ?> </p> -->
													<p> <?php echo mb_strimwidth($serv['description'], 0, 40, "...") ?> </p>
												</div>
											</div>
											<div class="Goodup-grid-footer py-2 px-3">
												<div class="Goodup-author"><a href="author-detail.html"><img src="assets/images/user_logo.png" class="img-fluid circle" alt=""></a></div>
												<div class="Goodup-ft-first">
													<a href="" class="Goodup-cats-wrap">
														<div class="cats-ico bg-5"><i class="lni lni-eye"></i></div><span class="cats-title">View Now</span>
													</a>
												</div>
												<div class="Goodup-ft-last">
													<div class="Goodup-inline">

														<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-heart-filled position-absolute"></i></button></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


						<?php
							}
						}
						?>

					</div>
					<!-- /row -->


					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<?php
							$sql1 = "SELECT * FROM website_subservice";
							$result1 = mysqli_query($conn, $sql1) or die("Query Failed");

							if (mysqli_num_rows($result1) > 0) {

								$total_records = mysqli_num_rows($result1);
								$limit = 3;
								$total_pages = ceil($total_records / $limit);

								echo '<ul class="pagination">';
								if ($page > 1) {
									echo '<li class="page-item">
							<a class="page-link" href="view-services.php?page=' . ($page - 1) . '" aria-label="Previous">
								<span class="fas fa-arrow-circle-left"></span>
								<span class="sr-only">Previous</span>
							</a>
						</li>';
								}
								for ($i = 1; $i <= $total_pages; $i++) {

									if ($i == $page) {
										$active = "active";
									} else {
										$active = "";
									}

									if ($i >= $page - 2 && $i <= $page + 2)
										echo '<li class="page-item ' . $active . '"><a class="page-link" href="view-services.php?page=' . $i . '">' . $i . '</a></li>';
								}

								if ($page > 1) {
									echo '<li class="page-item">
							<a class="page-link" href="view-services.php?page=' . ($page + 1) . '" aria-label="Previous">
								<span class="fas fa-arrow-circle-right"></span>
								<span class="sr-only">Previous</span>
							</a>
						</li>';
								}
								echo '</ul>';
							}
							?>



						</div>
					</div>


				</div>



			</div>
			<!-- row -->

		</div>
	</section>

	<section class="space min">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="sec_title position-relative text-center mb-4">
						<h6 class="theme-cl mb-0">Latest Blogs</h6>
						<h2 class="ft-bold">Pickup New Updates</h2>
					</div>
				</div>
			</div>

			<div class="row justify-content-center">

				<!-- Single Item -->
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="gup_blg_grid_box">
						<div class="gup_blg_grid_thumb">
							<a href=""><img src="assets/img/b-4.jpg" class="img-fluid" alt=""></a>
						</div>
						<div class="gup_blg_grid_caption">
							<div class="blg_tag"><span>Marketing</span></div>
							<div class="blg_title">
								<h4><a href="">What Is a VPN and How Does It Work?</a></h4>
							</div>
							<div class="blg_desc">
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
							</div>
						</div>
						<div class="crs_grid_foot">
							<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
								<div class="crs_fl_first">
									<div class="crs_tutor">
										<div class="crs_tutor_thumb"><a href="javascript:void(0);"><img src="assets/img/team-2.jpg" class="img-fluid circle" width="35" alt=""></a></div>
									</div>
								</div>
								<div class="crs_fl_last">
									<div class="foot_list_info">
										<ul>
											<li>
												<div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
												<div class="elsio_tx">10k Views</div>
											</li>
											<li>
												<div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
												<div class="elsio_tx">10 July 2021</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Single Item -->
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="gup_blg_grid_box">
						<div class="gup_blg_grid_thumb">
							<a href=""><img src="assets/img/b-5.jpg" class="img-fluid" alt=""></a>
						</div>
						<div class="gup_blg_grid_caption">
							<div class="blg_tag"><span>Business</span></div>
							<div class="blg_title">
								<h4><a href="">What Is Ransomware: The Ultimate Guide?</a></h4>
							</div>
							<div class="blg_desc">
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
							</div>
						</div>
						<div class="crs_grid_foot">
							<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
								<div class="crs_fl_first">
									<div class="crs_tutor">
										<div class="crs_tutor_thumb"><a href="javascript:void(0);"><img src="assets/img/team-3.jpg" class="img-fluid circle" width="35" alt=""></a></div>
									</div>
								</div>
								<div class="crs_fl_last">
									<div class="foot_list_info">
										<ul>
											<li>
												<div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
												<div class="elsio_tx">10k Views</div>
											</li>
											<li>
												<div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
												<div class="elsio_tx">10 July 2021</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Single Item -->
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="gup_blg_grid_box">
						<div class="gup_blg_grid_thumb">
							<a href=""><img src="assets/img/b-6.jpg" class="img-fluid" alt=""></a>
						</div>
						<div class="gup_blg_grid_caption">
							<div class="blg_tag"><span>Accounting</span></div>
							<div class="blg_title">
								<h4><a href="">Can iPads Get Viruses? What You Need</a></h4>
							</div>
							<div class="blg_desc">
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
							</div>
						</div>
						<div class="crs_grid_foot">
							<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
								<div class="crs_fl_first">
									<div class="crs_tutor">
										<div class="crs_tutor_thumb"><a href="javascript:void(0);"><img src="assets/img/team-5.jpg" class="img-fluid circle" width="35" alt=""></a></div>
									</div>
								</div>
								<div class="crs_fl_last">
									<div class="foot_list_info">
										<ul>
											<li>
												<div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
												<div class="elsio_tx">10k Views</div>
											</li>
											<li>
												<div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
												<div class="elsio_tx">10 July 2021</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>

	<?php include 'includes/footer.php' ?>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php include 'includes/footer-link.php' ?>