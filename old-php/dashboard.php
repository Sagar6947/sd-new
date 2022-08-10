<?php include 'includes/header-link.php';

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
						<h1 class="ft-medium">Hello, <?php echo $_SESSION['name']; ?> </h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item text-muted"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="#" class="theme-cl">Dashboard</a></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="dashboard-widg-bar d-block">
				<div class="row">
					<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-danger rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count">46</h2>
							<p class="p-0 m-0 text-light fs-md">Active Listings</p>
							<i class="lni lni-empty-file"></i>
						</div>
					</div>
					<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-success rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count">2615</h2>
							<p class="p-0 m-0 text-light fs-md">Views Listing</p>
							<i class="lni lni-eye"></i>
						</div>
					</div>
					<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-warning rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count">312</h2>
							<p class="p-0 m-0 text-light fs-md">Total Reviews</p>
							<i class="lni lni-comments"></i>
						</div>
					</div>
					<!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-purple rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count">410</h2>
							<p class="p-0 m-0 text-light fs-md">Total Enquiry</p>
							<i class="lni lni-mail"></i>
						</div>
					</div> -->
				</div>

				<!-- row -->
			</div>

			<!-- footer -->

			<div class="row">

				<!-- Area Chart -->
				<div class="col-md-12 col-sm-12">
					<div class="dash-card">
						<div class="dash-card-header">
							<h4 class="mb-0">Enquiry</h4>
						</div>
						<div class="dash-card-body" style="padding: 10px;">
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

				<!-- Donut Chart -->


			</div>



		</div>

	</div>


	<a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



	<?php include 'includes/footer-bottom.php' ?>

</div>
<!-- All Jquery -->
<?php include 'includes/footer-link.php' ?>