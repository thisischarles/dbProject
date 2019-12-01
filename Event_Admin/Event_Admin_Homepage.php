<?php
include('../System/Header.php');
?>
<link rel = "stylesheet" href = "..\design.css" />
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
    List of Events
</h2>
    <h3>
        List of Participants
    </h3>
<h2>
    List of Archived Events
</h2>
<div class="form-popup" id="ModifyEventForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Select Event</h1>
        <select>
            <option selected disabled>Choose one</option>
            <option value="">Event 1</option>
            <option value="">Event 2</option>
            <option value="">Event 3</option>
            <option value="">Event 4</option>
        </select>
        <br><br>
        <label for="ModifyEvent"><b>Modify Title</b></label>
        <input type="text" placeholder="Enter the title" name="changeTitle" required>
        <br>
        <label for="ModifyEvent"><b>Modify Information</b></label>
        <input type="text" placeholder="Enter the information" name="changeTitle" required>
        <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeModifyEventForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="RemoveAddUpdateForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Select Event</h1>
        <br>
        <select>
            <option selected disabled>Choose one</option>
            <option value="">Event 1</option>
            <option value="">Event 2</option>
            <option value="">Event 3</option>
            <option value="">Event 4</option>
        </select>
        <br><br>
        <label for="RemoveAddUpdate"><b>Participant 1</b></label>
        <select>
            <option selected disabled>Choose one</option>
            <option value="">Add</option>
            <option value="">Update</option>
            <option value="">Delete</option>
        </select>
        <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeRemoveAddUpdateForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="PostContentForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Post Content</h1>
        <select>
            <option selected disabled>Choose one</option>
            <option value="">Event 1</option>
            <option value="">Event 2</option>
            <option value="">Event 3</option>
            <option value="">Event 4</option>
        </select>
        <br>
        <label for="PostContent"><b>Post</b></label>
        <input type="text" placeholder="Enter Content" name="content" required>
        <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closePostContentForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="UploadForm">
    <form action="..\CSV.php" method="post" Class="form-container" enctype="multipart/form-data">
        <h1>Select CSV file</h1>
        <br>
        Select a file: <input type="file" name="myFile"><br><br>
        <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeUploadForm()">Cancel</button>
    </form>
</div>
<script src="Event_Admin.js"></script>
<?php
include('../System/Footer.php');

?>
