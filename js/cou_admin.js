function pop(val) {
    $.ajax({
        type: "POST",
        url: "state.php",
        data: 'co=' + val,
        success: function (data) {
            $("#state").html(data);
        }
    });
}