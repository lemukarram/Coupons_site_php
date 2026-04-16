<?php
require 'config.php';
require 'functions.php';

try {
    $connect = new PDO('mysql:host=127.0.0.1;dbname='. $database['db'], $database['user'], $database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Create posts table
$sql_posts = "CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_status` tinyint(1) NOT NULL DEFAULT 1,
  `post_created` datetime NOT NULL DEFAULT current_timestamp(),
  `post_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_seotitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_seodescription` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_author` int(11) DEFAULT 1,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_slug` (`post_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

// Create blog_comments table
$sql_comments = "CREATE TABLE IF NOT EXISTS `blog_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_post` int(11) NOT NULL,
  `comment_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `comment_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `comment_content` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_status` tinyint(1) NOT NULL DEFAULT 1,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_id`),
  KEY `comment_post` (`comment_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

try {
    $connect->exec($sql_posts);
    echo "Table 'posts' created successfully.\n";
    $connect->exec($sql_comments);
    echo "Table 'blog_comments' created successfully.\n";
} catch (PDOException $e) {
    echo "Error creating tables: " . $e->getMessage() . "\n";
}
?>
