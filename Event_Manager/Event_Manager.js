function openRegisterEventForm()
{
    closeEventPageSetupForm();
    closeRemoveAddUpdateForm();
    closeEventStatusForm();
    closeExtendLifeForm();
    closeEventForm();
    document.getElementById("RegisterEventForm").style.display="block";
}
function openEventPageSetupForm()
{
    closeRegisterEventForm();
    closeRemoveAddUpdateForm();
    closeEventStatusForm();
    closeExtendLifeForm();
    closeEventForm();
    document.getElementById("EventPageSetupForm").style.display="block";
}
function openRemoveAddUpdateForm()
{
    closeRegisterEventForm();
    closeEventPageSetupForm();
    closeEventStatusForm();
    closeExtendLifeForm();
    closeEventForm();
    document.getElementById("RemoveAddUpdateForm").style.display="block";
}
function openEventStatusForm()
{
    closeRegisterEventForm();
    closeEventPageSetupForm();
    closeRemoveAddUpdateForm();
    closeExtendLifeForm();
    closeEventForm();
    document.getElementById("EventStatusForm").style.display="block";
}
function openExtendLifeForm()
{
    closeRegisterEventForm();
    closeEventPageSetupForm();
    closeRemoveAddUpdateForm();
    closeEventStatusForm();
    closeEventForm();
    document.getElementById("ExtendLifeForm").style.display="block";
}
function openEventForm()
{
    closeRegisterEventForm();
    closeEventPageSetupForm();
    closeRemoveAddUpdateForm();
    closeEventStatusForm();
    closeExtendLifeForm();
    document.getElementById("EventForm").style.display="block";
}

function closeRegisterEventForm()
{
    document.getElementById("RegisterEventForm").style.display="none";
}
function closeEventPageSetupForm()
{
    document.getElementById("EventPageSetupForm").style.display="none";
}
function closeRemoveAddUpdateForm()
{
    document.getElementById("RemoveAddUpdateForm").style.display="none";
}
function closeEventStatusForm()
{
    document.getElementById("EventStatusForm").style.display="none";
}
function closeExtendLifeForm() {
    document.getElementById("ExtendLifeForm").style.display = "none";
}
function closeEventForm()
{
    document.getElementById("EventForm").style.display="none";
}