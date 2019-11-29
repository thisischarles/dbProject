function openEventForm()
{
    closePostEventForm();
    document.getElementById("ViewEventForm").style.display="block";
}
function openPostEventForm()
{
    closeEventForm();
    document.getElementById("PostEventForm").style.display="block";
}
function closeEventForm()
{
    document.getElementById("ViewEventForm").style.display="none";
}
function closePostEventForm()
{
    document.getElementById("PostEventForm").style.display="none";
}