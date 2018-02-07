<?php
$query1 = "select * from vip  order by rand()";
$result1 = mysql_query($query1);
while ($rec = mysql_fetch_array($result1)) {    
    echo "<a href=\"chat2.php?user={$rec['username']}\"><div class=\"card border-secondary mb-3 mySlides\" style=\"max-width: 18rem;\">";
    echo "<div class=\"card-body text-secondary\" style=\"padding: 0;\">";
    echo "<img class=\"card-img-top \" src=\"vip/{$rec['image']}\"/>";
    echo "</div></div></a>";
}
?>
<script>
    var col = 0;
    showSli();
    function showSli() {
        var i;
        /** var slides = document.getElementsByClassName("mySlides");
         for (i = 0; i < slides.length; i++) 
         {
         slides[i].style.display = "none";
         }*/
        var slides = $(".mySlides");
//        console.log('len '+slides.length) hides all
        for (var i = 0; i < slides.length; i++) {
            var element = slides.eq(i);
            element.hide();
        }

        //var slides = document.getElementsByClassName("mySlides");
        var slides = $(".mySlides");
        lent = slides.length;
        var total = Math.ceil(lent / 2);
        console.log('total '+total)
        console.log('col '+col)
        col++;
        if (col > total) {
            col = 1
        }
        var row;
        for (row = 2 * col - 1; row <= 2 * col; row++)
        {
            console.log('row '+row);
             slides[row-1].style.display = "block";
//            var element2 = slides.eq(row - 1);
            var element2 = slides[row-2];
            console.log('element2 '+element2)
//            $(element2).fadeIn(3000);
        }
        setTimeout(showSli, 5000);
    }

</script>