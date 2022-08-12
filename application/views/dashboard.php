<?php include 'includes/header-link.php';
?>


<div id="main-wrapper">


	<?php include 'includes/header2.php' ?>

	<?php include 'includes/dash-top-header.php' ?>
	<div class="goodup-dashboard-wrap gray px-4 py-5">
		<?php include 'includes/dash-side-header.php' ?>

		<div class="goodup-dashboard-content">
			<div class="dashboard-tlbar d-block mb-5">
				<div class="row">
					<div class="colxl-12 col-lg-12 col-md-12">
						<h1 class="ft-medium">Hello, <?= $profiledata[0]['name']; ?> </h1>
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
							<h2 class="ft-medium mb-1 fs-xl text-light count">0</h2>
							<p class="p-0 m-0 text-light fs-md">Active Listings</p>
							<i class="lni lni-empty-file"></i>
						</div>
					</div>
					<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-success rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count">0</h2>
							<p class="p-0 m-0 text-light fs-md">Views Listing</p>
							<i class="lni lni-eye"></i>
						</div>
					</div>
					<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-warning rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count">0</h2>
							<p class="p-0 m-0 text-light fs-md">Total Reviews</p>
							<i class="lni lni-comments"></i>
						</div>
					</div>

				</div>

			</div>

			<div class="row">

				<!-- Area Chart -->
				<div class="col-md-12 col-sm-12">
					<div class="dash-card">
						<div class="dash-card-header">
							<h4 class="mb-0">Enquiry</h4>
						</div>
						<div class="dash-card-body overflow-xs" style="padding: 10px;">
						<table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">S no.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Number</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        if ($enquiry) {
                                            foreach ($enquiry as $row) {
                                                $i = $i + 1;
                                        ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['number'] ?></td>
                                                    <td><?= $row['msg'] ?></td>
                                                    <td> <a href="<?= base_url('enquiry') ?>?BdID=<?= $row['id'] ?>" class="button btn-danger"><i class="fa fa-trash"></i></a></td>
                                                </tr>

                                        <?php
                                            }
                                        }
                                        ?>



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