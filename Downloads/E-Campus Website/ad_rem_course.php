<?php
include 'inludes/init.php';
include 'inludes/Header_admin.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 
$name1 = (mysql_query("SELECT CourseNo FROM course"));
?>

<form  name="form2" action="" method="post" class="form1" onsubmit="return validateprofile()" style="margin: 150px 350px 150px 300px">
 <fieldset class="fieldset">
 <legend id="legend">Choose Course you want to remove</legend>
          
 <label  id="label">Course Code</label>
   <select name="name">
 <?php 
 while($name2 = mysql_fetch_array($name1))
 {

echo "<option value='".$name2['CourseNo']."'>".$name2['CourseNo']."</option>";
	 
 }?>
 </select>                                  

 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" value="Delete" class="button" > 
 </fieldset>   
</form>
<?php 
$sname=$_POST['name'];

$sql=("DELETE FROM course WHERE CourseNo='$sname'");
mysql_query($sql);
?>
<?php include 'inludes/Footer.php'; ?>