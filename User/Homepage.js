function openNotificationsForm(){
    closeParticipantForm();
    closeInvitationsForm();
    closeCreateGroupForm();
    document.getElementById("notificationsForm").style.display ="block";
}
function closeNotificationsForm(){
    document.getElementById("notificationsForm").style.display ="none";
}

function openParticipantForm(){
    closeNotificationsForm();
    closeInvitationsForm();
    closeCreateGroupForm();
    document.getElementById("addParticipantForm").style.display ="block";
}
function closeParticipantForm(){
    document.getElementById("addParticipantForm").style.display ="none";
}

function openInvitationsForm(){
    closeNotificationsForm();
    closeCreateGroupForm();
    closeParticipantForm();
    document.getElementById("invitationsForm").style.display ="block";
}
function closeInvitationsForm(){
    document.getElementById("invitationsForm").style.display ="none";
}

function openCreateGroupForm(){
    closeNotificationsForm();
    closeInvitationsForm();
    closeParticipantForm();
    document.getElementById("createGroupForm").style.display ="block";
}
function closeCreateGroupForm(){
    document.getElementById("createGroupForm").style.display ="none";
}