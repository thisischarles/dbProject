<?php
include('../System/Header.php');
?>
<link rel = "stylesheet" href = "design.css" />
<link rel = "stylesheet" href = "creditcard.css" />
<h1>
    Welcome to your personal homepage! Click on the options below to perform an action!
</h1>
<h2>
    <button class="button" onClick="openRegisterEventForm()">Register Event</button>
</h2>
<h2>
    <button class="button" onClick="openEventPageSetupForm()">Event Page Setup</button>
</h2>
<h2>
    <button class="button" onClick="openRemoveAddUpdateForm()">Remove/Add/Update Participants</button>
</h2>
<h2>
    <button class="button" onClick="openEventStatusForm()">Change Event Status</button>
</h2>
<h2>
    <button class="button" onClick="openExtendLifeForm()">Extend Event Life (With Charge)</button>
</h2>
<h2>
    <button class="button" onClick="openEventForm()">View Events</button>
</h2>
<div class="form-popup" id="RegisterEventForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Register Event</h1>
        <label for="EventName"><b>Event Title</b></label>
        <input type="text" placeholder="Enter the Event's Title" name="Event1" required>
        <br>
        <label for="DescriptionOfEvent"><b>Description of Event</b></label>
        <input type="text" placeholder="Enter the Description of the Event" name="Event2" required>
        <div>
            <div>
                <h3>Confirm Payment</h3>
            </div>
            <div >
                    <div>
                        <label for="owner">Owner</label>
                        <br>
                        <input type="text" id="owner">
                    </div>
                    <div class="CVV">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv">
                    </div>
                    <div id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" id="cardNumber">
                    </div>
                    <div id="expiration-date">
                        <label>Expiration Date</label>
                        <select>
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select>
                            <option value="16"> 2016</option>
                            <option value="17"> 2017</option>
                            <option value="18"> 2018</option>
                            <option value="19"> 2019</option>
                            <option value="20"> 2020</option>
                            <option value="21"> 2021</option>
                        </select>
                    </div>
            </div>
        </div>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeRegisterEventForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="EventPageSetupForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Event Page Setup TBD</h1>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeEventStatusForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="RemoveAddUpdateForm">
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
<div class="form-popup" id="EventStatusForm">
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
        <select>
            <option selected disabled>Choose one</option>
            <option value="">Status 1</option>
            <option value="">Status 2</option>
        </select>
        <br> <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeEventStatusForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="ExtendLifeForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Select Event</h1>
        <select>
            <option selected disabled>Choose one</option>
            <option value="">Event 1</option>
            <option value="">Event 2</option>
            <option value="">Event 3</option>
            <option value="">Event 4</option>
        </select>
        <br> <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeExtendLifeForm()">Cancel</button>
    </form>
</div>
<div class="form-popup" id="EventForm">
    <form action="/action_page.php" Class="form-container">
        <h1>Events</h1>
        <label for="eventTitle"><b>Event Title1</b></label>
        <label for="eventInformation"><b>Event Info1</b></label>
        <br>
        <label for="eventTitle"><b>Event Title2</b></label>
        <label for="eventInformation"><b>Event Info2</b></label>
        <br>
        <label for="eventTitle"><b>Event Title3</b></label>
        <label for="eventInformation"><b>Event Info3</b></label>
        <br> <br>
        <button type="submit" class="submitButton">Submit</button>
        <button class="closeButton" onClick="closeEventForm()">Cancel</button>
    </form>
</div>
<script src="Event_Manager.js"></script>
<?php
include('../System/Footer.php');
?>



