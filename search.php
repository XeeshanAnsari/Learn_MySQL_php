<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Data </title>
</head>
<body>
    <form action="insert.php"  method="post">
       <table border="5" >
         <tr bgcolor="yellow"><th colspan="2"><h1>Student Registration</h1></th></tr>
         <tr>
         <td>Student Name :</td>
         <td><input type="text" name="s_name"></td>
         </tr>
         <tr>
         <td>School Name :</td>
         <td><input type="text" name="school"></td>
         </tr>
         <tr>
         <td>Roll No :</td>
         <td><input type="text" name="roll"></td>
         </tr>
         <tr>
         <td>Result :</td>
         <td><input type="text" name="result"></td>
         </tr>
         <tr>
         <td colspan="2"><input type="submit" name="submit" value="submit"></td>
         </tr>
       </table>
    </form>
   </br>
   </br>
    <form action="search.php"  method="get"> 
         <input type="text" name="search" placeholder="search id and name" size="30">
         <input type="submit" name="sub" value="search Now">
    </from>


<?php
 
         mysql_connect("localhost","root","");
         mysql_select_db("coching"); 
        if (isset($_GET['sub'])){
          $search  = $_GET['search'];
          $query_search =" SELECT * from student where id= '$search' or student_name= '$search' ";
        
          $run = mysql_query($query_search);

        
          while($row=mysql_fetch_array($run)){
              $student_name = $row['student_name'];
              $school_name = $row['school_name'];
              $roll_no = $row['roll_no'];
              $result = $row['result'];
          }
      
 ?>   
            </br></br>
            <table width="400" bgcolor="orange" >
               <tr>
               <td><?php  echo $student_name ; ?></td>
               <td><?php  echo $school_name ; ?></td>
               <td><?php  echo $roll_no ; ?></td>
               <td><?php  echo $result ;  ?></td>
               </tr>
               
            </table>
   <?php } ?>         

             
        

   
    <table border="5">
        <tr bgcolor="yellow">
          <th>id</th>
          <th>Student Name</th>
          <th>School name</th>
          <th>Roll No</th>
          <th>Result</th>
          <th>Delete</th>
          <th>Edit</th>
        </tr>
        <h1><?php echo @$_GET['updated']; ?></h1>
        
<?php

    mysql_connect("localhost","root","");
    mysql_select_db("coching");
    $query1 = "SELECT * FROM student ";
    $run = mysql_query($query1);
     echo "<br></br></br>";
   while($row = mysql_fetch_array($run)){
       $id = $row['id'];
       $s_name = $row['student_name'];
       $school_name = $row['school_name'];
       $roll_no = $row['roll_no'];
       $s_result = $row['result'];
       
?>        
        <tr>
        <td><?php echo $id;   ?></td>
        <td><?php echo $s_name;   ?></td>
        <td><?php echo $school_name;   ?></td>
        <td><?php echo $roll_no;   ?></td>
        <td><?php echo $s_result;   ?></td>
        <td><a href="deleteData.php?del=<?php echo $id ?>">Delete</a></td>
        <td><a href="updateData.php?edit=<?php echo $id ?>">Edit</td>
        </tr>
   <?php  }  ?>    
    </table>  
</body>
</html>


<?php

    mysql_connect("localhost","root","");
    mysql_select_db("coching");
   if(isset($_POST['submit'])){
      $name = $_POST['s_name'];
      $school = $_POST['school'];
      $roll = $_POST['roll'];
      $result = $_POST['result'];


     $query = "insert into student (student_name,school_name,roll_no,result) value('$name','$school','$roll','$result')";  
     
     if(mysql_query($query)){
         echo "<h1>Data Inserted</h1>";
     }   

   }
   
?>


