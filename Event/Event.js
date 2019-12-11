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

function openMessageForm(x, y)
{
    	document.getElementById("MessageForm").style.display="block";
	document.getElementById("Recipient").innerHTML = x + " <input class='hiding' name='uidholder' id='uidholder'  value=" + y + ">";
}

function closeMessageForm()
{
    	document.getElementById("MessageForm").style.display="none";
}
function openPostContentForm()
{
    document.getElementById("PostContentForm").style.display="block";
}
