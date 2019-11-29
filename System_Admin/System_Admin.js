function openEventForm()
{
    closeManagerForm();
    closeParticipantForm();
    closeEventStatusForm();
    closeListOfEventsForm();
    closeListOfParticipantsForm();
    document.getElementById("EventForm").style.display="block";
}
function openManagerForm()
{
    closeEventForm();
    closeParticipantForm();
    closeEventStatusForm();
    closeListOfEventsForm();
    closeListOfParticipantsForm();
    document.getElementById("ManagerForm").style.display="block";
}
function openParticipantForm()
{
    closeEventForm();
    closeManagerForm();
    closeEventStatusForm();
    closeListOfEventsForm();
    closeListOfParticipantsForm();
    document.getElementById("ParticipantForm").style.display="block";
}
function openEventStatusForm()
{
    closeEventForm();
    closeManagerForm();
    closeParticipantForm();
    closeListOfEventsForm();
    closeListOfParticipantsForm();
    document.getElementById("EventStatusForm").style.display="block";
}
function openListOfEventsForm()
{
    closeEventForm();
    closeManagerForm();
    closeParticipantForm();
    closeEventStatusForm();
    closeListOfParticipantsForm();
    document.getElementById("ListOfEventsForm").style.display="block";
}
function openListOfParticipantsForm()
{
    closeEventForm();
    closeManagerForm();
    closeParticipantForm();
    closeEventStatusForm();
    closeListOfEventsForm();
    document.getElementById("ListOfParticipantsForm").style.display="block";
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
function closeListOfEventsForm()
{
    document.getElementById("ListOfEventsForm").style.display="none";
}
function closeListOfParticipantsForm()
{
    document.getElementById("ListOfParticipantsForm").style.display="none";
}