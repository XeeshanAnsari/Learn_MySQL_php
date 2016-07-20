<?php
 
   mysql_connect("localhost","root","");
   mysql_select_db("coching");

   $delete_id = @$_GET['del'];
   $query_d = "DELETE FROM student where id = '$delete_id'";
   
   
   if(mysql_query($query_d)){
       echo "<script>window.open('delete.php?deleted=Data has been Deleted','_self')</script>" ;
   } 
 

?>