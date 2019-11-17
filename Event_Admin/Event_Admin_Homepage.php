<?php
include('../System/Header.php');
?>
<h1>
    Welcome to your personal homepage! Click on the options below to perform an action!
</h1>
<h2>
    <button class="button" onClick="openModifyEventForm()">Modify Event</button>
</h2>
<h2>
    <button class="button" onClick="openRemoveAddUpdateForm()">Remove/Add/Update Participants</button>
</h2>
<h2>
    <button class="button" onClick="openPostContentForm()">Post Content</button>
</h2>
<h2>
    <button class="button" onClick="openUploadForm()">Upload CSV</button>
</h2>
<h2>
    <button class="button">List of Events</button>
    <h3>
        List of Participants
    </h3>
</h2>
<h2>
    <button class="button">List of Archived Events</button>
</h2>
<?php
include('../System/Footer.php');
?>
<div class="form-popup" id="ModifyEventForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Modify Event</h1>
        <br>
        <label for="ModifyEvent"><b>Title</b></label>
        <input type="text" placeholder="Enter the Title" name="changeTitle" required>
        <br>
        <button type="submit" class="submitButton">Submit</button>
        <button type="submit" class="closeButton" onClick="closeModifyEventForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="RemoveAddUpdateForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Set bandwidth</h1>
        <br>
        <label for="RemoveAddUpdate"><b>Remove/Add/Update</b></label>
        <input type="text" placeholder="RemoveAddUpdate" name="RemoveAddUpdate" required>
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
</html
