<?php 
include ('header.php');
include ('db.php');
?>



<div class="container">
    <div class="row">
        <div class="col-md-8">

  
               
           
            <div class="media">
                <div class="media-left media-top">
                    <img src="images/back2.jpg" class="media-object" style="width:150px;">
                  <p>
                      Aurthor:admin<br>
                      created:2019.01.01;
                      
                  </p>                                         
                                                            
                </div>
                <div class="media-body">
                   <h4 class="media-heading"><a  href="#"></a></h4>
                   <?php 

$sql = "SELECT title,description  FROM posts";
$result = $db->query($sql);
if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" ."<a>". $row["title"]. "</a> " . $row["description"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>


?>
               
                    
                </div>
                
            </div>
            
       
        </div>
        
      
        
    </div>
    
    
</div>
<style>
    img{
        margin-right: 10px;
        
    }
    body{
        text-align: justify;
    }
    .media{
        margin-top: 10px;
    }

</style>



