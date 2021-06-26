


<?php include('header.php'); ?>
<?php include('post.php'); 
$posts=new post($db);


?>

<?php 
if(isset($_POST['btnupdate'])){
    
$posts->updatepost($_POST['title'],$_POST['description'],$_GET['slug']);
    
if($result==true){
echo "<div class='text-center alert alert-success'>Post Update successfully!</div>";    
    
}    
}

?>


<div class="container-fluid">
<div class="row justify-content-center">
<?php foreach($posts->getsinglepost($_GET['slug']) as $post ){ ?>


<div class="col-md-8">
<form method="post" action="add.php" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
    Edit Post        
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="title" >Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
            
        </div>
         <div class="form-group">
            <label for="description"  >Description</label>
        <textarea cols="10" name="description" class="form-control" id="editor">
        <?php echo $post['description']  ?>    
            
        </textarea>  
            
        </div>
         <div class="form-group">
            <label for="image"  >Image</label>
    <input type="file" name="image" class="form-control">
    <img style="width:180px;" src="images/<?php echo $post['image']  ?>">       
            
        </div>
        
       
        
        
        
        <div class="form-group">
        <button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">update Post</button>
            
        </div>
        
        
    </div>
</div>    
    
    </form>
</div>    
    
    <?php } ?>
    
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
