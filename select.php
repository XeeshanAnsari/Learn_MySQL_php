<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserting Data </title>
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
        <td><?php echo "Delete";   ?></td>
        <td><?php echo "Edit";   ?></td>
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


