<?php
if(isset($_POST['submit']))
{
	if(getimagesize($_FILES['fileToUpload']['tmp_name'])==true)
	{
		$name=addslashes($_FILES["fileToUpload"]["name"]);
		$img=file_get_contents(addslashes($_FILES["fileToUpload"]["tmp_name"]));
		$img=base64_encode($img);
		save($name,$img);
	}
	else
	{
		echo "Select image:";
	}
}
	function save($name,$img)
	{

        $conn=mysqli_connect("localhost","root","",kalpit123);
		$sql=mysqli_query($conn,"INSERT INTO c(Name,image) VALUES('$name','$img')");
		
	}
	display();
	function display()
	{
	$conn=mysqli_connect("localhost","root","",kalpit123);
	$result=mysqli_query($conn,"select * from c");
	while($row=mysqli_fetch_array($result))
	{
		echo '<img height="300" width="300" src="data:image;base64,'.$row[1].'">';
	}
	mysqli_close($conn);
	}
?>