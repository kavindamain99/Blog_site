<?php 
include ('header.php');
include ('post.php');
include ('tag.php');

?>
<?php 
$post = new post($db);
$tags = new Tag($db);


?>


<div class="container">
    <div class="row">
        <div class="col-md-8">
<?php foreach($post->getpost() as $post)
    
            
{?>           
           
            <div class="media">
                <div class="media-left media-top">
                    <img src="images/<?php echo $post['image']; ?>" class="media-object" style="width:150px;">
                  <p>
                      Aurthor:admin<br>
                      created:<?php echo date ('Y-m-d',strtotime( $post['created_at'])); ?>
                      
                  </p>                                         
                                                            
                </div>
                <div class="media-body">
                   <h4 class="media-heading"><a  href="view.php?slug=<?php echo $post['slug']; ?>"><?php echo $post['title']; ?></a></h4>
                   
               <?php  echo $post['description'] ; ?>
                    
                    
                </div>
                
            </div>
            
      <?php }?>        
        </div>
        
<div class="col-md-4">
    
    <h4>Browse by Tags</h4>
    <p>
    <?php 
    foreach($tags->getalltags() as $tag){?>
   <a href="index.php?tag=<?php echo $tag['tag'];?>"><button type="button" class="btn btn-sm btn-outline-info">
    <?php echo $tag['tag']; ?>   
        
     </button></a>
        
    
    
       </p>
   <?php } ?>
    
 
</div>      
      
      
      
        
    </div>
    
    
</div>
<style>
    img{
        margin-right: 10px;
        
    }
    body{
        text-align: left;
    }
    .media{
        margin-top: 10px;
    }

</style>



