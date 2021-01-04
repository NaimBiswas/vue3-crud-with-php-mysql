<?php
$connection = mysqli_connect('localhost', 'root', '', 'vue_crud');

$action = "read";

$response = [];
if (isset($_GET['action'])) {
   $action = $_GET['action'];
}

if ($action == 'read') {
   $users = [];
   $result = $connection->query("SELECT * FROM  `users`");

   while ($row = $result->fetch_assoc()) {

      array_push($users, $row);
      $response = ['users' => $users];
   }
}

header('content-type: application/json');
echo json_encode($response);
