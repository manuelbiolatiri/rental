<?php 
if (isset($_POST['submit'])){
	$rand = rand();

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form>
	<div name="codes"><?php echo $rand; ?></div>
	<button name="submit">generate</button>
</form>
</body>
</html>