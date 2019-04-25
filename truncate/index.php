<?php
	include 'config.php';
	include 'Database.php';

	$db = new Database();
	$read = "";
	$show_data = 0;
	$delete_count = 0;
	$delete_status = 0;
	$sl = 0;
	$data_entry_id = array();

	if (isset($_POST['search']))
	{
		$date_from = $_POST['from-date'];
		$date_to = $_POST['to-date'];
		$show_data = 1;

		if ($date_from != "" || $date_to != "")
		{
			$query = "SELECT * FROM dataentryreport WHERE Date BETWEEN '$date_from' AND '$date_to'";
			$read = $db->select($query);
		}
	}

	if (isset($_POST['delete']))
	{
		$loop = $_POST['loop'];

		for ($i=1; $i <= $loop; $i++)
		{ 
			$id = $_POST['data-entry-id-'.$i];

			$delete_query = "DELETE dataentry, dataentrydetails, dataentryreport FROM dataentry INNER JOIN dataentrydetails, dataentryreport WHERE dataentry.Id = dataentrydetails.DataentryId AND dataentry.Id = dataentryreport.DataEntryId AND dataentry.Id = '$id'";
			$delete_data = $db->delete($delete_query);

			if ($delete_data)
			{
				$delete_count++;
			}
		}

		$delete_status = 1;
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'inc/header.php'?>
	</head>

	<body>
		<div class="container">
			<form method="POST" action="index.php"> 
				<div class="card card-5">
					<div class="card-heading">
						<h1 class="title">Media Source Ltd</h1>
					</div>

					<div class="card-body">

						<table class="table table-borderless table-sm">
							<caption>
								<h3 >Search News</h3>
								<hr>
							</caption>

							<thead>
								<tr>
									<td>Date From</td>
									<td>Date To</td>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<td colspan="2">
										<input type="submit" name="search" value="Search" class="btn btn-outline-primary btn-sm" onclick="return Validation()">
										<input type="submit" name="refresh" value="Refresh" class="btn btn-outline-success btn-sm">
									</td>
								</tr>
							</tfoot>

							<tbody>
								<tr>
									<td>
										<input class="date-picker form-control" type="text" id="from-date" name="from-date" placeholder="Select Date From" data-date-format="yyyy-mm-dd" style="width: 100%;">
									</td>

									<td>
										<input class="date-picker form-control" type="text" id="to-date" name="to-date" placeholder="Select Date To" data-date-format="yyyy-mm-dd" style="width: 100%;">
									</td>
								</tr>
							</tbody>
						</table>

						<?php
							if ($show_data == 1)
							{
						?>
							<table class="table table-bordered table-sm">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Id</th>
										<th>Data Entry Id</th>
										<th>Batch Id</th>
										<th>Media</th>
										<th>Publication</th>
										<th>Date</th>
										<th>Caption</th>
									</tr>
								</thead>

								<tbody>
									<?php
										if ($read)
										{
											while($row = $read->fetch_assoc())
											{
												$sl++;
									?>
												<tr>
													<td><?php echo $sl; ?></td>
													<td><?php echo $row['Id']; ?></td>
													<td><?php echo $row['DataEntryId']; ?></td>
													<td><?php echo $row['BatchId']; ?></td>
													<td><?php echo $row['MediaId']; ?></td>
													<td><?php echo $row['PublicationName']; ?></td>
													<td><?php echo $row['Date']; ?></td>
													<td><?php echo $row['Caption']; ?></td>
												</tr>
												<input type="hidden" name="data-entry-id-<?php echo $sl; ?>" value="<?php echo $row['DataEntryId']; ?>">
									<?php										
											}										
										}
										else
										{
									?>
										<tr>
											<td colspan="8">Data Not Found</td>
										</tr>
									<?php
										}
									?>
								</tbody>

								<caption>
									<h3>Searched News Entry Data Showed <?php echo $sl; ?> Data</h3>
									<input type="hidden" name="loop" value="<?php echo $sl; ?>">
									<?php
										if ($read)
										{
									?>
										<input type="submit" name="delete" value="Delete All Searched News Entry Data" class="btn btn-outline-danger btn-sm">
									<?php
										}
									?>
								</caption>
							</table>
						<?php
							}

							if ($delete_status == 1)
							{
						?>
								<h2>You Have Deleted <?php echo $delete_count; ?> News Entry Data</h2>
						<?php
							}
						?>
					</div>

<!-- 					<div class="card-footer" style="text-align: center;">
						<div class="col-auto my-1">
							<input type="submit" name="search" value="Search" class="btn btn-outline-primary" onclick="return Validation()">
							<button type="submit" class="btn btn-outline-primary">Search News</button>
						</div>
					</div> -->
				</div>
			</form>
		</div>

		<?php include 'inc/footer.php'?>

		<script type="text/javascript">

			function Validation()
			{
				var fromDate = $('#from-date').val();
				var toDate = $('#to-date').val();

				if (fromDate == "" && toDate == "")
				{
					alert("Please Select At Least One Search Option");
					$('#from-date').focus();
					$('#from-date').css({'border':'1px solid red'});
					return false;
				}
				else
				{
					if (fromDate != "")
					{
						if (toDate == "")
						{
							alert("Please Select Date To");
							$('#to-date').css({'border':'1px solid red'});
							$('#to-date').focus();
							return false;
						}
					}

					if (toDate != "")
					{
						if (fromDate == "")
						{
							alert("Please Select Date From");
							$('#from-date').css({'border':'1px solid red'});
							$('#from-date').focus();
							return false;
						}
					}
				}
			}
		</script>
	</body>
</html>