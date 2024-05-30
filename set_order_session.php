<?php
session_start();
$_SESSION['order_initiated'] = true;
http_response_code(200); // Respond with a status code of 200 OK
?>
