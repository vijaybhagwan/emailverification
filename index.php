<?php if (!session_start()) {
  session_start();
}
?>
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
<body class="c-app flex-row align-items-center">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card-group">
<div class="card p-4">
<div class="card-body">
   <form name="loginForm" id="loginForm" method="POST" action="submit.php">
<h1>Task Email Verification</h1>
<p class="text-muted">Verify Your Email Id</p>
<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">

                      <i  class="fa fa-user" aria-hidden="true"></i>
                    </span>
</div>
<input class="form-control" type="text" id='emailid' placeholder="EmailId" name='emailid'>
</div>
<!-- <div class="input-group mb-4">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
</svg></span></div>
<input class="form-control" type="password" placeholder="Password">
</div> -->
<div class="row">
<div class="col-6">
<button class="btn btn-primary px-4" type="button" onclick="Verify(this)">Verify</button>
</div>
<div class="col-6 text-right">
<!-- <button class="btn btn-link px-0" type="button">Forgot password?</button> -->
</div>
</div>
<div class="row">
<div class="col-md-6">
                    <span id="loader" style="display:none"><i class="fa fa-spinner fa-spin" style="font-size:30px"></i></span>
                    <i class="fa fa-exclamation-triangle exclamation" id="show_error_icon" aria-hidden="true" style="display:none;color:#ff4c4c;"></i>&nbsp;<span class="error" id="error"></span>

                    <?php
                    //var_dump($_SESSION);
                      if(isset($_SESSION['error_msg']) && $_SESSION['error_msg'] != '') { ?>
                        <i class="fa fa-exclamation-triangle exclamation" id="show_error_icon" aria-hidden="true" style="color:#ff4c4c;"></i>&nbsp;<span class="error" id="error"><?php echo $_SESSION['error_msg']; ?></span>
                      <?php } ?>
                  </div>
                </div>
</form>
</div>

</div>
<div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
<div class="card-body text-center">
<div>
<h2>Verify Email</h2>
<p>Please Verify the email here!!</p>
<!-- <button class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</button>
 --></div>
</div>
</div>
</div>
</div>
</div>
</div>

    <script src="src/js/jquery.min.js"></script>
<script type="text/javascript">
  function Verify(ele) {
    $('#error').html('');
    if($('#emailid').val().trim()==''){
      //alert();
      $('#error').html('Enter Email Id!!');
      $("#show_error_icon").css("display","inline-block");
      $(".exclamation").css("display","inline-block");
      return false;
    }
    
    $(ele).attr('disabled',true);
    $('#loginForm').submit();

  }

</script>

</body>
</html>