<!DOCTYPE HTML>
<?php
    include ('includes/include.php');
    
    if (!isset($_SESSION['semploye_id']))
    {
       // header('location:index.php?qError=usernamePassword');
       // exit();
    }
?>

<html>
	<head> 
		<title>Oust- Acceuil </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body> 
        <?php include 'menu.php'; ?>
        <div id="wrapper">
        </div>
	</body>
</html>