function openEventForm()
{
	
    closeManagerForm();
    closeParticipantForm();
    closeEventStatusForm();
    document.getElementById("EventForm").style.display="block";
}
function openManagerForm()
{
	console.log("hello");
    closeEventForm();
    closeParticipantForm();
    closeEventStatusForm();
    document.getElementById("ManagerForm").style.display="block";
}
function openParticipantForm()
{
    closeEventForm();
    closeManagerForm();
    closeEventStatusForm();
    document.getElementById("ParticipantForm").style.display="block";
}
function openEventStatusForm()
{
    closeEventForm();
    closeManagerForm();
    closeParticipantForm();
    document.getElementById("EventStatusForm").style.display="block";
}

function closeEventForm()
{
    document.getElementById("EventForm").style.display="none";
}
function closeManagerForm()
{
    document.getElementById("ManagerForm").style.display="none";
}
function closeParticipantForm()
{
    document.getElementById("ParticipantForm").style.display="none";
}
function closeEventStatusForm()
{
    document.getElementById("EventStatusForm").style.display="none";
}
