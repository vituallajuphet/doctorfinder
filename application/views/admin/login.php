
<script>

var thispage  = 'login'
</script>

<div id="login">
    <div class="login_content">
        <form id="adminLoginForm" action="#">
            <figure class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Proweaver Logo"></figure>
            <h4>Administrator Login</h4>
            <div class="notif"></div>
            <div class="input-group">
                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                <input type="text" class="form-control" name="username" placeholder="Enter username" required>
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