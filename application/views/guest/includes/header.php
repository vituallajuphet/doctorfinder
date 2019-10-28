<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= base_url();?>">Doctor Finder</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
       <?php if($isLogged){ ?>
        <li class="<?=setCurrent("dashboard", $page_name);?>"><a href="<?= base_url();?>dashboard">Dashboard</a></li>
      <li class="<?=setCurrent("contact-us", $page_name);?>"><a href="<?= base_url();?>dashboard/contact-us">Contact Us</a></li>
      <li><a href="<?= base_url();?>user/logout">Logout</a></li>
       <?php } 
        else {
       ?>
       <li class="<?=setCurrent("home", $page_name);?>"><a href="<?= base_url();?>">Home</a></li>
      <li class="<?=setCurrent("about-us", $page_name);?>"><a href="<?= base_url();?>about-us">About Us</a></li>
      <li class="<?=setCurrent("QA", $page_name);?>"><a href="<?= base_url();?>question-and-answer">Q&A</a></li>
      <li class="<?=setCurrent("contact-us", $page_name);?>"><a href="<?= base_url();?>contact-us">Contact Us</a></li>
      <li><a href="<?= base_url();?>user/login">Login</a></li>
        <?php }?>
        

    </ul>
  </div>
</nav>
</header>

<?php 
    // class page setter;
    function setCurrent($page, $pname)
    {
        return $pname == $page ? "active" : ""; 
    }
?>