<script>

 var thispage  ='login'
</script>

<style>
.skin-blue .wrapper{ background: none !important; }
</style>

<div id="login">
    <div class="login_content">
        <form id="LoginForm">
        <figure class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Proweaver Logo"></figure>
            <div class="notif"></div>
            <div class="input-group">
                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                <input type="email" class="form-control" name="email_address" placeholder="Enter email" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>