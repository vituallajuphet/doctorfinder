<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Login Account</title>
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
</head>
<body>

 <div class="container">

    <h2 style="text-align:center;">Doctor Finder</h2>

    <div class="panel panel-default" style="max-width:400px;margin:30px auto;">
  <div class="panel-heading">Login Account</div>
  <div class="panel-body">
  <form role="form" method="post" action="<?=base_url("user/validate_account");?>">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" class="form-control" id="pwd">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <?php
    
            echo $err;
    ?>

  </div>
</div>

    
 </div>

</body>
</html>