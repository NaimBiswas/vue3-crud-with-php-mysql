<?php
$connection = mysqli_connect('localhost', 'root', '', 'vue_crud');

$action = "read";

if (isset($_GET['action'])) {
   $action = $_GET['action'];
}

if ($action == 'read') {
   $result = $connection->query("SELECT * FROM  `users`");
}
$response = [
   '',
];
header('content-type: application/json');
echo json_encode($response);
