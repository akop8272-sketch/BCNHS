<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$resourcesModule = new ResourcesModule();

$id = $_GET['id'];
$resourcesModule->deleteResource($id);
header("Location: learning_resources.php");
?>
