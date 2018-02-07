
<?php

$query1 = "select * from advert where tops='1'";
$result1 = mysql_query($query1);
while ($rec = mysql_fetch_array($result1)) {
    echo "<div class=\"card border-secondary mb-3\" style=\"max-width: 18rem;\">";
    echo "<div class=\"card-body text-secondary\">";
    echo "";
    echo "<img class=\"card-img-top\" src=\"banner/{$rec['imgname']}\"/>";
    echo "</div></div>";
}
?>