$(document).ready(function() {
    $("#adaptune").click(function() { 
    var event = $("#event_adaptune").val();
    var parti = 1;       
        $.post("refreshform.php", {event1: event, parti1: parti}, function(data) {
            alert(data);                
        });
    });

    $("#bollywoodbattle").click(function() { 
    var event = $("#event_bollywoodbattle").val();
    var parti = $("#parti_bollywoodbattle").val();       
        $.post("refreshform.php", {event1: event, parti1: parti}, function(data) {
            alert(data);                
        });
    });

    $("#dancingduo").click(function() { 
    var event = $("#event_dancingduo").val();
    var parti = 2;       
        $.post("refreshform.php", {event1: event, parti1: parti}, function(data) {
            alert(data);                
        });
    });

    $("#groupdance").click(function() { 
    var event = $("#event_groupdance").val();
    var parti = 1;       
        $.post("refreshform.php", {event1: event, parti1: parti}, function(data) {
            alert(data);                
        });
    });

    $("#solodance").click(function() { 
    var event = $("#event_solodance").val();
    var parti = 1;       
        $.post("refreshform.php", {event1: event, parti1: parti}, function(data) {
            alert(data);                
        });
    });
});
