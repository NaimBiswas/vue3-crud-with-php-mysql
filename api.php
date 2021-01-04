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
      $response['users'] = $users;
   }
} elseif ($action == 'create') {
   $name = $_POST['name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $result = $connection->query("INSERT INTO `users`(`name`, `username`, `email`) VALUES ('$name', '$username','$email')");
   if ($result) {
      $response["massage = "] = 'Data Added Success';
   } else {
      $response["massage = "] = 'Data Save Faild';
   }
}

header('content-type: application/json');
echo json_encode($response);
