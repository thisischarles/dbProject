<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="ControllerCSS.css"/>
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
<div class="setchargerateform-popup" id="ChargeRateForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set charge rate</h1>
		<br>
		<label for="ChargeRate"><b>Charge rate</b></label>
		<input type="text" placeholder="Enter the Charge rate" name="ChargeRate" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeChargeRateForm()">Cancel</button>
	</form>
</div>
<div class="setbandwidthform-popup" id="BandWidthForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set bandwidth</h1>
		<br>
		<label for="BandWidth"><b>Bandwidth</b></label>
		<input type="text" placeholder="Enter the Bandwidth" name="Bandwidth" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeBandWidthForm()">Cancel</button>
	</form>
</div>
<div class="setdiscountform-popup" id="DiscountForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set discount</h1>
		<br>
		<label for="Discount"><b>Discount</b></label>
		<input type="text" placeholder="Enter the Discount" name="Discount" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeDiscountForm()">Cancel</button>
	</form>
</div> 
<div class="setstorageform-popup" id="StorageForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set Storage</h1>
		<br>
		<label for="Storage"><b>Storage</b></label>
		<input type="text" placeholder="Enter the Storage capacity" name="Storage" required>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeEventStatusForm()">Cancel</button>
	</form>
</div>
<div class="setperiodform-popup" id="PeriodForm">
	<form action="/action_page.php" Class="form-container">
		<h1>Set Period</h1>
		<br>
		<label for="Period"><b>Period</b></label>
		<br>
		<button type="submit" class="submitButton">Submit</button>
		<button type="submit" class="cancelButton" onClick="closeListOfEventsForm()">Cancel</button>
	</form>
</div>
<?php
include('../System/Footer.php');
?>
<script>
function openChargeRateForm()
{
	document.getElementById("ChargeRateForm").style.display="block";
}
function openBandWidthForm()
{
	document.getElementById("BandWidthForm").style.display="block";
}
function openDiscountForm()
{
	document.getElementById("DiscountForm").style.display="block";
}
function openStorageForm()
{
	document.getElementById("StorageForm").style.display="block";
}
function openPeriodForm()
{
	document.getElementById("PeriodForm").style.display="block";
}
function closeChargeRateForm()
{
	document.getElementById("ChargeRateForm").style.display="none";
}
function closeBandWidthForm()
{
	document.getElementById("BandWidthForm").style.display="none";
}
function closeDiscountForm()
{
	document.getElementById("DiscountForm").style.display="none";
}
function closeStorageForm()
{
	document.getElementById("StorageForm").style.display="none";
}
function closePeriodForm()
{
	document.getElementById("PeriodForm").style.display="none";
}
</script>
</body>
</html>