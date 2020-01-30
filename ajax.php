<?php
$conn = mysqli_connect('localhost','root','root','test');
$state = ($_GET['county']) ? $_GET['county'] : '';
$city = ($_GET['state']) ? $_GET['state'] : '';

if($state != ''){
	$sql = "select * from states where country_id = ". $state;
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
			echo "<select id='state' onchange='change_state()'>";
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			echo "</select>";
	}
}

if($city != ''){
	$sql = "select * from cities where state_id = ". $city;
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
			echo "<select>";
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			echo "</select>";
	}
}