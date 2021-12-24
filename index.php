<?php

//connecting to server
include("connection.php");

?>
<html>
	<head>
		<title>myRAILinfoInfo</title>
		<link rel="stylesheet" type="text/css" href="style.css">
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
}
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
</style>
	</head>
	
	<body>
		<h1 style="color:white; background-color: #008CBA; text-align:center;font-size: 45px;">myRAILinfo</h1>
		<form action="" method="post">
			<h3 style="color:#29a329; font-size: 25px;">Enter PNR no.</h3>
			<input type="number" name="pnr" required> <button  id="submit" type="submit">submit</button>
		</form>
		<?php
		
			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				
					$pnrval=$_POST["pnr"];
					// fetching data
					$qry="select * from passengers where pnr=$pnrval";
					$result=$con->query($qry);
					
			echo"
			<br>
			<table id='table' border='table' width='100%'>
				<tr>
					<th >id</th><th>Passenger Name</th><th>pnr</th>
				</tr>";
				
					//displaying data
					if($result->num_rows>0){
						
						while($row=$result->fetch_assoc())
							echo"<tr>
									<td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["pnr"].
					"</td></tr>";}
									
					 else echo "0 results";
				
			echo"	
			</table>";
				
				 
			}
			?><br><br><br>
		<a id="adm" href="admin_login.php" target="_blank"> admin</a>
	</body>
</html>