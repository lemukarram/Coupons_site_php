<?php 
session_start();
if (isset($_SESSION['user_email'])){
    
require '../../config.php';
require '../functions.php';

$connect = connect($database);
if(!$connect){ exit; }

$check_access = check_access($connect);
if ($check_access['user_role'] == 1){

    if(isset($_POST["id"])){
        $id = cleardata($_POST["id"]);
        $statement = $connect->prepare("SELECT * FROM navigations WHERE navigation_id = :id");
        $statement->execute(array(':id' => $id));
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
}
}
?>