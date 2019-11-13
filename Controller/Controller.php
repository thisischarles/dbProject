<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../design.css" />
    <title>Controller</title>
</head>
<body>
<?php
include('../System/Header.php');
?>
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
<button class="button" onClick="openPeriodForm()">Set period</button>
<br>
<br>
<div class="form-popup" id="ChargeRateForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set charge rate</h1>
		<br>
		<label for="ChargeRate"><b>Charge rate</b></label>
		<input type="text" placeholder="Enter the Charge rate" name="ChargeRate" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="closeButton" onClick="closeChargeRateForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="BandWidthForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set bandwidth</h1>
		<br>
		<label for="BandWidth"><b>Bandwidth</b></label>
		<input type="text" placeholder="Enter the Bandwidth" name="Bandwidth" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="closeButton" onClick="closeBandWidthForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="DiscountForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set discount</h1>
		<br>
		<label for="Discount"><b>Discount</b></label>
		<input type="text" placeholder="Enter the Discount" name="Discount" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="closeButton" onClick="closeDiscountForm()">Cancel</button>
	</form>
</div> 
<div class="form-popup" id="StorageForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set Storage</h1>
		<br>
		<label for="Storage"><b>Storage</b></label>
		<input type="text" placeholder="Enter the Storage capacity" name="Storage" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="closeButton" onClick="closeEventStatusForm()">Cancel</button>
	</form>
</div>
<div class="form-popup" id="PeriodForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set Period</h1>
		<br>
		<label for="Period"><b>Period</b></label>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="closeButton" onClick="closeListOfEventsForm()">Cancel</button>
	</form>
</div>
<?php
include('../System/Footer.php');
?>
<script src="Controller.js"></script>
</body>
</html>