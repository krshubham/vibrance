$(document).ready(function(){  
$("#adaptune").click(function(){



// Returns successful data submission message when the entered information is stored in database.
$.post("adaptune.php",{ },
			function(data) {
			alert(data);
			 //To reset form fields
			});
    
    
});
});
