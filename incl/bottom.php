
<?php

$query1 = "select * from advert where bottoms='1'";
$result1 = mysql_query($query1);


while ($resc = mysql_fetch_array($result1)) {
    echo"<div class=\"card border-secondary mb-3 rightcl\" style=\"max-width: 18rem;\">";
    echo"<div class=\"text-secondary\">";
    echo"<img class=\"card-img-top\" src=\"banner/{$rec['imgname']}\"></div></div>";
}
?>