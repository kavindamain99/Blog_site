<?php include('header.php'); ?>
<?php include('post.php');
$post=new post($db);

?>
<div class="container">
    <h2>All posts</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Action</th>

                   
                    </tr>
            
        </thead>
        <tbody>
         <?php foreach($post->getpost() as $post) {?>
          <tr>
           
           
            <td>TItle <?php echo $post['title']; ?> </td>
            <td>desc <?php echo substr($post['description'],0,30); ?></td>
            <td>date <?php echo date('Y-m-d',strtotime($post['created_at'])); ?></td>
            <td></td>
            <td><a href="view.php?slug=<?php echo $post['slug']; ?>"><button type="submit" class="btn btn-outline-success btn-sm">VIEW </button></a>
            
            <a href="edit.php?slug=<?php echo $post['slug']; ?>"><button type="submit" class="btn btn-outline-primary btn-sm">EDIT </button></a>
            
            <a href="delete.php?slug=<?php echo $post['slug']; ?>"><button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button></a>
            
            
            
            </td>
            
            <?php } ?> 
            </tr>
        </tbody>
        
        
    </table>
    
</div>
