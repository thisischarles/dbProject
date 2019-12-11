

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

function previewFile() {
    var preview = document.getElementById("preview");
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
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



