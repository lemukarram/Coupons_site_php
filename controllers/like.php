<?php 

require '../core.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_GET['action']) && $_GET['action'] == 'like') {

        $item_id = clearGetData($_POST['item']);
        $user_id = clearGetData(getClientIp());
        $rating = 'like';

        $state = $connect->prepare("SELECT * FROM likes WHERE rating = :rating AND user = :user AND item = :item");
        $state->execute(array(
            ':item' => $item_id,
            ':user' => $user_id,
            ':rating' => $rating
        ));

        $result = $state->fetch();

        if ($result == false) {

            $statment = $connect->prepare("INSERT INTO likes (id,item,user,rating) VALUES (null, :item, :user, :rating)");

            $statment->execute(array(
                ':item' => $item_id,
                ':user' => $user_id,
                ':rating' => $rating
            ));

        }else{

            exit();
            
        }

    }

    if (isset($_GET['action']) && $_GET['action'] == 'deslike') {

        $item_id = clearGetData($_POST['item']);
        $user_id = clearGetData(getClientIp());
        $rating = 'deslike';

        $state = $connect->prepare("SELECT * FROM likes WHERE rating = :rating AND user = :user AND item = :item");
        $state->execute(array(
            ':item' => $item_id,
            ':user' => $user_id,
            ':rating' => $rating
        ));

        $result = $state->fetch();

        if ($result == false) {

            $statment = $connect->prepare("INSERT INTO likes (id,item,user,rating) VALUES (null, :item, :user, :rating)");

            $statment->execute(array(
                ':item' => $item_id,
                ':user' => $user_id,
                ':rating' => $rating
            ));

        }else{

            exit();
            
        }

    }

}

?>