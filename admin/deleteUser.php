<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$usersModule = new UsersModule();

$id = $_GET['id'];
$usersModule->deleteUser($id);
header("Location: users.php");
?>
