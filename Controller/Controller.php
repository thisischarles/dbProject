<!DOCTYPE html>
<html>
<head>
<title>Controller</title>
<style>
/*used to change the color of the body of the page*/
body {background-color: lightgreen;
background-image:linear-gradient(to right, lightgreen, mediumspringgreen);
}

/*grad1 class used for the box surrounding the buttons*/
#grad1{
	background-color:powderblue;
	background-image:linear-gradient(to right, powderblue, mediumspringgreen);
	width: 300px;
	height: 600px;
	border: 3px solid orange;
	padding-left: 10px;
}

/*button class used for the buttons except for the sign out button*/
.button{
	background-color: #29962e;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin:4px 2px;
	cursor: pointer;
}
	
/*SignOutButton class used for the sign out button*/
.SignOutButton{
	background-color: #29962e;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin:4px 2px;
	cursor: pointer;
	position: relative;
	left: 1300px;
	bottom: 550px;
}	

/*form class used for the popup, when clicking on each button*/
.setchargerateform-popup
{
	display:none;
	position: absolute;	/*was position: fixed*/
	top: 170px;	/*was bottom: 0*/
	right: 870px;	/*was 15px, 870px*/
	border: 3px solid #f1f1f1;
	z-index:9;
	margin-left:auto;
	margin-right:auto;
}
.setbandwidthform-popup
{
	display:none;
	position: absolute;
	top: 170px;
	right: 540px;
	border: 3px solid #f1f1f1;
	z-index:9;
	margin-left:auto;
	margin-right:auto;
}
.setdiscountform-popup
{
	display:none;
	position: absolute;
	top: 170px;
	right: 210px;
	border: 3px solid #f1f1f1;
	z-index:9;
}
.setstorageform-popup
{
	display:none;
	position: absolute;
	top: 425px;
	right: 870px;
	border: 3px solid #f1f1f1;
	z-index:9;
}
.setperiodform-popup
{
	display:none;
	position: absolute;
	top: 425px;
	right: 540px;
	border: 3px solid #f1f1f1;
	z-index:9;
}
/*class used to add styles to the form*/
.form-container
{
	min-height: 225px;
	min-width: 300px;
	max-width: 300px;
	padding: 10px;
	background-color: lightblue;
}
/*used for the input fields*/
.form-container input[type-text]
{
	width:100%
	padding:15px;
	margin:5px 0 22px 0;
	border: none;
	background: #f1f1f1;
}
/*darken the input fields when clicked on*/
.form-container input[type-text]:focus
{
	background-color: #ddd;
	outline: none;
}
/*style of the submit button*/
.form-container .submitButton
{
	background-color: #4CAF50;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 100%
	margin-bottom:10px;
	opacity: 0.8;
}
/*style of the cancel button*/
.form-container .cancelButton
{
	background-color: #4CAF50;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 100%
	margin-bottom:10px;
	opacity: 0.8;
}
/*addition of hover effects to the buttons*/
.form-container .submitButton:hover, .cancelButoon:hover
{
	opacity: 1;
}
</style>
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
<div id="grad1">
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
<button class="SignOutButton">Sign Out</button>
</div>
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