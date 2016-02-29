$(document).ready(function() {
    $("#adaptune").click(function() {
        var event = $("#event_adaptune").val();
        var parti = 1;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#bollywoodbattle").click(function() {
        var event = $("#event_bollywoodbattle").val();
        var parti = $("#parti_bollywoodbattle").val();
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#dancingduo").click(function() {
        var event = $("#event_dancingduo").val();
        var parti = 2;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#choreonight").click(function() {
        var event = $("#event_choreonight").val();
        var parti = 1;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#footloose").click(function() {
        var event = $("#event_footloose").val();
        var parti = 1;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#dumbcharades").click(function() {
        var event = $("#event_dumbcharades").val();
        var parti = 1;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#soundhunt").click(function() {
        var event = $("#event_soundhunt").val();
        var parti = 1;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#supersinger").click(function() {
        var event = $("#event_supersinger").val();
        var parti = 1;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#battleofbands").click(function() {
        var event = $("#event_battleofbands").val();
        var parti = 1;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });

    $("#artiste").click(function() {
        var event = $("#event_artiste").val();
        var parti = 1;
        $.post("refreshform.php", { event1: event, parti1: parti }, function(data) {
            alert(data);
        });
    });
});
