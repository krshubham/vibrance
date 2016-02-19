$(document).ready(function() {
    $("#adaptune").click(function() {        
        $.post("adaptune.php", {}, function(data) {
            alert(data);                
        });
    });
});
