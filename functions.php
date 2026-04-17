<?php

/*--------------------*/
// Description: Couponza - Coupons & Discounts Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

use voku\helper\AntiXSS;

require_once __DIR__ . '/classes/anti-xss/autoload.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function connect(){

    global $database;

    try{
        $connect = new PDO('mysql:host='.$database['host'].';dbname='.$database['db'],$database['user'],$database['pass'], array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function isLogged(){

    if (isset($_SESSION['signedin']) && $_SESSION['signedin'] == true) {
        return true;
    }else{
        return false;
    }
}

function isAdmin(){

    if (isset($_SESSION['signedin']) && $_SESSION['signedin'] == true) {

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_EMAIL);
    
    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_status = 1 AND user_role = 1 LIMIT 1"); 
    $sentence->execute(array(
        ':user_email' => $emailSession,
        ));
    $row = $sentence->fetch();

    if ($row) {
        
        return true;

    }else{

        return false;
    }

    }else{
        return false;
    }

}

function isEditor(){

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_EMAIL);
    
    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_status = 1 AND user_role = 2 LIMIT 1"); 
    $sentence->execute(array(
        ':user_email' => $emailSession,
        ));
    $row = $sentence->fetch();

    if ($row) {
        
        return true;

    }else{

        return false;
    }

}

function isExclusive($value){
    
    if($value == 1){
        return true;
    }else{
        return false;
    }
}

function isVerified($value){
    
    if($value == 1){
        return true;
    }else{
        return false;
    }
}

function isEditing(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'edit';
}

function getStrings($connect){

        $sentence = $connect->query("SELECT * FROM translations");
        $row = $sentence->fetch(PDO::FETCH_ASSOC);
        return $row;
}

function echoOutput($data){
    $data = htmlspecialchars(($data ? $data : ""), ENT_COMPAT, 'UTF-8');
    return $data;
}

function textTruncate($data, $chars) {
    if(strlen($data) > $chars) {
        $data = $data.' ';
        $data = substr($data, 0, $chars);
        $data = $data.'...';
    }
    return $data;
}

function echoNoHtml($data){
    $data = strip_tags($data);
    $data = htmlentities($data, ENT_QUOTES, "UTF-8");
    $data = substr($data, 0, 255);
    return $data;
}

function clearGetData($data){

    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function lengthInput($data, $min, $max = NULL){

    $characters = strlen($data);
    $spaces = preg_match('/\s/',$data);

    if ($max) {
        if ($characters >= $min && $characters <= $max && !$spaces) {
            return true;
        }else{
            return false;
        }
    }else{

        if ($characters >= $min && !$spaces) {
            return true;
        }else{
            return false;
        }
    }
}

function validateInput($data){

    $specialChars = preg_match('@[^\w]@', $data);

    if ($specialChars) {
        return true;
    }else{
        return false;
    }
}

function getCurrentPageSlug(){
    
    return isset($_GET['slug']) && !empty($_GET['slug']) ? clearGetData($_GET['slug']) : NULL;
}

function getNumPage(){
    
    return isset($_GET['p']) && !empty($_GET['p']) && (int)$_GET['p'] ? clearGetData($_GET['p']) : 1;
}

function getItemId(){
    
    return isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : NULL;
}

function getCodeParams(){
    
    if(isset($_GET['c']) && !empty(clearGetData($_GET['c']))){
        return true;
    }else{
        return false;
    }
}

function getCode(){
    
    return isset($_GET['c']) && !empty(clearGetData($_GET['c'])) && clearGetData($_GET['c']) ? clearGetData($_GET['c']) : NULL;
}

function getFilterParam(){
    
    return isset($_GET['filter']) && !empty($_GET['filter']) && $_GET['filter'] ? clearGetData($_GET['filter']) : NULL;
}

function getIDCategory(){
    
    return isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] ? clearGetData($_GET['category']) : NULL;
}

function getIDStore(){
    
    return isset($_GET['store']) && !empty($_GET['store']) && $_GET['store'] ? clearGetData($_GET['store']) : NULL;
}

function getIDRating(){
    
    return isset($_GET['rating']) && !empty($_GET['rating']) && $_GET['rating'] ? clearGetData($_GET['rating']) : NULL;
}

function getIDSubCategory(){
    
    return isset($_GET['subcategory']) && !empty($_GET['subcategory']) && $_GET['subcategory'] ? clearGetData($_GET['subcategory']) : NULL;
}

function getIDUser(){
    
    return isset($_GET['user']) && !empty($_GET['user']) && $_GET['user'] ? clearGetData($_GET['user']) : NULL;
}

function getSortBy($value){

   if (isset($_GET['sortby']) && $_GET['sortby'] === $value) {
       
       return "value = '$value' selected";
   }

   return "value = '$value'";
}

function getSlugItem(){
    
    return isset($_GET['slug']) && !empty($_GET['slug']) && $_GET['slug'] ? clearGetData($_GET['slug']) : NULL;
}

function getSearchQuery(){
    
    return isset($_GET['query']) && !empty($_GET['query']) && $_GET['query'] ? clearGetData($_GET['query']) : NULL;
}

function getSlugCategory(){
    
    return isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] ? clearGetData($_GET['category']) : NULL;
}

function getSlugSubCategory(){
    
    return isset($_GET['subcategory']) && !empty($_GET['subcategory']) && $_GET['subcategory'] ? clearGetData($_GET['subcategory']) : NULL;
}

function getSlugStore(){
    
    return isset($_GET['store']) && !empty($_GET['store']) && $_GET['store'] ? clearGetData($_GET['store']) : NULL;
}

function getParamsSort(){
    
    return isset($_GET['sortby']) && !empty($_GET['sortby']) ? clearGetData($_GET['sortby']) : NULL;
}

function formatDate($date){

    $sentence = connect()->prepare("SELECT st_dateformat FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $newDate = date($row['st_dateformat'], strtotime($date));
    return echoOutput($newDate);
}

function formatXmlDate($date){

    $datetime = new DateTime($date);
    $result = $datetime->format('Y-m-d\TH:i:sP');
    return echoOutput($result);
}

function generatePassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function maskEmail($email){

    $mail_parts = explode('@', $email);
    $username = '@'.$mail_parts[0];
    $len = strlen($username);

    return $username;
}

function getUserInfo($connect, $userEmail = NULL){

    if (!$userEmail) {

        $email = filter_var(strtolower($_SESSION['user_email']), FILTER_VALIDATE_EMAIL);

    }else{

        $email = filter_var(strtolower($userEmail), FILTER_VALIDATE_EMAIL);
    }
    
    if ($email) {

        $sentence = $connect->prepare("SELECT * FROM users WHERE user_status = 1 AND user_email = :user_email LIMIT 1");
        $sentence->execute(array(
            ':user_email' => $email
            ));
        $row = $sentence->fetch();
        return $row;
    }else{

        return null;
    }
}

function isUserVerified($userEmail){

    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_verified = 1 LIMIT 1"); 
    $sentence->execute(array(
		':user_email' => $userEmail,
		));
    $row = $sentence->fetch();
    return ($row) ? true : false;
}

function getGravatar($email, $s = 150, $d = 'mp', $r = 'g', $img = false, $atts = array()) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function numTotalPages($total_items, $items_page){

    $numPages = ceil($total_items / $items_page);
    return $numPages;
}

function countFormat($num) {

      if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;
    }

  return $num;
}

function getSocialMedia($connect){
    
    $sentence = $connect->prepare("SELECT st_facebook,st_twitter,st_youtube,st_instagram,st_linkedin,st_whatsapp FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function isLike($connect, $itemId){
    $sentence = $connect->prepare("SELECT * FROM likes WHERE user = '".getClientIp()."' AND item = :item LIMIT 1");
    $sentence->execute(array(
		':item' => $itemId,
		));
    $row = $sentence->fetch();
    return ($row) ? true : false;
}

function getDateByTimeZone(){

    $sentence = connect()->prepare("SELECT st_timezone FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();
    $date = new DateTime("now", new DateTimeZone($row['st_timezone']) );
    return $date->format('Y-m-d H:i');

}

/*------------------------------------------------------------ */
/* SITE */
/*------------------------------------------------------------ */

function getSeoTitle($pageTitle = NULL, $pageSubTitle = NULL){

    if (!$pageSubTitle && empty($pageSubTitle)) {
        
        return $pageTitle;
        
    }elseif(!$pageTitle && empty($pageTitle)){

        return $pageSubTitle;

    }elseif($pageTitle && !empty($pageTitle) && $pageSubTitle && !empty($pageSubTitle)){

        return $pageSubTitle.' - '.$pageTitle;

    }else{

        return null;
    }
}

function getSeoDescription($generalDescription, $itemDescription = NULL, $seoDescription = NULL){

    if (!$itemDescription && empty($itemDescription) && !$seoDescription && empty($seoDescription)) {
        
        return echoNoHtml($generalDescription);
        
    }else{

        if ($seoDescription && !empty($seoDescription)) {

            return echoNoHtml($seoDescription);

        }else{

            return echoNoHtml($itemDescription);
        }

    }
}

function echoCouponImage($image1, $image2){
    
    if(!empty($image1)){
        return $image1;
    }elseif(!empty($image2)){
        return $image2;
    }else{
        return false;
    }
}

/*------------------------------------------------------------ */
/* CONTENT */
/*------------------------------------------------------------ */

function getStoreBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS stores.*, (SELECT COUNT(*) FROM reviews WHERE reviews.item = stores.store_id AND reviews.status = 1) AS total_reviews, (SELECT AVG(rating) FROM reviews WHERE reviews.item = stores.store_id AND reviews.status = 1) AS rating FROM stores LEFT JOIN reviews ON reviews.item = stores.store_id WHERE store_status = 1 AND store_slug = :slug LIMIT 1");
    $sentence->execute(array(
		':slug' => $slug,
		));
    $row = $sentence->fetch();
    return $row;
}

function getUserInfoById($connect, $id){
    $sentence = $connect->prepare("SELECT users.* FROM users WHERE user_status = 1 AND user_id = :user_id LIMIT 1");
    $sentence->execute(array(
		':user_id' => $id,
		));
    $row = $sentence->fetch();
    return $row;
}

function getFeaturedCoupons($connect, $limit){

    $sentence = $connect->prepare("SELECT coupons.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, stores.store_slug AS store_slug, stores.store_image AS store_image, users.user_name AS author_name FROM coupons LEFT JOIN categories ON coupons.coupon_category = categories.category_id LEFT JOIN stores ON coupons.coupon_store = stores.store_id LEFT JOIN users ON coupons.coupon_author = users.user_id LEFT JOIN subcategories ON coupons.coupon_subcategory = subcategories.subcategory_id WHERE coupons.coupon_status = 1 AND coupons.coupon_featured = 1 AND ('".getDateByTimeZone()."' < coupons.coupon_expire OR coupons.coupon_expire IS NULL OR coupons.coupon_expire = '') GROUP BY coupons.coupon_id ORDER BY coupons.coupon_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getExclusiveCoupons($connect, $limit){

    $sentence = $connect->prepare("SELECT coupons.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, stores.store_slug AS store_slug, stores.store_image AS store_image, users.user_name AS author_name FROM coupons LEFT JOIN categories ON coupons.coupon_category = categories.category_id LEFT JOIN stores ON coupons.coupon_store = stores.store_id LEFT JOIN users ON coupons.coupon_author = users.user_id LEFT JOIN subcategories ON coupons.coupon_subcategory = subcategories.subcategory_id WHERE coupons.coupon_status = 1 AND coupons.coupon_exclusive = 1 AND ('".getDateByTimeZone()."' < coupons.coupon_expire OR coupons.coupon_expire IS NULL OR coupons.coupon_expire = '') GROUP BY coupons.coupon_id ORDER BY coupons.coupon_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getLatestCoupons($connect, $limit){

    $sentence = $connect->prepare("SELECT coupons.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_title AS store_title, stores.store_slug AS store_slug, stores.store_image AS store_image, users.user_name AS author_name FROM coupons LEFT JOIN categories ON coupons.coupon_category = categories.category_id LEFT JOIN stores ON coupons.coupon_store = stores.store_id LEFT JOIN users ON coupons.coupon_author = users.user_id LEFT JOIN subcategories ON coupons.coupon_subcategory = subcategories.subcategory_id WHERE coupons.coupon_status = 1 AND ('".getDateByTimeZone()."' < coupons.coupon_expire OR coupons.coupon_expire IS NULL OR coupons.coupon_expire = '') GROUP BY coupons.coupon_id ORDER BY coupons.coupon_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getCouponById($connect, $itemId){

    $sentence = $connect->query("SELECT coupons.*, categories.*, subcategories.*, stores.*, users.user_name AS author_name FROM coupons LEFT JOIN categories ON coupon_category = categories.category_id LEFT JOIN stores ON coupon_store = stores.store_id LEFT JOIN users ON coupon_author = users.user_id LEFT JOIN subcategories ON coupon_subcategory = subcategories.subcategory_id WHERE coupons.coupon_status = 1 AND coupons.coupon_id = $itemId LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getItemsGallery($connect, $itemId){

    $sentence = $connect->prepare("SELECT * FROM coupons_gallery WHERE item = :item ORDER BY created DESC");
    $sentence->execute(array(
		':item' => $itemId,
		));
    return $sentence->fetchAll();
}

function getFeaturedStores($connect, $limit = NULL){
    if($limit){
        $sentence = $connect->prepare("SELECT stores.*, (SELECT COUNT(*) FROM coupons WHERE coupons.coupon_store = stores.store_id AND coupon_status = 1) AS total_items FROM stores WHERE stores.store_featured = 1 AND stores.store_status = 1 LIMIT $limit");
    }else{
        $sentence = $connect->prepare("SELECT stores.*, (SELECT COUNT(*) FROM coupons WHERE coupons.coupon_store = stores.store_id AND coupon_status = 1) AS total_items FROM stores WHERE stores.store_featured = 1 AND stores.store_status = 1");
    }
    $sentence->execute();
    return $sentence->fetchAll();
}

function getStores($connect, $limit = NULL){

    if($limit){
        $sentence = $connect->prepare("SELECT stores.* FROM stores WHERE stores.store_status = 1 LIMIT $limit");
    }else{
        $sentence = $connect->prepare("SELECT stores.* FROM stores WHERE stores.store_status = 1");
    }

    $sentence->execute();
    return $sentence->fetchAll();
}

function getStoresByLetter($connect, $letter = NULL){

    if(!$letter){
        $sentence = $connect->prepare("SELECT stores.* FROM stores WHERE store_status = 1 AND store_title REGEXP '^[0-9]'");
        $sentence->execute();

    }else{
        $sentence = $connect->prepare("SELECT stores.* FROM stores WHERE store_status = 1 AND store_title LIKE :letter");
        $keyword_to_search = $letter . '%';
        $sentence->execute(array(
            ':letter' => $keyword_to_search,
        ));
    }

    return $sentence->fetchAll();

}

function getSliders($connect){
    $sentence = $connect->prepare("SELECT * FROM sliders WHERE sliders.slider_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getMenuCategories($connect){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE categories.category_menu = 1 AND categories.category_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getFeaturedCategories($connect){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE categories.category_featured = 1 AND categories.category_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getCategories($connect){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE categories.category_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getCategoryById($connect, $id){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE category_status = 1 AND category_id = :id LIMIT 1");
    $sentence->execute(array(
		':id' => $id,
		));
    $row = $sentence->fetch();
    return $row;
}

function getCategoryBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE category_status = 1 AND category_slug = :slug LIMIT 1");
    $sentence->execute(array(
		':slug' => $slug,
		));
    $row = $sentence->fetch();
    return $row;
}

function getTagCategoryBySlug($slug){
    $sentence = connect()->prepare("SELECT * FROM categories WHERE category_status = 1 AND category_slug = :slug LIMIT 1");
    $sentence->execute(array(
		':slug' => $slug,
		));
    $row = $sentence->fetch();
    if($row){
        return $row['category_title'];
    }else{
        return false;
    }

}

function getTagSubCategoryBySlug($slug){
    $sqlQuery = "SELECT * FROM subcategories WHERE subcategory_status = 1 AND subcategory_slug = :slug LIMIT 1";
    $sentence = connect()->prepare($sqlQuery);
    $sentence->execute(array(
		':slug' => $slug,
		));
    $row = $sentence->fetch();
    if($row){
        return $row['subcategory_title'];
    }else{
        return false;
    }
}

function getTagStoreBySlug($slug){
    $sqlQuery = "SELECT * FROM stores WHERE store_status = 1 AND store_slug = :slug LIMIT 1";
    $sentence = connect()->prepare($sqlQuery);
    $sentence->execute(array(
		':slug' => $slug,
		));
    $row = $sentence->fetch();
    if($row){
        return $row['store_title'];
    }else{
        return false;
    }
}

function getSubCategories($connect, $parent){
    $sqlQuery = "SELECT subcategories.*, categories.category_id AS category_id FROM subcategories, categories WHERE subcategories.subcategory_parent = :parent AND subcategories.subcategory_status = 1 GROUP BY subcategories.subcategory_id";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute(array(
		':parent' => $parent,
		));
    return $sentence->fetchAll();
}

function getReviewsByCouponAjax($connect, $itemId, $limit){

    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS reviews.*, users.* FROM reviews LEFT JOIN users ON users.user_id = reviews.user WHERE item = :item AND reviews.status = 1 ORDER BY verified DESC, created DESC LIMIT 0,".$limit;
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute(array(
		':item' => $itemId
		));
    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $results = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return array('results' => $results, 'total' => $total);

}

function getLikesCountById($id){
    $sentence = connect()->prepare("SELECT COUNT(*) AS total FROM likes WHERE item = :item");
    $sentence->execute(array(
		':item' => $id,
		));
    $row = $sentence->fetch();
    return $row['total'];
}

function getSearch($connect, $items_per_page){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS coupons.*, categories.*, subcategories.*, stores.*, users.user_name AS author_name, (SELECT COUNT(*) FROM likes WHERE likes.item = coupons.coupon_id AND likes.rating = 'like') AS total_likes, (SELECT COUNT(*) FROM likes WHERE likes.item = coupons.coupon_id AND likes.rating = 'deslike') AS total_deslikes FROM coupons LEFT JOIN categories ON coupon_category = categories.category_id LEFT JOIN stores ON coupon_store = stores.store_id LEFT JOIN users ON coupon_author = users.user_id LEFT JOIN subcategories ON coupon_subcategory = subcategories.subcategory_id WHERE coupons.coupon_status = 1 AND coupons.coupon_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < coupons.coupon_expire OR coupons.coupon_expire IS NULL OR coupons.coupon_expire = '')";

    if(getSlugCategory()){

        $sqlQuery .= " AND coupons.coupon_category = (SELECT categories.category_id FROM categories WHERE categories.category_slug = '".getSlugCategory()."' LIMIT 1) ";
    }

    if(getSearchQuery()){

        $sqlQuery .= " AND stores.store_title LIKE '%".getSearchQuery()."%'";
    }

    if(getSlugSubCategory()){

        $sqlQuery .= " AND coupons.coupon_subcategory = (SELECT subcategories.subcategory_id FROM subcategories WHERE subcategories.subcategory_slug = '".getSlugSubCategory()."' LIMIT 1) ";
    }

    if(getSlugStore()){

        $sqlQuery .= " AND coupons.coupon_store = (SELECT stores.store_id FROM stores WHERE stores.store_slug = '".getSlugStore()."' LIMIT 1) ";
    }

    if(getFilterParam() && getFilterParam() == "exclusive" || getFilterParam() == "verified"){

        if(getFilterParam() == "exclusive"){
            $sqlQuery .= " AND coupons.coupon_exclusive = 1";
        }elseif(getFilterParam() == "verified"){
            $sqlQuery .= " AND coupons.coupon_verify = 1";
        }else{
            return NULL;
        }
        
    }

    $sqlQuery .= " GROUP BY coupons.coupon_id";

    if (getParamsSort()) {

        if(getParamsSort() == 'relevance') {

            $sqlQuery .= " ORDER BY coupons.coupon_created DESC";

        }elseif (getParamsSort() == 'best-rated') {

            $sqlQuery .= " ORDER BY total_reviews DESC";
        }

    }elseif(!isset($_GET['sortby']) || empty($_GET['sortby'])) {

        $sqlQuery .= " ORDER BY coupons.coupon_created DESC";
    }

    $sqlQuery .= " LIMIT $limit, $items_per_page";

    $sentence = $connect->prepare($sqlQuery);

    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getCouponsByStore($connect, $items_per_page, $itemId){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS coupons.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_id AS store_id, stores.store_title AS store_title, stores.store_image AS store_image, stores.store_slug AS store_slug, users.user_name AS author_name, (SELECT COUNT(*) FROM likes WHERE likes.item = coupons.coupon_id AND likes.rating = 'like') AS total_likes, (SELECT COUNT(*) FROM likes WHERE likes.item = coupons.coupon_id AND likes.rating = 'deslike') AS total_deslikes FROM coupons LEFT JOIN categories ON coupon_category = categories.category_id LEFT JOIN stores ON coupon_store = stores.store_id LEFT JOIN users ON coupon_author = users.user_id LEFT JOIN subcategories ON coupon_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = coupons.coupon_id WHERE coupons.coupon_store = :item AND coupons.coupon_status = 1 AND coupons.coupon_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < coupons.coupon_expire OR coupons.coupon_expire IS NULL OR coupons.coupon_expire = '') GROUP BY coupons.coupon_id ORDER BY coupons.coupon_created DESC LIMIT $limit, $items_per_page";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute(array(
		':item' => $itemId,
		));
    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getCouponsByCategory($connect, $items_per_page, $itemId){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS coupons.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = coupons.coupon_id AND reviews.status = 1) AS coupon_rating, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_id AS store_id, stores.store_title AS store_title, stores.store_image AS store_image, stores.store_slug AS store_slug, users.user_name AS author_name, (SELECT COUNT(*) FROM reviews WHERE reviews.item = coupons.coupon_id AND reviews.status = 1) AS total_reviews FROM coupons LEFT JOIN categories ON coupon_category = categories.category_id LEFT JOIN stores ON coupon_store = stores.store_id LEFT JOIN users ON coupon_author = users.user_id LEFT JOIN subcategories ON coupon_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = coupons.coupon_id WHERE coupons.coupon_category = '".$itemId."' AND coupons.coupon_status = 1 AND coupons.coupon_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < coupons.coupon_expire OR coupons.coupon_expire IS NULL OR coupons.coupon_expire = '') GROUP BY coupons.coupon_id ORDER BY coupons.coupon_created DESC LIMIT $limit, $items_per_page";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getSubCategoryBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT * FROM subcategories WHERE subcategory_status = 1 AND subcategory_slug = :slug LIMIT 1");
    $sentence->execute(array(
		':slug' => $slug,
		));
    $row = $sentence->fetch();
    return $row;
}

function getCouponsBySubCategory($connect, $items_per_page, $itemId){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS coupons.*, (SELECT AVG(rating) FROM reviews WHERE reviews.item = coupons.coupon_id AND reviews.status = 1) AS coupon_rating, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_id AS store_id, stores.store_title AS store_title, stores.store_image AS store_image, stores.store_slug AS store_slug, users.user_name AS author_name, (SELECT COUNT(*) FROM reviews WHERE reviews.item = coupons.coupon_id AND reviews.status = 1) AS total_reviews FROM coupons LEFT JOIN categories ON coupon_category = categories.category_id LEFT JOIN stores ON coupon_store = stores.store_id LEFT JOIN users ON coupon_author = users.user_id LEFT JOIN subcategories ON coupon_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = coupons.coupon_id WHERE coupons.coupon_subcategory = '".$itemId."' AND coupons.coupon_status = 1 AND coupons.coupon_start <= '".getDateByTimeZone()."' AND ('".getDateByTimeZone()."' < coupons.coupon_expire OR coupons.coupon_expire IS NULL OR coupons.coupon_expire = '') GROUP BY coupons.coupon_id ORDER BY coupons.coupon_created DESC LIMIT $limit, $items_per_page";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

/*------------------------------------------------------------ */
/* SITEMAP */
/*------------------------------------------------------------ */

function getPages($connect){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1");
    $sentence->execute();
    $row = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getCoupons($connect){
    
    $sqlQuery = "SELECT coupons.*, categories.category_title AS category_title, subcategories.subcategory_title AS subcategory_title, stores.store_id AS store_id, stores.store_title AS store_title, stores.store_image AS store_image, stores.store_slug AS store_slug, users.user_name AS author_name FROM coupons LEFT JOIN categories ON coupons.coupon_category = categories.category_id LEFT JOIN stores ON coupons.coupon_store = stores.store_id LEFT JOIN users ON coupons.coupon_author = users.user_id LEFT JOIN subcategories ON coupons.coupon_subcategory = subcategories.subcategory_id LEFT JOIN reviews ON reviews.item = coupons.coupon_id WHERE coupons.coupon_status = 1 GROUP BY coupons.coupon_id ORDER BY coupons.coupon_created DESC";
    $sentence = $connect->prepare($sqlQuery);
    $sentence->execute();
    $row = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getSubCategoriesSiteMap($connect){
    $sentence = $connect->prepare("SELECT subcategories.* FROM subcategories WHERE subcategories.subcategory_status = 1");
    $sentence->execute();
    $row = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

/*------------------------------------------------------------ */
/* ADS */
/*------------------------------------------------------------ */

function getHeaderAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'header' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getFooterAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'footer' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getSidebarAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'sidebar' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getModalAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'modal' AND ad_status = 1 LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getSettings($connect){
    
    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getTheme($connect){
    
    $sentence = $connect->prepare("SELECT * FROM theme"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getDefaultPage($connect, $page){

    if($page){

        $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_id = :page_id LIMIT 1");
        $sentence->execute(array(
            ':page_id' => $page,
            ));
        $row = $sentence->fetch();
        return $row;

    }else{
        return NULL;
    }

}

function getPageBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_slug = :slug LIMIT 1");
    $sentence->execute(array(
        ':slug' => $slug,
        ));
    $row = $sentence->fetch();
    return $row;
}

function getPageByID($connect, $id_page){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_id = :id_page LIMIT 1");
    $sentence->execute(array(
        ':id_page' => $id_page,
        ));
    $row = $sentence->fetch();
    return $row;
}

function getSidebarMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_sidebar = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getHeaderMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_header = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getFooterMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_footer = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getNavigation($connect, $idMenu){
    
    $sentence = $connect->prepare("SELECT navigations.navigation_id, navigations.navigation_parent, navigations.navigation_page, navigations.navigation_target, navigations.navigation_icon, COALESCE(pages.page_slug, navigations.navigation_url) AS navigation_url, COALESCE(pages.page_title, navigations.navigation_label) AS navigation_label, navigations.navigation_type FROM navigations LEFT JOIN pages ON page_id = navigations.navigation_page WHERE navigation_menu = :menu_id ORDER BY navigation_order ASC"); 
    $sentence->execute(array(
        ':menu_id' => $idMenu,
        ));
    return $sentence->fetchAll();
}

function getEmailTemplate($connect, $id){

    if (!empty($id) && (int)($id)) {

        $q = $connect->prepare("SELECT * FROM emailtemplates WHERE email_id = :email_id LIMIT 1");
        $q->execute(array(
            ':email_id' => $id,
            ));
        $f = $q->fetch();
        $result = $f;

        if ($result['email_disabled'] == 1) {
            return null;
        }else{
            return $result;
        }
    }else{

        return null;
    }  

}

function sendMail($array_content, $email_content, $destinationmail, $fromName, $subject, $isHtml, $replyToName = NULL, $replyToAddress = NULL) {
    
    $sentence = connect()->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    $settings = $sentence->fetch();
    
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();                                          
        $mail->Host       = $settings['st_smtphost'];                
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $settings['st_smtpemail'];              
        $mail->Password   = $settings['st_smtppassword'];                             
        $mail->SMTPSecure = $settings['st_smtpencrypt'];
        $mail->Port       = $settings['st_smtpport'];

        if (isset($replyToAddress, $replyToName) && !empty($replyToAddress) && !empty($replyToName)) {
            $mail->addReplyTo($replyToAddress, $replyToName);
        }

        $mail->setFrom($settings['st_smtpemail'], $fromName);
        $mail->CharSet = "UTF-8";
        $mail->AddAddress($destinationmail); 
        $mail->isHTML($isHtml);

        $find = array_keys($array_content);
        $replace = array_values($array_content);

        $mailcontent = str_replace($find, $replace, $email_content);
        $mailsubject = str_replace($find, $replace, $subject);

        $mail->Subject = $mailsubject;
        $mail->Body = $mailcontent;
        if (!$mail->send()){

            $result = $mail->ErrorInfo;
            
        }else{

            $result = 'TRUE';
        }

        return $result;

    } catch (Exception $e) {
     return $e;
    }

}

function memberSince($date){

    $timestamp = strtotime($date);
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $day = date('d', $timestamp);
    $month = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    //$date = "$day " . $months[$month] . " $year";
    $date = $months[$month] . " $year";
    return $date;
}

function getIcon($icon){

    if(empty($icon)){
        $output = "ti ti-minus";
        return $output;
    }else{
        $output = "ti ti-".$icon;
        return $output;
    }

}

function formatRating($value){

    if(!empty($value)){

        if($value <= 5){
            $starRating = number_format(echoOutput($value), 1);
            return $starRating;
        }else{
            return "5.0";
        }

    }else{
        return false;
    }

}

function showStars($value){

    $totalRating = 5;
    $starRating = number_format(($value ? $value : 0), 1);

    for ($i = 1; $i <= $totalRating; $i++) {
         if($starRating < $i ) {
            if((round($starRating) == $i)){
            echo "<i class='ion-ios-star-half'></i>";
            }else{
            echo "<i class='ion-ios-star-outline'></i>";
            }
         }else {
            echo "<i class='ion-ios-star'></i>";
         }
    }

}

function firstLetter($string){

    $output = $string[0];

    if(!empty($string) && !ctype_digit($output)){
    return $output;
    }else{
        return "A";
    }
}

function isExpired($date){

if(!empty($date)){

    if(getDateByTimeZone() < $date){
        return false;
    }else{
        return true;
    }
}else{
    return false;
}

}

function isNew($date){

    if(!empty($date)){

        $date1 = date_create($date);
        $date2 = date_create(getDateByTimeZone());
        $diff = date_diff($date1, $date2);

        $daydiff = abs(round((strtotime($date) - strtotime(getDateByTimeZone()))/86400));

        if($daydiff < 7){
            return true;
        }else{
            return false;
        }

}else{
    return false;
}
    
}

function timeLeft($date){

    if(!empty($date)){

            $sentence = connect()->prepare("SELECT * FROM translations");
            $sentence->execute();
            $row = $sentence->fetch();

            $date1 = date_create($date);
            $date2 = date_create(getDateByTimeZone());
            $diff = date_diff($date1, $date2);

            $hour = $diff->h;
            $minutes = $diff->i;

            $hourdiff = round((strtotime($date) - strtotime(getDateByTimeZone()))/3600, 1);

            if((int)$hourdiff  < 24 && (int)$hourdiff >= 1){
                return $hour.' '.$row['tr_17'];
            }elseif((int)$hourdiff = 0 || (int)$hourdiff <= 1){
                return $minutes.' '.$row['tr_18'];
            }else{
                return false;
            }

    }else{
        return false;
    }
}

function getCountDown($date){

    $sentence = connect()->prepare("SELECT st_timezone FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $datetime= date_create($date, timezone_open($row['st_timezone']));
    $fecha = $datetime->format(DateTime::ATOM); // Updated ISO8601
    return $fecha;

}

function getClientIp($single = 2) {
    $ipaddress = array();
    if( $single == 2){
      if (isset($_SERVER['HTTP_CLIENT_IP']))
          $ipaddress[] = $_SERVER['HTTP_CLIENT_IP'];
      if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
          $ipaddress[] = $_SERVER['HTTP_X_FORWARDED_FOR'];
      if(isset($_SERVER['HTTP_X_FORWARDED']))
          $ipaddress[] = $_SERVER['HTTP_X_FORWARDED'];
      if(isset($_SERVER['HTTP_FORWARDED_FOR']))
          $ipaddress[] = $_SERVER['HTTP_FORWARDED_FOR'];
      if(isset($_SERVER['HTTP_FORWARDED']))
          $ipaddress[] = $_SERVER['HTTP_FORWARDED'];
      if(isset($_SERVER['REMOTE_ADDR']))
          $ipaddress[] = $_SERVER['REMOTE_ADDR'];
      if(count($ipaddress) == 0)
          $ipaddress[] = 'UNKNOWN';
      $ips = implode(", ", array_unique($ipaddress));
    }
    if( $single == 1){
      $ips = $_SERVER['REMOTE_ADDR'];
    }
    return $ips;
}

function getHomeSection($connect, $name){
    try {
        $sentence = $connect->prepare("SELECT * FROM home_sections WHERE section_name = :name LIMIT 1");
        $sentence->execute([':name' => $name]);
        return $sentence->fetch();
    } catch (PDOException $e) {
        return [
            'section_title' => '',
            'section_description' => '',
            'section_content' => '',
            'section_image' => '',
            'step1_title' => '',
            'step1_icon' => '',
            'step2_title' => '',
            'step2_icon' => '',
            'step3_title' => '',
            'step3_icon' => ''
        ];
    }
}

function parseCustomTags($text) {
    $find = [
        '/\[h2\](.*?)\[\/h2\]/is',
        '/\[h3\](.*?)\[\/h3\]/is',
        '/\[b\](.*?)\[\/b\]/is',
        '/\[i\](.*?)\[\/i\]/is',
        '/\[list\](.*?)\[\/list\]/is',
        '/\[item\](.*?)\[\/item\]/is'
    ];
    $replace = [
        '<h2 class="uk-h2">$1</h2>',
        '<h3 class="uk-h3">$1</h3>',
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<ul class="uk-list uk-list-bullet">$1</ul>',
        '<li>$1</li>'
    ];
    return preg_replace($find, $replace, $text);
}

function getStoreBackgroundColor($id) {
    $colors = [
        '#F0F4FF', // Light Blue
        '#F5FFF0', // Light Green
        '#FFF9F0', // Light Peach
        '#FFF0F5', // Light Pink
        '#F5F0FF', // Light Lavender
        '#F0FFFD', // Light Cyan
        '#FFFDF0', // Light Yellow
        '#F0FFF5', // Light Mint
        '#FFF5F0', // Light Apricot
        '#F8F9FA'  // Off White
    ];
    return $colors[$id % count($colors)];
}

$arrayLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

function getPosts($connect, $limit = 10){
    try {
        $sentence = $connect->prepare("SELECT * FROM posts WHERE post_status = 1 ORDER BY post_created DESC LIMIT :limit");
        $sentence->bindParam(':limit', $limit, PDO::PARAM_INT);
        if (!$sentence->execute()) {
            return [];
        }
        return $sentence->fetchAll();
    } catch (Exception $e) {
        return [];
    }
}

function getPostBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT * FROM posts WHERE post_slug = :post_slug AND post_status = 1 LIMIT 1");
    $sentence->execute(array(':post_slug' => $slug));
    return $sentence->fetch();
}

function getCommentsByPost($connect, $post_id){
    $sentence = $connect->prepare("SELECT * FROM blog_comments WHERE comment_post = :post_id AND comment_status = 1 ORDER BY comment_date DESC");
    $sentence->execute(array(':post_id' => $post_id));
    return $sentence->fetchAll();
}

function fixImageExtension($filename) {
    if (empty($filename)) return "";
    // If the database has .png but the user says they have .jpg
    // We can try to replace .png with .jpg if requested by the browser
    // But better to just handle it here in the string before echoing.
    if (strpos($filename, '.png') !== false) {
        // You can uncomment the line below if you want to force .jpg for all .png pointers
        // return str_replace('.png', '.jpg', $filename);
    }
    return $filename;
}

function fixImg($filename) {
    if (empty($filename)) return "";
    return $filename;
}

function addComment($connect, $post_id, $name, $email, $content){
    $sentence = $connect->prepare("INSERT INTO blog_comments (comment_post, comment_name, comment_email, comment_content, comment_status) VALUES (:post_id, :name, :email, :content, 1)");
    return $sentence->execute(array(
        ':post_id' => $post_id,
        ':name' => $name,
        ':email' => $email,
        ':content' => $content
    ));
}

function getStoresByCategorySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT DISTINCT stores.* FROM stores JOIN coupons ON stores.store_id = coupons.coupon_store JOIN categories ON coupons.coupon_category = categories.category_id WHERE categories.category_slug = :slug AND stores.store_status = 1 AND stores.store_featured = 1 LIMIT 10");
    $sentence->execute(array(':slug' => $slug));
    return $sentence->fetchAll();
}

?>
