<script>

function showHide(){
  var x = document.getElementById("table");
  var y= document.getElementById("showBtn");
  if (x.style.display == "none")
  {
	  x.style.display = "table"; 
	  y.value="Hide";
  }
  else  
  {
	  x.style.display = "none";
	  y.value="show";
  }	  
}

</script>
<style>
#table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 8px;
}

#table tr:nth-child(even){background-color: #f2f2f2;}

#table tr:hover {background-color: #ddd;}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
#showltd {
  background-color: #bb33ff;
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

#logout {
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
#showbtn {
  background-color: #ff3300;
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 7px 10px;
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
	
<?php

//connecting to server
include("connection.php");
session_start();
if(isset($_SESSION["id"]))
echo"<h1   style='background-color: #e62e00;color:white;  font-size: 45px; text-align:center;'>Welcome</h1> ";
else header("location:admin_login.php");
?>

        <!--Inserting -->
		<h3 style="color:#29a329; font-size: 25px;">Insert Here</h3>
		<form action="" method="post">
			Id: <input type="number"  name="id" required>
			Name:<input type="text" name="name"required>
			PNR: <input type="number" name="pnr" required>
			<input  id="submit" type="submit" name="insert" value="insert">
		
		</form>
		 <!--Deleting -->
		 <h3 style="color:#29a329; font-size: 25px;">Delete Here</h3>
		<form action="" method="post">
			Id: <input type="number" name="delid">
			
			PNR: <input type="number" name="delpnr">
		
			<input id="submit"type="submit" name="delete" value="delete">
		</form>
		<br>
		 <!--Updating -->
		 <h3 style="color:#29a329; font-size: 25px;">Update  Here</h3>
		<form action="" method="post">
			Id: <input type="number" name="updtid">
			
			PNR: <input type="number" name="updtpnr">
		
			<input id="submit"type="submit" name="update" value="update">
		</form>
		<br>
		 <!--Logout -->
		<form action="" method="post">
			<input id="logout"type="submit" name="logout"value="logout">
		</form>
			<br>
		<form action="" method="post">
			<input id="showltd"type="submit" name="showData" value="Show latest Data" >	
		</form>
		
		
			

		
<?php
	
		if (isset($_POST["showData"]))
		{
					// fetching data
					$qry="select * from passengers" ;
					$result=$con->query($qry);
			echo"
			<input type='button' name='show' id='showBtn' value='Hide' onclick='showHide();'>
			<table id='table'  border='1' width='100%'>
				<tr>
					<th>id</th><th>Passenger Name</th><th>pnr</th>
				</tr>";
				
					//displaying data
					if($result->num_rows>0)
						while($row=$result->fetch_assoc())
							echo"<tr>
									<td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["pnr"].
								"</tr>";
									
					 else echo "0 results";
				
			echo"	
			</table>";
		}		
				 
			
?>
		
		
<?php		
// inserting data

if (isset($_POST["insert"]))
{
	$name=$_POST["name"]; 
	$id=$_POST["id"];    
	$pnr=$_POST["pnr"];   
	
	
		$qry="insert into passengers (id,name,pnr) values ('$id','$name','$pnr')";
		if(($con->query($qry))==true) echo "<script> alert('record inserted successfully')</script>"; 
		
		
	else
	{	
	
		echo"<script> alert ('error inserting record');</script> ";
	}
}
//Deleting data
if(isset($_POST["delete"]))
{	
	//checking empty
	if(empty($_POST["delid"])&& empty($POST["delpnr"]))
		echo "<script> alert('Enter Id or Pnr value required to delete record(s)');</script>";
	
	else{
		$id=$_POST["delid"];    
	    $pnr=$_POST["delpnr"];   
	
	
		$qry="delete from passengers where id=$id";
		$con->query($qry);
		$res=$con->affected_rows;
		if($res>0) echo "<script> alert('$res.record(s) deleted successfully');</script>";
		else echo "<script> alert('error deleting record.$res.record(s) found');</script>";
		}
}

//Updating data
if(isset($_POST["update"]))
{	
	//checking empty
	if(empty($_POST["updtid"])&& empty($_POST["updtpnr"]))
		echo "<script> alert('Enter Id or Pnr value required to update record(s) ');</script>";
	
	else{
			if(!empty($_POST["updtid"]))
			{
				$id=$_POST["updtid"];  
				$qry="select * from passengers where id=$id";
			}
			
			else 
			{
				$pnr=$_POST["updtpnr"];  
				$qry="select * from passengers where pnr=$pnr";
			}
			 
				$result=$con->query($qry);
		
			echo"
				
				<table id='table'>
				<tr>
					<th>id</th><th>Passenger Name</th><th>pnr</th>
				</tr>";
				
					//displaying data for updation
					if($result->num_rows>0){
						
						while($row=$result->fetch_assoc())
							echo"<tr>
								<form action='' method='post'>
									<td><input type='number' name='newid' value='".$row["id"]."'></td>
									<td><input type='name' name='newname' value='".$row["name"]."'></td>
									<td><input type='number' name='newpnr' value='".$row["pnr"]."'></td>
									<td><input id='submit'type='submit' name='save' value='save'></td>	
								</form>	
					
								</tr>";}
									
					 else echo "0 results";
				
			echo"	
			</table>";
		
		}
		
		
}
//saving new data
if(isset($_POST["save"]))
			{
				$name=$_POST["newname"]; 
				$id=$_POST["newid"];    
				$pnr=$_POST["newpnr"];   
	
	
				$qry="update  passengers set id=$id, name='$name', pnr=$pnr where id=$id";
				if(($con->query($qry))==true) echo "<script> alert('record updated successfully')</script>"; 
				else
					{	
					  echo"<script> alert ('error updating record');</script> ".$con->error;
					}
			}
//Logging out
if(isset($_POST["logout"]))
{
	session_unset();
	session_destroy();
	header("location:admin_login.php");
}

?>