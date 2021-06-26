<?php include('header.php'); ?>
<?php include('post.php'); 
$post= new post($db);

?>
<?php 

$post->deletepostbyslug($_GET['slug']);
header('location:result.php');




?>


