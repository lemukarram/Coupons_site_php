<?php

session_start();
if (isset($_SESSION['user_email'])){
    
    require '../../config.php';
    require '../functions.php'; 
    require '../views/header.view.php';

    $connect = connect();
    if(!$connect){
        header('Location: ./error.php');
    } 

    $check_access = check_access($connect);

    if ($check_access['user_role'] == 1){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            foreach ($_POST['sections'] as $name => $data) {
                $stmt = $connect->prepare("UPDATE home_sections SET 
                    section_title = :title, 
                    section_description = :description, 
                    section_content = :content,
                    step1_title = :step1_title,
                    step1_icon = :step1_icon,
                    step2_title = :step2_title,
                    step2_icon = :step2_icon,
                    step3_title = :step3_title,
                    step3_icon = :step3_icon
                    WHERE section_name = :name");
                
                $stmt->execute([
                    ':title' => $data['title'],
                    ':description' => $data['description'],
                    ':content' => isset($data['content']) ? $data['content'] : NULL,
                    ':step1_title' => isset($data['step1_title']) ? $data['step1_title'] : NULL,
                    ':step1_icon' => isset($data['step1_icon']) ? $data['step1_icon'] : NULL,
                    ':step2_title' => isset($data['step2_title']) ? $data['step2_title'] : NULL,
                    ':step2_icon' => isset($data['step2_icon']) ? $data['step2_icon'] : NULL,
                    ':step3_title' => isset($data['step3_title']) ? $data['step3_title'] : NULL,
                    ':step3_icon' => isset($data['step3_icon']) ? $data['step3_icon'] : NULL,
                    ':name' => $name
                ]);

                // Handle Image Upload for each section if provided
                if (isset($_FILES['section_image_'.$name]) && $_FILES['section_image_'.$name]['error'] == 0) {
                    $image_name = $_FILES['section_image_'.$name]['name'];
                    $image_temp = $_FILES['section_image_'.$name]['tmp_name'];
                    $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
                    $new_image_name = "section_".time()."_".$name.".".$image_ext;
                    $path = "../../images/".$new_image_name;
                    
                    if (move_uploaded_file($image_temp, $path)) {
                        $stmt = $connect->prepare("UPDATE home_sections SET section_image = :image WHERE section_name = :name");
                        $stmt->execute([':image' => $new_image_name, ':name' => $name]);
                    }
                }
            }
            header('Location: ' . $_SERVER['PHP_SELF'] . '?success=true');
        }

        $sections = [];
        $query = $connect->query("SELECT * FROM home_sections");
        while ($row = $query->fetch()) {
            $sections[$row['section_name']] = $row;
        }

        require '../views/home_sections.view.php'; 

    }else{
        header('Location:'.SITE_URL);
    }

    require '../views/footer.view.php';
    
}else {
    header('Location: ./login.php');     
}
