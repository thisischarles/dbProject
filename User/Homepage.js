function openNotificationsForm(){
    closeParticipantForm();
    closeInvitationsForm();
    closeCreateGroupForm();
    closeReadInvitationsForm();
    closeReadNotificationsForm();
    closeReadMessagesForm();
    closeMessagesForm();
    document.getElementById("notificationsForm").style.display = "block";
}
function closeNotificationsForm(){
    document.getElementById("notificationsForm").style.display = "none";
    document.getElementById("notificationBox").style.display = "none";
}

function openParticipantForm(){
    closeNotificationsForm();
    closeInvitationsForm();
    closeCreateGroupForm();
    closeReadInvitationsForm();
    closeReadNotificationsForm();
    closeReadMessagesForm();
    closeMessagesForm();
    document.getElementById("addParticipantForm").style.display = "block";
}
function closeParticipantForm(){
    document.getElementById("addParticipantForm").style.display = "none";
}

function openInvitationsForm(){
    closeNotificationsForm();
    closeCreateGroupForm();
    closeParticipantForm();
    closeReadInvitationsForm();
    closeReadNotificationsForm();
    closeReadMessagesForm();
    closeMessagesForm();
    document.getElementById("invitationsForm").style.display = "block";
}
function closeInvitationsForm(){
    document.getElementById("invitationsForm").style.display = "none";
    document.getElementById("invitationBox").style.display = "none";
}

function openCreateGroupForm(){
    closeNotificationsForm();
    closeInvitationsForm();
    closeParticipantForm();
    closeReadInvitationsForm();
    closeReadNotificationsForm();
    closeReadMessagesForm();
    closeMessagesForm();
    document.getElementById("createGroupForm").style.display = "block";
}
function closeCreateGroupForm(){
    document.getElementById("createGroupForm").style.display = "none";
}

function openPasswordForm(){
	document.getElementById("passwordForm").style.display = "block";
	document.getElementById("emailForm").style.display = "none";
	document.getElementById("nameForm").style.display = "none";
	document.getElementById("DOBForm").style.display = "none";
}
function closePasswordForm(){
	document.getElementById("passwordForm").style.display ="none";
}

function openEmailForm() {
     	document.getElementById("emailForm").style.display = "block";
	document.getElementById("passwordForm").style.display = "none";
	document.getElementById("nameForm").style.display = "none";
	document.getElementById("DOBForm").style.display = "none";
}
function closeEmailForm() {
     	document.getElementById("emailForm").style.display = "none";
}

function openNameForm() {
     	document.getElementById("nameForm").style.display = "block";
	document.getElementById("emailForm").style.display = "none";
	document.getElementById("passwordForm").style.display = "none";
	document.getElementById("DOBForm").style.display = "none";
}
function closeNameForm() {
     	document.getElementById("nameForm").style.display = "none";
}

function openDOBForm(){
     	document.getElementById("DOBForm").style.display = "block";
}
function closeDOBForm(){
     	document.getElementById("DOBForm").style.display = "none";
	document.getElementById("emailForm").style.display = "none";
	document.getElementById("nameForm").style.display = "none";
	document.getElementById("passwordForm").style.display = "none";
}

function openReadNotificationsForm(){
	document.getElementById("readNotificationsForm").style.display= "block";
	closeNotificationsForm();
	closeInvitationsForm();
	closeReadInvitationsForm();
	closeCreateGroupForm();
	closeParticipantForm();
	closeMessagesForm();
	closeReadMessagesForm();
}
function closeReadNotificationsForm(){
	document.getElementById("readNotificationsForm").style.display = "none";
}

function openMessagesForm(){
	document.getElementById("messagesForm").style.display = "block";
	closeNotificationsForm();
	closeInvitationsForm();
	closeReadNotificationsForm();
	closeReadInvitationsForm();
	closeCreateGroupForm();
	closeParticipantForm();
	closeReadMessagesForm();
}
function closeMessagesForm(){
   	document.getElementById("notificationsForm").style.display = "none";
    	document.getElementById("notificationBox").style.display = "none";
	document.getElementById("messagesForm").style.display = "none";
}

function openReadMessagesForm(){
	document.getElementById("readMessagesForm").style.display = "block";
	closeNotificationsForm();
	closeInvitationsForm();
	closeReadNotificationsForm();
	closeReadInvitationsForm();
	closeCreateGroupForm();
	closeParticipantForm();
	closeMessagesForm();
}
function closeReadMessagesForm(){
	document.getElementById("readMessagesForm").style.display = "none";
}



function openReadInvitationsForm(){
	document.getElementById("readInvitationsForm").style.display = "block";
	closeNotificationsForm();
	closeInvitationsForm();
	closeReadNotificationsForm();
	closeCreateGroupForm();
	closeParticipantForm();
	closeReadMessagesForm();
    	closeMessagesForm();
}
function closeReadInvitationsForm(){
	document.getElementById("readInvitationsForm").style.display = "none";
}

function goToInvitation(message, fullName, id){
	document.getElementById("sql").innerHTML = "<input class='hiding' name='messid' id='messid'  value=" + id + ">";
	document.getElementById("sender").innerHTML = fullName;
	document.getElementById("invitation").innerHTML = message;
	document.getElementById("invitationBox").style.display = "block";
}

function goToNotification(message, fullName, id){
document.getElementById("sql2").innerHTML = "<input class='hiding2' name='messid2' id='messid2'  value=" + id + ">";
	document.getElementById("sender1").innerHTML = fullName;
	document.getElementById("notification").innerHTML = message;
	document.getElementById("notificationBox").style.display = "block";
}


