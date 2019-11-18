function openModifyEventForm()
{
    closeUploadForm();
    closePostContentForm();
    closeRemoveAddUpdateForm();
    document.getElementById("ModifyEventForm").style.display="block";
}
function openUploadForm()
{
    closeModifyEventForm();
    closePostContentForm();
    closeRemoveAddUpdateForm();
    document.getElementById("UploadForm").style.display="block";
}
function openPostContentForm()
{
    closeModifyEventForm();
    closeUploadForm();
    closeRemoveAddUpdateForm();
    document.getElementById("PostContentForm").style.display="block";
}
function openRemoveAddUpdateForm()
{
    closeModifyEventForm();
    closeUploadForm();
    closePostContentForm();
    document.getElementById("RemoveAddUpdateForm").style.display="block";
}

function closeModifyEventForm()
{
    document.getElementById("ModifyEventForm").style.display="none";
}
function closeUploadForm()
{
    document.getElementById("UploadForm").style.display="none";
}
function closePostContentForm()
{
    document.getElementById("PostContentForm").style.display="none";
}
function closeRemoveAddUpdateForm()
{
    document.getElementById("RemoveAddUpdateForm").style.display="none";
}