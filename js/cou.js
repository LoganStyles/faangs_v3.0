function pop(val) {
    //alert (val);
    check(val);
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
    //alert(a);
    if (a !== 'Nigeria') {
        document.getElementById('third').style.display = 'none';
        document.getElementById('msg').innerHTML = 'This Contest is for Nigerian only';
        //document.forms["myform"]["bank"].value='not a nigeria';
        //document.forms["myform"]["accname"].value='not a nigeria';
        //document.forms["myform"]["accnumber"].value='not a nigeria';
        document.getElementById("bank").value = "not a nigeria";
        document.getElementById("accno").value = "not a nigeria";
        document.getElementById("accname").value = "not a nigeria";
    } else {
        document.getElementById('third').style.display = 'block';
        document.getElementById('msg').innerHTML = '';
    }
}