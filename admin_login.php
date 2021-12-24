<?php
//connecting to server
include("connection.php");
session_start();
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
  padding: 15px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 10px 2px;
  cursor: pointer;
</style>
	
<h2 style="background-color:#29a329;color: white ;font-size: 45px;">Admin Login </h2>   
<form acion="" method="post">
			 Id: <input type="number" name="id" required>
			Password: <input type="password" name="pass" maxlength="30" required>
			<button id="submit"type="submit"> submit </button>
		</form>
		<a style="color:#29a329; font-size: 20px;" href="register.php"> New admin ? Register here</a>
<?php		
// authenticating user

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	 $id=$_POST["id"]; 
	 $pass=$_POST["pass"];     
	 $qry="select * from admin where id=$id and pass='$pass'";
	 $res=$con->query($qry);
	 if(($res->num_rows>0))
	 {
		 header("location:admin.php");
		 $_SESSION["id"]=$id; 
		 $_SESSION["pass"]=$pass; 
	 }
		 else echo"<br><br><h4 style=' color:red;font-size: 20px;'>Enter valid credentials</h4>";
}
