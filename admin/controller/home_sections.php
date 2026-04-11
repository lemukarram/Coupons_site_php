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
            
            // We need to merge the data from both tables (Order & Custom Content)
            // Because they both use the same array name "sections"
            
            $all_sections_data = $_POST['sections'];

            foreach ($all_sections_data as $name => $data) {
                
                // Get existing values
                $current_stmt = $connect->prepare("SELECT * FROM home_sections WHERE section_name = :name");
                $current_stmt->execute([':name' => $name]);
                $current = $current_stmt->fetch(PDO::FETCH_ASSOC);

                if(!$current) continue;

                // We don't use cleardata() here because we want to allow the [h2] tags
                // The parseCustomTags() function handles the safe conversion to HTML on frontend
                
                $stmt = $connect->prepare("UPDATE home_sections SET 
                    section_title = :title, 
                    section_description = :description, 
                    section_content = :content,
                    section_order = :order,
                    section_status = :status,
                    step1_title = :step1_title,
                    step1_icon = :step1_icon,
                    step2_title = :step2_title,
                    step2_icon = :step2_icon,
                    step3_title = :step3_title,
                    step3_icon = :step3_icon
                    WHERE section_name = :name");
                
                $params = [
                    ':title' => isset($data['title']) ? $data['title'] : $current['section_title'],
                    ':description' => isset($data['description']) ? $data['description'] : $current['section_description'],
                    ':content' => isset($data['content']) ? $data['content'] : $current['section_content'],
                    ':order' => isset($data['order']) ? (int)$data['order'] : (int)$current['section_order'],
                    ':status' => isset($data['status']) ? (int)$data['status'] : (int)$current['section_status'],
                    ':step1_title' => isset($data['step1_title']) ? $data['step1_title'] : $current['step1_title'],
                    ':step1_icon' => isset($data['step1_icon']) ? $data['step1_icon'] : $current['step1_icon'],
                    ':step2_title' => isset($data['step2_title']) ? $data['step2_title'] : $current['step2_title'],
                    ':step2_icon' => isset($data['step2_icon']) ? $data['step2_icon'] : $current['step2_icon'],
                    ':step3_title' => isset($data['step3_title']) ? $data['step3_title'] : $current['step3_title'],
                    ':step3_icon' => isset($data['step3_icon']) ? $data['step3_icon'] : $current['step3_icon'],
                    ':name' => $name
                ];

                $stmt->execute($params);

                // Handle Image Upload
                if (isset($_FILES['section_image_'.$name]) && $_FILES['section_image_'.$name]['error'] == 0) {
                    $image_name = $_FILES['section_image_'.$name]['name'];
                    $image_temp = $_FILES['section_image_'.$name]['tmp_name'];
                    $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
                    $new_image_name = "section_".time()."_".$name.".".$image_ext;
                    $path = "../../images/".$new_image_name;
                    
                    if (move_uploaded_file($image_temp, $path)) {
                        $img_stmt = $connect->prepare("UPDATE home_sections SET section_image = :image WHERE section_name = :name");
                        $img_stmt->execute([':image' => $new_image_name, ':name' => $name]);
                    }
                }
            }
            header('Location: ' . $_SERVER['PHP_SELF'] . '?success=true');
            exit();
        }

        $sections = [];
        $query = $connect->query("SELECT * FROM home_sections ORDER BY section_order ASC");
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
