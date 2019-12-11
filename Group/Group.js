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
