<?php
include('../System/Header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../design.css" />
    <title>Controller</title>
</head>
<body>

<h1>
Controller
<p>Welcome Controller Name!</p>
</h1>
<hr>
<br>
<button class="button" onClick="openChargeRateForm()">Set charge rate</button>
<br>
<br>
<button class="button" onClick="openBandWidthForm()">Set bandwidth</button>
<br>
<br>
<button class="button" onClick="openDiscountForm()">Set discount</button>
<br>
<br>
<button class="button" onClick="openStorageForm()">Set storage</button>
<br>
<br>
<!--<button class="button" onClick="openPeriodForm()">Set period</button>-->
<br>
<br>
<div class="form-popup" id="ChargeRateForm">
	<form Class="form-container">
		<?php
		$sql1 = "SELECT ChargeRate FROM SystemAttributes";
		$result1 = $db->query($sql1);
		if(mysqli_num_rows($result1)>=1)
		{
			$row = $result1->fetch_assoc();
			$chargeRate = $row['ChargeRate'];
			echo "Current charge rate: ".$chargeRate;
		}
		?>
		<h1>Set charge rate</h1>
		<br>
		<label for="ChargeRate"><b>Charge rate</b></label>
		<input type="text" placeholder="Enter the Charge rate" name="ChargeRate" required>
		<br>
		<input type="submit" name="chargeRateSubmit" value="Submit" class="submitButton">
		<?php
			
			if(isset($_GET['chargeRateSubmit']))
			{
				$chargeRateVariable=$_GET['ChargeRate'];
				$sql1 = "UPDATE SystemAttributes SET ChargeRate = $chargeRateVariable;";
				$db->query($sql1);
				if($chargeRateVariable != $chargeRate) {
					echo("<meta http-equiv='refresh' content='1'>");
				}
			}
		?>
		<button class="closeButton" onClick="closeChargeRateForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="BandWidthForm">
	<form Class="form-container">
		<?php
		$sql1 = "SELECT DefaultBW FROM SystemAttributes";
		$result1 = $db->query($sql1);
		if(mysqli_num_rows($result1)>=1)
		{
			$row = $result1->fetch_assoc();
			$bandWidth = $row['DefaultBW'];
			echo "Default Bandwidth: ".$bandWidth;
		}
		?>
		<h1>Set bandwidth</h1>
		<br>
		<label for="BandWidth"><b>Bandwidth</b></label>
		<input type="text" placeholder="Enter the Bandwidth" name="Bandwidth" required>
		<br>
		<input type="submit" name="bandwidthSubmit" value="Submit" class="submitButton">
		<?php
			
			if(isset($_GET['bandwidthSubmit']))
			{
				$bandwidthVariable=$_GET['Bandwidth'];
				$sql1 = "UPDATE SystemAttributes SET DefaultBW = $bandwidthVariable;";
				$db->query($sql1);
				if($bandwidthVariable != $bandWidth) {
					echo("<meta http-equiv='refresh' content='1'>");
				}
			}
		?>
		<button class="closeButton" onClick="closeBandWidthForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="DiscountForm">
	<form Class="form-container">
		<h1>Set discount</h1>
		<br>
		<select size = "5" name = 'discountSelect' required>
			<option selected disabled>Choose an Discount</option>
			<?php	
			$result = $db->query("SELECT DiscountID, Discount from Discount;");
			if (mysqli_num_rows($result) >= 1) {
				while($row = mysqli_fetch_array($result)){
					$discountId = $row['DiscountID'];
					$discount = $row['Discount'];
            				echo "<option value='$discountId'>".$row['Discount']."</option>";
				}
			} 
			
			if(isset($_GET['discountSubmit']))
			{
				$discountVariable=$_GET['discountSelect'];
				$eventVariable=$_GET['eventID'];
				$sql1 = "SELECT DiscountID FROM Discount WHERE Discount = '$discountVariable' ;";
				$result1 = $db->query($sql1);
				if(mysqli_num_rows($result1)>=1)
				{
					$row = $result1->fetch_assoc();
					$discountID = $row['DiscountID'];
					$sql3 = "UPDATE Events SET DiscountID = '$discountID' WHERE EventID = '$eventVariable';";
					$db->query($sql3);
				}
			}
		
		?>
		<br>
		<label for="EventAssigned"><b>Event Assigned</b></label>
		<input type="text" placeholder="Enter the assigned Event ID" name="eventID" required>
		<br>
		<input type="submit" name="discountSubmit" value="Submit" class="submitButton">
		<button class="closeButton" onClick="closeDiscountForm()">Cancel</button>
	</form>
</div> 
<div class="form-popup" id="StorageForm">
	<form Class="form-container">
		<?php
		$sql1 = "SELECT DefaultStorage FROM SystemAttributes";
		$result1 = $db->query($sql1);
		if(mysqli_num_rows($result1)>=1)
		{
			$row = $result1->fetch_assoc();
			$storage = $row['DefaultStorage'];
			echo "Default Storage: ".$storage;
		}
		?>
		<h1>Set Storage</h1>
		<br>
		<label for="Storage"><b>Storage</b></label>
		<input type="text" placeholder="Enter the Storage capacity" name="Storage" required>
		<br>
		<input type="submit" name="storageSubmit" value="Submit" class="submitButton">
		<?php
			
			if(isset($_GET['storageSubmit']))
			{
				$storageVariable=$_GET['Storage'];
				$sql1 = "UPDATE SystemAttributes SET DefaultStorage = $storageVariable;";
				$db->query($sql1);
				if($storageVariable != $storage) {
					echo("<meta http-equiv='refresh' content='1'>");
				}
			}
		?>
		<button class="closeButton" onClick="closeStorageForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="PeriodForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set default Period</h1>
		<input type="text" placeholder="Enter the default period" name="defaultPeriod" required>
		<br>
		
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button class="closeButton" onClick="closePeriodForm()">Cancel</button>
	</form>
</div>
<?php
include('../System/Footer.php');
?>
<script src="Controller.js"></script>
</body>
</html>
