function Message(msg)
{
	// Get the Message Section
	var x = document.getElementById("message");

	// Add the "show" class to Message Section
	x.className = "show";

	// After 3 seconds, remove the show class from Message Section
	setTimeout(function(){x.className = x.className.replace("show", ""); }, 3000);

	$('#message').text(msg);
}

function Success()
{
	return "Greate! Your Media Name Created Successfully.";
}