<?php include 'includes/header-link.php' ?>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

	<!-- ============================================================== -->
	<!-- Top header  -->
	<!-- ============================================================== -->
	<!-- Start Navigation -->
	<?php include 'includes/header.php' ?>
	<!-- ============================================================== -->
	<!-- Top header  -->
	<!-- ============================================================== -->

	<!-- ======================= Home Banner ======================== -->
	<div class="home-banner margin-bottom-0" style="background: url(assets/images/second-slide.jpg) no-repeat;" data-overlay="5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12">

					<div class="banner_caption text-center mb-5">
						<h1 class="banner_title ft-bold mb-1">Digital Impression,</br>
							The First Impression</h1>
						<p class="fs-md ft-medium">Sahar Directory Helps You To Get A Digital Impression Via Generating Your Company VCard Along</br> With Your Employees VCard Here That Is Smart & Elegant.</p>
					</div>



				</div>
				<div class="flex-box">
					<a href="javascript:void(0);" class="btn btn-md rounded hover-theme home_btn">See Details<i class="lni lni-arrow-right-circle ms-2"></i></a>
				</div>
			</div>

		</div>
	</div>
	<!-- ======================= Home Banner ======================== -->

	<!-- ======================= Home Search ======================== -->
	<section class="p-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-11 col-lg-12 col-md-12 col-12">

					<div class="Goodup-search-shadow">


						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="placesseach" role="tabpanel" aria-labelledby="placesseach-tab">
								<form class="main-search-wrap fl-wrap" action="<?= base_url('search') ?>" method="GET">
									<div class="main-search-item">
										<span class="search-tag"><i class="lni lni-keyboard"></i></span>
										<input type="text" class="form-control radius" placeholder="What are you looking for?" name="listing-name" />
									</div>
									<div class="main-search-item">
										<span class="search-tag"><i class="lni lni-map-marker"></i></span>
										<input type="text" class="form-control" placeholder="Location" name="listing-location" />
									</div>

									<div class="main-search-button">
										<button class="btn full-width theme-bg text-white" type="submit">Search</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ======================= Home Search End ======================== -->

	<!-- ======================= All Types Listing ======================== -->
	<section class="space min">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="sec_title position-relative text-center mb-5">
						<h6 class="theme-cl mb-0">Featured Listing</h6>
						<h2 class="ft-bold">Companies</h2>
					</div>
				</div>
			</div>

			<!-- row -->
			<div class="row align-items-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


					<ul class="nav nav-tabs small-tab mb-3" id="myTabs" role="tablist">
						<?php
						if (!empty($companycate)) {
							$j = 0;
							foreach ($companycate as $row) {
						?>
								<li class="nav-item" role="presentation">
									<button class="nav-link <?php echo ($j == 0) ? "active" : ""; ?>" id="<?php echo $row['category']; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $row['category']; ?>" type="button" role="tab" aria-controls="auto_care" aria-selected="true"><?php echo $row['category']; ?></button>
								</li>

						<?php
								$j++;
							}
						}
						?>
					</ul>

				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="tab-content" id="myTabsContent">
						<?php
						$get_category = runQuery("SELECT * FROM company_category WHERE premium = '0' LIMIT 7");

						$i = 0;
						foreach ($get_category as $row) {
							$services = runQuery("SELECT * FROM website_subservice WHERE service_id = '" . $row['cate_id'] . "'  LIMIT 4");
							if (!empty($services)) {
						?>
								<div class="tab-pane fade <?php echo ($i == 0) ?  "show active" : "fade"; ?> " id="<?php echo $row['category']; ?>" role="tabpanel" aria-labelledby="<?php echo $row['category']; ?>-tab">
									<div class="row justify-content-center">

										<?php
										foreach ($services as $serv) {
										?>
											<!-- Single -->
											<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
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
															<div class="Goodup-author"><a href="author-detail.html"><img src="assets/images/user_logo.png" class="img-fluid circle" alt=""></a></div>
															<h4 class="mb-0 ft-medium medium"><a href="service-detail.php?id=<?php echo $serv['id']; ?>" class="text-dark fs-md"><?php echo $serv['name']; ?></a></h4>
															<div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>Delhi, India</div>
															<div class="Goodup-middle-caption mt-3">
																<p><?php echo $serv['description']; ?></p>
															</div>
														</div>
														<div class="Goodup-grid-footer py-2 px-3">
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
										?>

										<div class="flex-box">
											<a href="view-services.php" class="btn btn-md rounded hover-theme home_btn">View All<i class="lni lni-arrow-right-circle ms-2"></i></a>
										</div>

										<!-- Single -->


									</div>
								</div>

						<?php
							}
							$i++;
						}
						?>
					</div>
				</div>
			</div>
			<!-- /row -->

		</div>
	</section>
	<!-- ======================= All Types Listing ======================== -->

	<!-- ==========categories======== -->

	<section class="space min gray">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="sec_title position-relative text-center mb-5">
						<h6 class="mb-0 theme-cl">Popular Categories</h6>
						<h2 class="ft-bold">Browse Top Categories</h2>
					</div>
				</div>
			</div>

			<!-- row -->
			<div class="row align-items-center">


				<?php
				foreach ($category as $row1) {
				?>
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
						<div class="cats-wrap text-center">
							<a href="cate-listing.php?list=<?php echo $row1['cate_id'] ?>" class="Goodup-catg-wrap">
								<div class="Goodup-catg-caption">
									<h4 class="fs-md mb-0 ft-medium m-catrio"><?php echo $row1['category']; ?></h4>
									<?php
									$num = getNumRows('website_subservice', array('service_id' => $row1['cate_id']));
									echo '<span class="text-muted">' . $num . ' Listings</span>';
									?>
								</div>
							</a>
						</div>
					</div>
				<?php
				}
				?>

				</ul>

				<div class="flex-box">
					<a href="category.php" class="btn btn-md rounded hover-theme home_btn">View More<i class="lni lni-arrow-right-circle ms-2"></i></a>
				</div>
			</div>
			<!-- row -->

		</div>
	</section>

	<!-- ======================= About Start ============================ -->
	<section class="space">
		<div class="container">

			<div class="row align-items-center justify-content-between">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="m-spaced">
						<div class="position-relative">
							<div class="mb-2"><span class="bg-light-sky text-sky px-2 py-1 rounded">About Us</span></div>
							<h2 class="ft-bold mb-3">Digital Impression Is,</h2>
							<p class="mb-2">The First Impression Sahar Directory Helps You To Get A Digital Impression Via Generating Your Company VCard Along With Your Employees VCard And Website Here That Is Smart & Elegant.</p>

							<p class="mb-2">As Sahar Directory Is A Part Of Ekaum Enterprises, We Will Join All Are Upcoming Successors To This Platform. By Providing Them The Platform Where They Can Present Themselves Digitally To Their Potential Clients.</p>


						</div>
						<div class="position-relative row box_shadow">
							<div class="col-lg-3 col-md-3 col-3">
								<h3 class="ft-bold text-sky mb-0"><span class="count">48</span>+</h3>
								<p class="ft-medium">Register Companies</p>
							</div>
							<div class="col-lg-3 col-md-3 col-3">
								<h3 class="ft-bold text-warning mb-0"><span class="count">86</span>k+</h3>
								<p class="ft-medium">Register Employees</p>
							</div>
							<div class="col-lg-3 col-md-3 col-3">
								<h3 class="ft-bold text-danger mb-0"><span class="count">134</span>+</h3>
								<p class="ft-medium">Happy Client</p>
							</div>
							<div class="col-lg-3 col-md-3 col-3">
								<h3 class="ft-bold text-blue mb-0"><span class="count">43</span>+</h3>
								<p class="ft-medium">Feedbacks</p>
							</div>
							<div class="col-lg-12 col-md-12 col-12 mt-3">
								<a href="javascript:void(0);" class="btn btn-md theme-bg-light rounded theme-cl hover-theme">Add Listing<i class="lni lni-arrow-right-circle ms-2"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
					<div class="position-relative">
						<img src="assets/images/about-us.jpg" class="img-fluid b-radius" alt="" />
					</div>
				</div>
			</div>

		</div>
	</section>


	<section class="space min gray">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="sec_title position-relative text-center mb-5">
						<h6 class="mb-0 theme-cl">Working Process</h6>
						<h2 class="ft-bold">How It Working</h2>
					</div>
				</div>
			</div>

			<div class="row align-items-center">

				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
					<div class="wrk-pro-box first">
						<div class="wrk-pro-box-icon"><i class="ti-list-ol text-success"></i></div>
						<div class="wrk-pro-box-caption">
							<h4>Your Logo, Name and Contact details</h4>
							<p>vCard will start with your Logo then your Name and contact details</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
					<div class="wrk-pro-box sec">
						<div class="wrk-pro-box-icon"><i class="ti-user theme-cl"></i></div>
						<div class="wrk-pro-box-caption">
							<h4>Social Links and about yourself</h4>
							<p>Add your Social Links and some description about yourself</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
					<div class="wrk-pro-box thrd">
						<div class="wrk-pro-box-icon"><i class="ti-shield text-sky"></i></div>
						<div class="wrk-pro-box-caption">
							<h4>Get your Vcard</h4>
							<p>Get A Digital Impression Via Generating Your Company VCard Along With Your Employees VCard.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- =============blogs-=============== -->
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
				<?php
				if (!empty($blogs)) {
					foreach ($blogs as $blog) {
				?>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="gup_blg_grid_box">
								<div class="gup_blg_grid_thumb">
									<a href="blog-detail.php?blog=<?php echo $blog['blog_id']; ?>"><img src="uploads/blogs/<?php echo 'blog-min.jpg'; ?>" class="img-fluid" alt=""></a>
								</div>
								<div class="gup_blg_grid_caption">

									<div class="blg_title">
										<h4><a href="blog-detail.php?blog=<?php echo $blog['blog_id']; ?>"><?php echo $blog['blog_name']; ?></a></h4>
									</div>
									<div class="blg_desc">
										<p><?php echo $blog['blog_content']; ?></p>
									</div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex br-top px-3 py-2">
										<div class="crs_fl_last">
											<div class="foot_list_info">
												<ul class="blog_ul">
													<li>
														<div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
														<a href="blog-detail.php?blog=<?php echo $blog['blog_id']; ?>">Read More</a>
													</li>
													<li class="text-right">
														<div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
														<div class="elsio_tx"><?php echo date_format(date_create($blog['created_date']), 'd--M--Y') ?></div>
													</li>
												</ul>
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

				<!-- Single Item -->



			</div>

			<div class="flex-box">
				<a href="blog.php" class="btn btn-md rounded hover-theme home_btn">View More<i class="lni lni-arrow-right-circle ms-2"></i></a>
			</div>

		</div>
	</section>


	<?php include 'includes/footer.php' ?>
	<!-- ============================ Footer End ================================== -->

</div>

<!-- ============================================================== -->
<!-- All Jquery -->
<?php include 'includes/footer-link.php' ?>