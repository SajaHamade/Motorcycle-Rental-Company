<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con = mysqli_connect('localhost', 'root', '', 'final1');
if (!$con) {
    echo "please check your DATABASE CONNECTION";
}
