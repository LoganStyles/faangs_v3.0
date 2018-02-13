function pop(val) {
    //alert (val);
    //check(val);
    $.ajax({
        type: "POST",
        url: "state.php",
        data: 'co=' + val,
        success: function (data) {
            $("#state").html(data);
        }
    });
}
function check(a) {
    
    if (a !== 'Nigeria') {
        document.getElementById('third').style.display = 'none';
        document.getElementById('msg').innerHTML = 'This Service is for Nigerians only';
    } else {
        document.getElementById('third').style.display = 'block';
        document.getElementById('msg').innerHTML = '';
    }
}