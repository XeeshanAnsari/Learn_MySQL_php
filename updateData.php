<?php

     mysql_connect("localhost","root","");
     mysql_select_db("coching");


     $edit_record = @$_GET['edit'];

     $query_edit = "SELECT * FROM student where id='$edit_record'";

     $run = mysql_query($query_edit);

     while($row = mysql_fetch_array($run)){
         $edit_id = $row['id'];
         $s_name = $row['student_name'];
         $school = $row['school_name'];
         $roll_no = $row['roll_no'];
         $result = $row['result'];

     } 


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data </title>
</head>
<body>
    <form action='updateData.php?edit_form=<?php echo $edit_id ; ?>'  method="post" >
       <table border="5" >
         <tr bgcolor="yellow"><th colspan="2"><h1>Update Registration</h1></th></tr>
         <tr>
         <td>Student Name :</td>
         <td><input type="text" name="s_name" value="<?php echo $s_name ?>"></td>
         </tr>
         <tr>
         <td>School Name :</td>
         <td><input type="text" name="school" value="<?php echo $school ?>"></td>
         </tr>
         <tr>
         <td>Roll No :</td>
         <td><input type="text" name="roll"  value="<?php echo $roll_no ?>"></td>
         </tr>
         <tr>
         <td>Result :</td>
         <td><input type="text" name="result"  value="<?php echo $result ?>"></td>
         </tr>
         <tr>
         <td colspan="2"><input type="submit" name="update" value="Update Now"></td>
         </tr>
       </table>
    </form>
   
</body>
</html>
 <?php
     mysql_connect("localhost","root","");
     mysql_select_db("coching");
     


     if(isset($_POST['update'])){
     $edit_id1 = @$_GET['edit_form'];

         $s_name = $_POST['s_name'];
         $school = $_POST['school'];
         $roll_no = $_POST['roll'];
         $result = $_POST['result'];

     

     $query_edit1 = "UPDATE student SET  student_name='$s_name',school_name='$school',
     roll_no='$roll_no',result='$result'where  id='$edit_id1'";

        if(mysql_query($query_edit1)){
                  echo "<script>window.open('update.php?updated=Data has been Deleted','_self')</script>" ;   
         }   
      }
?>

