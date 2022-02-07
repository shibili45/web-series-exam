<html>
<head>
<style>
.container 
{
  float: left;
  background-color:green;
  width: 300px;
  padding: 100px;
  margin: 50px;
}
</style>
</head>
<body>
<div class="container">
<form name="f1" method="POST">
    <h3 align="center"><u>EMPLOYEE</u></h3>
  <table align="center">
<tr>
  <td>Emp ID:</td>
  <td><input type="number" name="empid" value=""/></td>
</tr>
<tr>
<td>Emp Name:</td>
<td><input type="text" name="empname" value=""></td>
</tr>
<tr>
<td>Job name:</td>
<td><input type="text" name="jobname" value=""></td>
</tr>
<tr>
<td>Manager ID:</td>
<td><input type="number" name="manid" value=""></td>
</tr>
<tr>
<td>Salary:</td>
<td><input type="number" name="salary" value=""></td>
</tr>
<tr>
<td><input type="submit" name="submit"></td>
</tr>
</table>
</form>
</div>
<?php

if(isset($_POST['submit']))
{
    $empid=$_POST['empid'];
    $empname=$_POST['empname'];
    $jobname=$_POST['jobname'];
    $manid=$_POST['manid'];
    $salary=$_POST['salary'];
    $conn=mysqli_connect("localhost","root","","EMPLOYEE");
    if($conn)
    {
        echo("Successfully connected");
        echo "<br>";
    }
    else
    {
        echo("connection error");
    }
    $qry="INSERT INTO emp_table(EMPID,EMPName,Jobname,Managerid,Salary)VALUES('{$empid}','{$empname}','{$jobname}','{$manid}','{$salary}')";
  
if(mysqli_query($conn,$qry))
{
    echo("successfully inserted");
    echo "<br>";
}
else
{
    echo("insertion failed");
}
  ?>
    <h1>Employees with salary greater than 35000</h1>
<table border="1">
<tr>
<th>Emp Name</th>
<th>Salary</th>
</tr>
<?php
$sel="SELECT EMPName,Salary FROM emp_table WHERE Salary>35000";
$data=mysqli_query($conn,$sel);
while($res=mysqli_fetch_assoc($data))
{
    ?>
   <tr>
    <td><?php echo $res['EMPName'];?></td>
    <td><?php echo $res['Salary'];?></td>
</tr>
<?php

}
}
?>
</table>
</body>
</html>
