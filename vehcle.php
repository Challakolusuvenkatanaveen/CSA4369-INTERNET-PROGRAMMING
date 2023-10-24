<html>
<head><title>vehicle</title></head>
<body background="punchar.jpg"><hr><hr>
<h1 style="color:blue" align="center"><marquee bgcolor="pink" direction="right">punchar shop</marquee></h1><br><hr><hr>
<div align="center" style="background-color:pink; margin-left:500px; margin-right:500px">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

username:<input type="text" name="name"><br>
password:<input type="password" name="password"><br>
location :<input type="text" name="location"><br>
ph number:<input type="text" name="phone number"><br>
<input type="submit" name="submit" style="margin-left:30px;" action="">
<input type="reset" name="cancel">

</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$name= test_input($_POST["name"]);
$password= test_input($_POST["password"]);
$location= test_input($_POST["location"]);
$conn = new mysqli("localhost", "root", "", "iplab");
if ($conn-> connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO reg (name, password, location)
VALUES ('$name', '$password','$location')";
if ($conn->query($sql) === TRUE) {
echo "New Record Inserted Successfully";
echo "<html>";
echo "<body>";
echo "<p> click on home to redirect to home</p>";
echo "<a href='next.php'>home</a>";
echo "</body>";
echo "</html>";

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}

?>
</body>
</html>