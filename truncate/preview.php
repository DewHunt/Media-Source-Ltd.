<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BCSIR - House Management Syastem</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/datepicker/css/datepicker.css">
		<script src="assets/datepicker/js/bootstrap-datepicker.js"></script>

		<style type="text/css">
			.card {
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
				background: #fff;
				margin-top: 50px;
				margin-bottom: 200px;
			}

			.card-5 {
				background: #fff;
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				border-radius: 10px;
				-webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
				-moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
				box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
			}

			.card-5 .card-heading {
				padding: 0px 0;
				/*background: #1a1a1a;*/
				background: #7aaaba;
				-webkit-border-top-left-radius: 10px;
				-moz-border-radius-topleft: 10px;
				border-top-left-radius: 10px;
				-webkit-border-top-right-radius: 10px;
				-moz-border-radius-topright: 10px;
				border-top-right-radius: 10px;
				/*background-image: url("iamges/Logo-en.png");*/
			}

			.card-5 .card-body {
				padding: 52px 85px;
				padding-bottom: 73px;
			}

			@media (max-width: 767px) {
				.card-5 .card-body {
					padding: 40px 30px;
					padding-bottom: 50px;
				}
			}

			caption {
				caption-side: top;
			}

			.title {
				font-size: 50px;
				text-transform: uppercase;
				font-weight: 700;
				text-align: center;
				color: #800000;
			}

			.center {
				display: block;
				margin-left: auto;
				margin-right: auto;
			}

			.header-three{
				color: green;
			}
.dropdown .dropdown-menu {
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
}
		</style>
	</head>

	<body>
		<?php
			if (!empty($_POST['employee-name'])) {
				$employeeName = $_POST['employee-name'];
			}
			else
			{
				$employeeName = "";
			}

			if (!empty($_POST['dob'])) {
				$dob = $_POST['dob'];
			}
			else
			{
				$dob = "";
			}

			if (!empty($_POST['marital-status'])) {
				$maritialStatus = $_POST['marital-status'];
			}
			else
			{
				$maritialStatus = "";
			}

			if (!empty($_POST['phone'])) {
				$phone = $_POST['phone'];
			}
			else
			{
				$phone = "";
			}

			if (!empty($_POST['spouse-guardian-name'])) {
				$spouseGuardianName = $_POST['spouse-guardian-name'];
			}
			else
			{
				$spouseGuardianName = "";
			}

			if (!empty($_POST['relation'])) {
				$relation = $_POST['relation'];
			}
			else
			{
				$relation = "";
			}

			if (!empty($_POST['occupation'])) {
				$occupation = $_POST['occupation'];
			}
			else
			{
				$occupation = "";
			}

			if (!empty($_POST['occupation'])) {
				$occupation = $_POST['occupation'];
			}
			else
			{
				$occupation = "";
			}

			if (!empty($_POST['instittue-name'])) {
				$instittueName = $_POST['instittue-name'];
			}
			else
			{
				$instittueName = "";
			}

			if (!empty($_POST['present-post'])) {
				$presentPost = $_POST['present-post'];
			}
			else
			{
				$presentPost = "";
			}

			if (!empty($_POST['working-place'])) {
				$workingPlace = $_POST['working-place'];
			}
			else
			{
				$workingPlace = "";
			}

			if (!empty($_POST['present-working-place'])) {
				$presentWorkingPlace = $_POST['present-working-place'];
			}
			else
			{
				$presentWorkingPlace = "";
			}

			if (!empty($_POST['employee-present-post'])) {
				$employeePresentPost = $_POST['employee-present-post'];
			}
			else
			{
				$employeePresentPost = "";
			}

			if (!empty($_POST['pay-scale'])) {
				$payScale = $_POST['pay-scale'];
			}
			else
			{
				$payScale = "";
			}

			if (!empty($_POST['main-salary'])) {
				$mainSalary = $_POST['main-salary'];
			}
			else
			{
				$mainSalary = "";
			}

			if (!empty($_POST['joining-date-present-post'])) {
				$joiningDatePresentPost = $_POST['joining-date-present-post'];
			}
			else
			{
				$joiningDatePresentPost = "";
			}

			if (!empty($_POST['unit-name'])) {
				$unitName = $_POST['unit-name'];
			}
			else
			{
				$unitName = "";
			}

			if (!empty($_POST['employee-joining-post'])) {
				$employeeJoiningPost = $_POST['employee-joining-post'];
			}
			else
			{
				$employeeJoiningPost = "";
			}

			if (!empty($_POST['joining-date-joining-post'])) {
				$joiningDateJoiningPost = $_POST['joining-date-joining-post'];
			}
			else
			{
				$joiningDateJoiningPost = "";
			}

			if (!empty($_POST['location-1'])) {
				$location1 = $_POST['location-1'];
			}
			else
			{
				$location1 = "";
			}

			if (!empty($_POST['location-2'])) {
				$location2 = $_POST['location-2'];
			}
			else
			{
				$location2 = "";
			}

			if (!empty($_POST['location-3'])) {
				$location3 = $_POST['location-3'];
			}
			else
			{
				$location3 = "";
			}

			if (!empty($_POST['building-name-1'])) {
				$buildingName1 = $_POST['building-name-1'];
			}
			else
			{
				$buildingName1 = "";
			}

			if (!empty($_POST['building-name-2'])) {
				$buildingName2 = $_POST['building-name-2'];
			}
			else
			{
				$buildingName2 = "";
			}

			if (!empty($_POST['building-name-3'])) {
				$buildingName3 = $_POST['building-name-3'];
			}
			else
			{
				$buildingName3 = "";
			}

			if (!empty($_POST['flat-type-1'])) {
				$flatType1 = $_POST['flat-type-1'];
			}
			else
			{
				$flatType1 = "";
			}

			if (!empty($_POST['flat-type-2'])) {
				$flatType2 = $_POST['flat-type-2'];
			}
			else
			{
				$flatType2 = "";
			}

			if (!empty($_POST['flat-type-3'])) {
				$flatType3 = $_POST['flat-type-3'];
			}
			else
			{
				$flatType3 = "";
			}

			if (!empty($_POST['own-house-info'])) {
				$ownHouseInfo = $_POST['own-house-info'];
			}
			else
			{
				$ownHouseInfo = "";
			}

			if (!empty($_POST['number-of-flat'])) {
				$numberOfFlat = $_POST['number-of-flat'];
			}
			else
			{
				$numberOfFlat = "";
			}

			if (!empty($_POST['date-of-purchased'])) {
				$dateOfPurchased = $_POST['date-of-purchased'];
			}
			else
			{
				$dateOfPurchased = "";
			}

			if (!empty($_POST['sl'])) {
				$sl = $_POST['sl'];
			}
			else
			{
				$sl = "";
			}

			if (!empty($_POST['previous-house-info'])) {
				$previousHouseInfo = $_POST['previous-house-info'];
			}
			else
			{
				$previousHouseInfo = "";
			}

			if (!empty($_POST['flat-details'])) {
				$flatDetails = $_POST['flat-details'];
			}
			else
			{
				$flatDetails = "";
			}

			if (!empty($_POST['leave-date'])) {
				$leaveDate = $_POST['leave-date'];
			}
			else
			{
				$leaveDate = "";
			}
		?>
		<div class="container">
			<form method="POST" action="submit.php"> 
				<div class="card card-5">
					<div class="card-heading">
						<!-- <img src="images/Logo-en.png" class="center"> -->
						<img src="images/Logo-en-22.png" class="center">
						<!-- <h1 class="title">BCSIR Laboratories, Dhaka</h1> -->
						<!-- <h5 style="color: #0a617e; text-align: center;">Bangladesh Council of Scientific and Industrial Reasearch</h5> -->
						<p style="color: white; text-align: center;">Dr. Qudrat-i-Khuda Road, Dhanmondi, Dhaka-1205, Bangladesh.</p>
						<h4 style="color: black; text-align: center;">Preview Information</h4>
					</div>

					<div class="card-body">
						<table class="table table-borderless table-sm">
							<caption>
								<h3 >Personal Information</h3>
								<hr>                    		
							</caption>

							<tbody>
								<tr>
									<td>Employee Full Name (Capital Letter)</td>
									<td>:</td>
									<td><?php echo $employeeName;?></td>
								</tr>

								<tr>
									<td>Date Of Birth</td>
									<td>:</td>
									<td><?php echo $dob;?></td>
								</tr>

								<tr>
									<td>Marital Status</td>
									<td>:</td>
									<td><?php echo $maritialStatus;?></td>
								</tr>

								<tr>
									<td>Phone Number</td>
									<td>:</td>
									<td><?php echo $phone;?></td>
								</tr>
							</tbody>
						</table>

						<table class="table table-borderless table-sm">
							<caption>
								<h3 >Spouse/Guardian Information</h3>
								<hr>
							</caption>

							<tbody>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td><?php echo $spouseGuardianName;?></td>
								</tr>

								<tr>
									<td>Relation</td>
									<td>:</td>
									<td><?php echo $relation;?></td>
								</tr>

								<tr>
									<td>Occupation</td>
									<td>:</td>
									<td><?php echo $occupation;?></td>
								</tr>

								<?php
									if ($occupation == "Employee") {
								?>
									<tr>
										<td>Institute Name</td>
										<td>:</td>
										<td><?php echo $instittueName;?></td>
									</tr>

									<tr>
										<td>Present Post</td>
										<td>:</td>
										<td><?php echo $presentPost;?></td>
									</tr>

									<tr>
										<td>Working Place</td>
										<td>:</td>
										<td><?php echo $workingPlace;?></td>
									</tr>
								<?php
									}
								?>
							</tbody>
						</table>

						<table class="table table-borderless table-sm">
							<caption>
								<h3 >Job Information</h3>
								<hr>
							</caption>

							<tbody>
								<tr>
									<td>Present Work Place</td>
									<td>:</td>
									<td><?php echo $presentWorkingPlace;?></td>
								</tr>

								<tr>
									<td>Present Post</td>
									<td>:</td>
									<td><?php echo $employeePresentPost;?></td>
								</tr>

								<tr>
									<td>Pay Scale</td>
									<td>:</td>
									<td><?php echo $payScale;?></td>
								</tr>

								<tr>
									<td>Main Salary</td>
									<td>:</td>
									<td><?php echo $mainSalary;?></td>
								</tr>

								<tr>
									<td>Joining Date Present Post</td>
									<td>:</td>
									<td><?php echo $joiningDatePresentPost;?></td>
								</tr>

								<tr>
									<td>Unit Name</td>
									<td>:</td>
									<td><?php echo $unitName;?></td>
								</tr>

								<tr>
									<td>Joining Post</td>
									<td>:</td>
									<td><?php echo $employeeJoiningPost;?></td>
								</tr>

								<tr>
									<td>Joining Date of Joining Post</td>
									<td>:</td>
									<td><?php echo $joiningDateJoiningPost;?></td>
								</tr>
							</tbody>
						</table>

						<table class="table table-borderless table-sm">
							<caption>
								<h3>House Information</h3>
								<hr>
							</caption>

							<thead class="thead-light">
								<tr>
									<th colspan="2"></th>
									<th>Choice No. 1</th>
									<th>Choice No. 2</th>
									<th>Choice No. 3</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>Location</td>
									<td>:</td>
									<td><?php echo $location1;?></td>

									<td><?php echo $location2;?></td>

									<td><?php echo $location3;?></td>
								</tr>

								<tr>
									<td>Building Name/Number</td>
									<td>:</td>
									<td><?php echo $buildingName1;?></td>

									<td><?php echo $buildingName2;?></td>

									<td><?php echo $buildingName3;?></td>
								</tr>

								<tr>
									<td>Flat Type</td>
									<td>:</td>
									<td><?php echo $flatType1;?></td>

									<td><?php echo $flatType2;?></td>

									<td><?php echo $flatType3;?></td>
								</tr>

								<tr>
									<td>Do You Have Any House or Flat?</td>
									<td>:</td>
									<td colspan="3"><?php echo $ownHouseInfo;?></td>
								</tr>

								<?php
									if ($ownHouseInfo == "Yes") {
								?>
									<tr>
										<td>Number of House/Flat</td>
										<td>:</td>
										<td colspan="3"><?php echo $numberOfFlat;?></td>
									</tr>

									<tr>
										<td>Date of Construction Completed/Purchase</td>
										<td>:</td>
										<td colspan="3"><?php echo $dateOfPurchased;?></td>
									</tr>
								<?php
									}
								?>
							</tbody>
						</table>

						<table class="table table-borderless table-sm">
							<caption>
								<h3>Family Members Description (With Applicant)</h3>
								<hr>
							</caption>

							<thead class="thead-light">
								<tr>
									<th>S.L.</th>
									<th>Name</th>
									<th>Age</th>
									<th>Relation</th>
								</tr>
							</thead>

							<tbody>
								<?php
									for ($i=1; $i <= $sl; $i++) {
										echo "<tr><td>".$i."</td>";
										if (!empty($_POST['member-name-'.$i])) {
											echo "<td>".$_POST['member-name-'.$i]."</td>";
										}
										else
										{
											echo "<td></td>";
										}

										if (!empty($_POST['member-age-'.$i])) {
											echo "<td>".$_POST['member-age-'.$i]."</td>";
										}
										else
										{
											echo "<td></td>";
										}
										
										if (!empty($_POST['member-relation-'.$i])) {
											echo "<td>".$_POST['member-relation-'.$i]."</td>";
										}
										else
										{
											echo "<td></td></tr>";
										}				
									}
								?>
							</tbody>
						</table>

						<table class="table table-borderless table-sm">
							<caption>
								<h3>Previous Workplace House/Flat Information</h3>
							</caption>

							<tbody>

								<tr>
									<td>Did you have any houses/flats?</td>
									<td colspan="3"><?php echo $previousHouseInfo;?></td>
								</tr>

								<?php
									if ($previousHouseInfo == "Yes") {
								?>
									<tr id="previous-house-details-tr">
										<td>Right Details About House/Flat</td>
										<td colspan="3"><?php echo $flatDetails;?></td>
									</tr>

									<tr id="date-house-leave-tr">
										<td>Date of House/Flat Leave</td>
										<td colspan="3"><?php echo $leaveDate;?></td>
									</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>

					<div class="card-footer" style="text-align: center;">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							<label class="form-check-label" for="defaultCheck1">
								<p style="color: green; font-weight: bold;">I certify that the above all the information are true in my highest knowledge and belief. I will abide by the rules of house allotment of council.</p>
							</label>
						</div>

						<div class="col-auto my-1">
							<button onclick="return printPage()" class="btn btn-outline-primary">Print</button>
							<button type="submit" class="btn btn-outline-primary">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>

		<script type="text/javascript">
			function printPage() {
			  window.print();
			  return false;
			}
		</script>

	</body>
</html>