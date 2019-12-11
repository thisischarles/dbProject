function openEventForm()
{
    closeParticipantForm();
    closeEventStatusForm();
    document.getElementById("EventForm").style.display="block";
}
function openParticipantForm()
{
    closeEventForm();
    closeEventStatusForm();
    document.getElementById("ParticipantForm").style.display="block";
}
function openEventStatusForm()
{
    closeEventForm();
    closeParticipantForm();
    document.getElementById("EventStatusForm").style.display="block";
}

function closeEventForm()
{
    document.getElementById("EventForm").style.display="none";
}
function closeParticipantForm()
{
    document.getElementById("ParticipantForm").style.display="none";
}
function closeEventStatusForm()
{
    document.getElementById("EventStatusForm").style.display="none";
}
function openViewEvents()
{
    document.getElementById("ViewEvents").style.display="block";
    document.getElementById("changeB").innerHTML = '<button class="button" onClick="closeViewEvents()">Close List Of Events</button>';
}
function closeViewEvents()
{
    document.getElementById("ViewEvents").style.display="none";
    document.getElementById("changeB").innerHTML = '<button class="button" onClick="openViewEvents()">Open List Of Events</button>';
}

function openModi()
{
	console.log("hello");
    	if(document.getElementById("modify").checked) {
		document.getElementById("Modi").style.display="block";
	}
	else {
		document.getElementById("Modi").style.display="none";
	}
}

