<?php
$conn = mysqli_connect('localhost','root','root','test');
$sql = "select * from countries";
?>
<!DOCTYPE HTML>
<html>
<head><title>Testing</title></head>
<body>
	<form>
		<?php 
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) != 0){
				echo "<select id='countries' onchange='change_country()'>";
				echo "<option>Choose an country</option>";
				while($row = mysqli_fetch_assoc($result)){
					echo "<option value='".$row['id']."'>".$row['name']."</option>";
				}
				echo "</select>";
			}
		?>
		<span id="states">
			<select>
				<option>Select an state</option>
			</select>
		</span>
		<span id="cities">
			<select>
				<option>Select an city</option>
			</select>
		</span>
	</form>

<script>
	function change_country(){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open('GET','ajax.php?county='+document.getElementById('countries').value,false);
		xmlhttp.send(null);
		document.getElementById('states').innerHTML = xmlhttp.responseText;
	}
	function change_state(){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open('GET','ajax.php?state='+document.getElementById('state').value,false);
		xmlhttp.send(null);
		document.getElementById('cities').innerHTML = xmlhttp.responseText;
	}
</script>
</body>
</html>
<?php
	mysqli_close($conn);
?>