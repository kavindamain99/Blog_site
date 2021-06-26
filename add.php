<?php 
include('header.php');
?>
<?php 
include('post.php');
?>
<?php 
include ('function/functions.php');

?>
<?php 
include ('tag.php');

?>



<?php
$tags = new Tag($db);
$post = new post($db);


if(isset($_POST['btnsubmit'])){

$data= date('Y-m-d');  
    
if(!empty($_POST['title'])&&!empty($_POST['description'])){
    
    $title=strip_tags ($_POST['title']);
    $description=$_POST['description'];
    $slug=createslug($title);
    $checkslug=mysqli_query($db,"SELECT * FROM posts WHERE slug='slug'");
    mysqli_num_rows($checkslug);
    if($result>0){
        
        foreach($checkslug as $cslug){
            
            $newslug=$slug.uniqid();
        }
         $record=$post->addpost($title,$description,uploadimage(),$data,$newslug);
        
    }
    else {
        
    $record=$post->addpost($title,$description,uploadimage(),$data,$slug); 
    }
   
    if($record==true){
        echo "<div class='text-center alert alert-success'>Post Added Succefully!</div>";
    }
    }else {
        echo "<div class='text-center alert alert-danger'>Every field required!</div>";
}
}
?>



<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<form method="post" action="add.php" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
    Add Post        
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="title" >Title</label>
            <input type="text" name="title" class="form-control">
            
        </div>
         <div class="form-group">
            <label for="description"  >Description</label>
        <textarea cols="10" name="description" class="form-control" id="editor"></textarea>  
            
        </div>
         <div class="form-group">
            <label for="image"  >Image</label>
    <input type="file" name="image" class="form-control">
            
        </div>
        
        <div class="form-group form-check-inline">
            <label for="image"  ><b>Choose Tags</b> &nbsp; &nbsp; &nbsp; &nbsp; </label>
            
        <?php foreach($tags->getalltags() as $tag){ ?>    
    
    
        
                
    <input type="checkbox" name="tags[]" class="form-check-input" value="<?php echo $tag['id'] ?>"> 
       
            <?php echo $tag['tag']; ?>  
                                         
        <?php } ?>    
        </div>
        
        
        
        <div class="form-group">
        <button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">Add Post</button>
            
        </div>
        
        
    </div>
</div>    
    
    </form>
</div>    
    
    
    
</div>    
    
    
    
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<style>
    .card{
        margin-top: 20px;
    }


</style>
