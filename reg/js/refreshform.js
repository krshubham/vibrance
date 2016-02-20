$(document).ready(function() {
    $("#adaptune").click(function() { 
    var event = $("#event").val();       
        $.post("refreshform.php", {event1: event}, function(data) {
            alert(data);                
        });
    });
});
