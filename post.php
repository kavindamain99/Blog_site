<?php 
include ('db.php');
include('function/functions.php');

class post{
    private $db;
    public function __construct($db){
        $this->db = $db;
        
    }
    public function addpost($title,$description,$image,$date,$slug ){
       $sql= "INSERT INTO posts(title,description,image,created_at,slug) VALUES ('$title','$description','$image','$date','$slug')";
        
    $result = mysqli_query($this->db,$sql); 
        
    
if($result){
if($_POST['tags']){
    $tags= $_POST['tags'];
    $lastinsertid=mysqli_insert_id($this->db);
    foreach($tags as $tag){
        
        $sql="INSERT INTO post_tags(post_id,tag_id)VALUES('$lastinsertid',$tag)";
        $result = mysqli_query($this->db,$sql);
    }
}    
  
}    


    
 return $result;   
    
    }

public function getpost(){
    
    if(isset($_GET['tag'])){
    $tag=$_GET['tag'];
        $sql="SELECT * 
             FROM posts 
             INNER JOIN post_tags ON posts.id = post_tags.post_id
             INNER JOIN tags ON tags.id = post_tags.tag_id
             WHERE tags.tag='$tag'";
        $result=mysqli_query($this->db,$sql);
        return $result;
        
    }
    
    
    
    $sql="SELECT * FROM posts";
    $result=mysqli_query($this->db,$sql);
    return $result;
    }

public function getsinglepost($slug){
    
$sql = "SELECT * FROM posts WHERE slug='$slug'";
$result=mysqli_query($this->db,$sql); 
return $result;
}

public function updatepost($title,$description,$slug){
$newimage = $_FILES['image']['name'];
    
if(!empty($newimage)){
  $image = uploadimage();
$sql= "UPDATE posts SET title='$title',description='$description',image='$image' WHERE slug='$slug'";
$result=mysqli_query($this->db,$sql);
    return $result;
    
} 
else {
  $sql= "UPDATE posts SET title='$title',description='$description' WHERE slug='$slug'";
$result=mysqli_query($this->db,$sql);
    return $result;
      
    
}    
    
} 
    
    
public function deletepostbyslug($slug){
$sql="DELETE FROM posts WHERE slug='$slug' ";
$result= mysqli_query($this->db,$sql);
return $result;
    
} 
}
   





?>