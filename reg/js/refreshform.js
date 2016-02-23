$(document).ready(function() {
    $("#adaptune").click(function() { 
    var event = $("#event").val();       
        $.post("refreshform.php", {event1: event, parti1: parti}, function(data) {
            alert(data);                
        });
    });
});
