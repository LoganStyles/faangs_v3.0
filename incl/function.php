<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function test_inputs($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function index() {
    $missing = array();
    foreach ($_POST as $key => $value) {
        if ($value == "") {
            array_push($missing, $key);
        }
    }
    if (count($missing) > 0) {
        $nam = "<H5>kindly fill in the following form field</H5>";
        echo "<div class=\"alert alert-danger\">";
        echo "	<strong>";
        echo "{$nam}";
        echo "	</strong>";
        echo "</div>";
        foreach ($missing as $k => $v) {
            echo $v . "</BR>";
        }
        echo"<b><a href=\"registration.php\">Back</a></b>";
        die();
    } else {
        unset($missing);
    }
}

?>