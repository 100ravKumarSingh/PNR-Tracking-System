<?php
//connecting to server
include("connection.php");
?>
<style>
#adm {
  background-color: #ff3300;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 19px;
  margin: 4px 2px;
  cursor: pointer;
  
}
#submit {
  background-color: #0066ff;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
</style>
	
<h2 style="background-color:#ff8000; color: white ;font-size: 45px;">New Admin Registration</h2>
<form acion="" method="post">
			User Id: <input type="number" name="id" maxlength="30" required>
			Name: <input type="name" name="name" maxlength="30" required>
			Password: <input type="password" name="pass" maxlength="30" required>
			<!--Confirm Password: <input type="number" name="cmfpass"required> -->
			<button  id="submit"type="submit"> submit </button>
		</form>
		<span  style="color:#29a329; font-size: 25px;" href="register.php">Already registered?</span>
		<a  href="admin_login.php">
			<button href="admin_login.php" style="background-color:#33cc33; color: white;font-size: 20px;" type="submit">  Login </button>
		</a>
<?php		
// adding user 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	 $id=$_POST["id"]; 
	 $pass=$_POST["pass"];   
	 $name=$_POST["name"];
	 // checking if alredy exists !
		$qry="select * from admin where id=$id";
		$res=$con->query($qry);
		if($res->num_rows>0) echo "<br><br><h4 style=' color:red;font-size: 23px;'>Admin already exists !</h4>";		
		else 
		{
			$qry="insert into admin (id,name,pass) values ('$id','$name','$pass')";
			if($con->query($qry)==true) echo "admin added successfully"; else echo" error inserting record".$con->error;
		}
}
?>