<?php

$conn = new mysqli('', '', '', '');
if (!$conn) {
    echo "Connection Denied" . mysqli_connect_error();
}
