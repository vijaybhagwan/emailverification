<!DOCTYPE html>

<html lang="en">
<head>
<base href="./">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
<title>Verify Email Id</title>
<link rel="apple-touch-icon" sizes="57x57" href="src/assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="src/assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="src/assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="src/assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="src/assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="src/assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="src/assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="src/assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="src/assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="src/assets/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="src/assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="src/assets/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="src/assets/favicon/favicon-16x16.png">
<link rel="manifest" href="src/assets/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="src/assets/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link href="src/css/style.css" rel="stylesheet">

<meta name="robots" content="noindex">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>

</head>
<?php
if (!session_start()) {
	session_start();
}

 if(!isset($_SESSION['code'])){

//var_dump($_SESSION);
    header('Location:http://'.$_SERVER['HTTP_HOST'].'/task/index.php');
exit;
}
//var_dump($_SESSION);
if($_SESSION['code']!=200){

	echo $_SESSION['error_msg'];
	session_destroy();
}else{
	unset($_SESSION['error_msg']);
	//var_dump($_SESSION['emaildata']);
?>


<main class="c-main">
<div class="container-fluid">
<div class="fade-in">
<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="card-header"><i class="fa fa-align-justify"></i> <?php echo "Hello Your Email Id has been successfuly verifed! Please find the below data!!";?></div>
<div class="card-body">
<table class="table table-responsive-sm">
<thead>
<tr>
<th>Key</th>
<th>Value</th>
</tr>
</thead>
<tbody>
	<?php $data=$_SESSION['emaildata'];
	foreach ($data as $key => $value) {
	?>

<tr>
<td><?php echo $key;?></td>
<td><?php echo $value;?></td>

</tr>

<?php }?>
</tbody>
 </table>

</div>
</div>
</div>



</div>



</div>
</div>
</main>

<?php
}
?>


</body>
</html>