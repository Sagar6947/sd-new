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
						<h1 class="ft-medium">Manage Listings</h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
								<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="#" class="theme-cl">Manage Listings</a></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="dashboard-widg-bar d-block">
				<div class="row">
					<div class="col-xl-12 col-lg-12">
						<div class="dashboard-list-wraps bg-white rounded mb-4">
							<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
								<div class="dashboard-list-wraps-flx">
									<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file-alt me-2 theme-cl fs-sm"></i>My Listings</h4>
								</div>
							</div>

							<div class="dashboard-list-wraps-body py-3 px-3">
								<div class="dashboard-listing-wraps">

									<!-- Single Listing Item -->

									<?php
									$select_list = "SELECT * FROM company WHERE rgid = '" . $_SESSION["user_id"] . "' ";
									// $select_list = "SELECT * FROM company WHERE company_id = '117' ";

									$get = mysqli_query($conn, $select_list) or die("Query Unsuccessful.");
									if (mysqli_num_rows($get) > 0) {
										while ($row = mysqli_fetch_assoc($get)) {
									?>

											<div class="dsd-single-listing-wraps">
												<div class="dsd-single-lst-thumb"><img src="listing-images/<?php echo $row['company_logo']; ?>" class="img-fluid" alt="" /></div>
												<div class="dsd-single-lst-caption">
													<div class="dsd-single-lst-title">
														<h5><?php echo $row['company_name']; ?></h5>
													</div>
													<span class="agd-location"><i class="lni lni-map-marker me-1"></i><?php echo $row['company_address']; ?></span>
													<div class="ico-content">
														<div class="Goodup-ft-first">
															<div class="Goodup-rating">
																<div class="Goodup-rates">
																	<i class="fas fa-star"></i>
																	<i class="fas fa-star"></i>
																	<i class="fas fa-star"></i>
																	<i class="fas fa-star"></i>
																	<i class="fas fa-star"></i>
																</div>
															</div>
															<div class="Goodup-price-range">
																<span class="ft-medium">34 Reviews</span>
															</div>
														</div>
													</div>
													<div class="dsd-single-lst-footer">
														<a href="dashboard-edit-listing.php?list=<?php echo $row['company_id']; ?>" class="btn btn-edit mr-1"><i class="fas fa-edit me-1"></i>Edit</a>
														<a href="javascript:void(0);" class="btn btn-view mr-1"><i class="fas fa-eye me-1"></i>View</a>
														<a href="javascript:void(0);" class="btn btn-delete"><i class="fas fa-trash me-1"></i>Delete</a>
													</div>
												</div>
											</div>


									<?php
										}
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>


		</div>



		<a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>




	</div>
	<?php include 'includes/footer-bottom.php' ?>
	<!-- All Jquery -->
	<?php include 'includes/footer-link.php' ?>