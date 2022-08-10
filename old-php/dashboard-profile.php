<?php include 'includes/header-link.php';

include 'db_connect.php';

session_start();

if (!isset($_SESSION["username"])) {
	header("Location: {$hostname}login.php");
}
?>

<div id="main-wrapper">


	<?php include 'includes/header2.php' ?>

	<!-- =============================== Dashboard Header ========================== -->
	<?php include 'includes/dash-top-header.php' ?>
	<!-- ======================= dashboard sidebar ======================== -->

	<div class="goodup-dashboard-wrap gray px-4 py-5">
		<?php include 'includes/dash-side-header.php' ?>

		<!-- ======dashboard wrapper======== -->

		<div class="goodup-dashboard-content">
			<div class="dashboard-tlbar d-block mb-5">
				<div class="row">
					<div class="colxl-12 col-lg-12 col-md-12">
						<h1 class="ft-medium">Complete Your Profile</h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
								<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="#" class="theme-cl">My Profile</a></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="dashboard-widg-bar d-block">
				<div class="row">
					<div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">
						<form method="POST" id="myform" action="insert-listing.php" enctype="multipart/form-data">
							<div class="submit-form">
								<!-- Listing Info -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file me-2 theme-cl fs-sm"></i>Company Info</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Company Name</label>
													<input type="text" class="form-control rounded" placeholder="Enter your company name" name="company_name" required />
												</div>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Company Tagline</label>
													<input type="text" class="form-control rounded" placeholder="Enter Your company tagline " name="company_tagline" required/>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Your Name</label>
													<input type="text" class="form-control rounded" placeholder="Enter your name " name="company_person" required/>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Your Designation</label>
													<input type="text" class="form-control rounded" placeholder="Enter your destignation" name="company_designation" required/>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Mobile</label>
													<input type="text" class="form-control rounded" placeholder="Enter your number" name="company_contact" maxlength="10" required />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Email</label>
													<input type="text" class="form-control rounded" placeholder="Enter your email" name="company_email"  required/>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Whatsapp</label>
													<input type="text" class="form-control rounded" placeholder="Enter your whatsapp number" name="company_whatsapp" maxlength="10" required/>
												</div>
											</div>
											<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Website (Optional)</label>
													<input type="text" class="form-control rounded" placeholder="Your website link" name="company_website_url" />
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Location Info -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fas fa-map-marker-alt me-2 theme-cl fs-sm"></i>Company Category</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Category</label>
													<select class="form-control" name="company_category" id="company_category" required>
														<option>Select Category</option>
														<?php
														$select_category_main = $conn->query("SELECT * FROM company_category");
														while ($select_category_row2 = $select_category_main->fetch_assoc()) {
														?>
															<option value="<?= $select_category_row2['cate_id'] ?>"><?= $select_category_row2['category'] ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="form-label">Sub Category <span style="color:red;font-size:12px;" id="company_city_msg"></span></label>
													<select name="company_subcategory" class="form-control" id="company_subcategory" required>
														<option value="">Select Sub Category</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>




								<!-- Image & Gallery Option -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-camera me-2 theme-cl fs-sm"></i>Image</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<!-- Logo -->
											<div class="col-lg-6 col-md-6">
												<div class="form-group">
													<label for="formFileLg" class="form-label">Upload Company Logo</label>
													<input class="form-control rounded" type="file" name="company_logo" required>
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="form-group">
													<label for="formFileLg" class="form-label">Upload Company Banner</label>
													<input class="form-control rounded" type="file" name="company_banner" required>
												</div>
											</div>

										</div>
									</div>
								</div>

								<!-- Location Info -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fas fa-map-marker-alt me-2 theme-cl fs-sm"></i>Location Info</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">State</label>
													<select class="form-control" name="company_state" id="state" required>
														<option>Select State</option>
														<?php
														$select_category = $conn->query("SELECT * FROM tbl_state");
														while ($select_category_row = $select_category->fetch_assoc()) {
														?>
															<option value="<?= $select_category_row['state_id'] ?>"><?= $select_category_row['state_name'] ?></option>
														<?php


														}
														?>
													</select>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="form-label">City <span style="color:red;font-size:12px;" id="company_city_msg"></span></label>
													<select name="company_city" class="form-control" id="city" required>
														<option value="">Select State first</option>
													</select>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Address</label>
													<input type="text" class="form-control rounded" placeholder="Enter Your address here" name="company_address" required/>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Pin Code</label>
													<input type="text" class="form-control rounded" placeholder="Pin code" name="pin_code" required/>
												</div>
											</div>
											
										</div>
									</div>
								</div>



								<!-- Social Links -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-user-friends me-2 theme-cl fs-sm"></i>Social Links (Optional)</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-facebook theme-cl me-1"></i>Facebook</label>
													<input type="text" class="form-control rounded" placeholder="https://www.facebook.com/sahardirectory/" value="https://www.facebook.com/sahardirectory/" name="company_facebook" />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-twitter theme-cl me-1"></i>Twitter</label>
													<input type="text" class="form-control rounded" placeholder="" value="https://twitter.com/SaharDirectory/" name="company_twitter" />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-instagram theme-cl me-1"></i>Instagram</label>
													<input type="text" class="form-control rounded" placeholder="" value="https://instagram.com/" name="company_instagram" />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-linkedin theme-cl me-1"></i>Linkedin</label>
													<input type="text" class="form-control rounded" placeholder="" value="https://linkedin.com/" name="company_linkedin" />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-youtube theme-cl me-1"></i>Youtube</label>
													<input type="text" class="form-control rounded" placeholder=""  value="https://www.youtube.com/SaharDirectory" name="company_youtube" />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="icofont-telegram theme-cl me-1"></i>Telegram</label>
													<input type="text" class="form-control rounded" placeholder="" value="https://www.telegram.com/sahardirectory" name="company_telegram" />
												</div>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<button type="submit" name="submit_listing" class="btn theme-bg rounded text-light">Submit</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>

			<!-- footer -->


		</div>



	</div>


	<a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



	<?php include 'includes/footer-bottom.php' ?>

</div>
<!-- All Jquery -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/dropzone.js"></script>
<script src="assets/js/counterup.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/jQuery.style.switcher.js"></script>
<script src="assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Date Booking Script -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

<script>
	$(document).ready(function() {
		$('#state').change(function() {
			var state = $('#state').val();
			console.log(state);
			if (state != '') {

				$.ajax({
					url: "select_city.php",
					method: "POST",
					data: {
						state: state
					},
					success: function(data) {

						$('#city').html(data);
					}
				});
			} else {
				$('#city').html('<option value="">Select city</option>');
			}
		});

	});


	$(document).ready(function() {
		$('#company_category').change(function() {
			var company_category = $('#company_category').val();
			console.log(state);
			if (company_category != '') {

				$.ajax({
					url: "select_subcategory.php",
					method: "POST",
					data: {
						company_category: company_category
					},
					success: function(data) {

						$('#company_subcategory').html(data);
					}
				});
			} else {
				$('#company_subcategory').html('<option value="">Select sub category</option>');
			}
		});

	});


	Dropzone.options.singleLogo = {
		maxFiles: 1,
		accept: function(file, done) {
			console.log("uploaded");
			done();
		},
		init: function() {
			this.on("maxfilesexceeded", function(file) {
				alert("No more files please!");
			});
		}
	};

	Dropzone.options.featuredImage = {
		maxFiles: 1,
		accept: function(file, done) {
			console.log("uploaded");
			done();
		},
		init: function() {
			this.on("maxfilesexceeded", function(file) {
				alert("No more files please!");
			});
		}
	};

	Dropzone.options.gallery = {
		accept: function(file, done) {
			console.log("uploaded");
			done();
		},
		init: function() {
			this.on("maxfilesexceeded", function(file) {
				alert("No more files please!");
			});
		}
	};
</script>
<?php include 'includes/footer-link.php' ?>