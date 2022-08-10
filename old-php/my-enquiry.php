<?php include 'includes/header-link.php';
session_start();

if(!isset($_SESSION["username"])){
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
									<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file-alt me-2 theme-cl fs-sm"></i>Enquiry</h4>
								</div>
							</div>

                            <table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">S no.</th>
										<th scope="col">Name</th>
										<th scope="col">Email</th>
										<th scope="col">Message</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>Sagar Thakur</td>
										<td>sagarthakur@gmail.com</td>
										<td>This is awesome</td>
									</tr>
								</tbody>
							</table>
							
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