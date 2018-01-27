<?php
require_once("incl/cons.php");
//cont();
$coname = $_POST['co'];

$conname = "select * from countries where name='$coname'";
$cou2 = mysql_query($conname);
$c2 = mysql_fetch_array($cou2);
$state = $c2['id'];


$coun = "select * from states where country_id='$state'";
$rcount2 = mysql_query($coun);
if (mysql_num_rows($rcount2) > 0) {
    while ($r2 = mysql_fetch_array($rcount2)) {
        echo"  <option value=\"{$r2['name']}\"> {$r2['name']}</option>";
    }
} else {
    echo"  <option value=\"\">SELECT YOUR STATE</option>";
}
