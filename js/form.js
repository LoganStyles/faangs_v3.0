function t() {
    var slides = document.getElementsByClassName("o");
    for (i = 0; i < slides.length; i++) {
        if (slides[i].innerHTML = " ") {

            alert("ok");
        }
    }

}

function chk() {

    if (document.getElementById('model').checked)
    {
        document.getElementById('tes').style.display = 'block';
    } else if (document.getElementById('model2').checked)
    {
        document.getElementById('tes').style.display = 'none';
    }
}

function passwordt() {
    //var ok= document.getElementById('pwd').reset();
    //ok.value=='';
    //alert('ok');	
}
//window.onload(chk(),passwordt());
//window.onload(chk());
window.onload=chk();

