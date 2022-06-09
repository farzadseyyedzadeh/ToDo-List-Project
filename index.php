<?php
include "bootstrap/init.php";

if(isset($_GET['logout'])){
    logout();
}

if(!isLoggedIn()){  
    header("Location: " . site_url('auth.php'));
}

$user = getLoggedInUser();

if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
    $deletedCount = deleteFolder($_GET['delete_folder']);
}

if(isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])){
    $deletedCount = deleteTask($_GET['delete_task']);
}

$folders = getFolders();
$tasks = getTasks();

include "tpl/tpl-index.php";