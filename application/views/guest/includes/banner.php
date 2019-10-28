<div id="banner_area">
    <div class="bnr_cont ">
    <?php if($page_name == "home"){?>
        <div class="jumbotron text-center">
             <h1>Doctor Finder</h1> 
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A maiores porro soluta velit neque dicta tenetur. Aperiam, distinctio tempora mollitia consectetur nesciunt, nam provident saepe perferendis ex minima delectus sed?</p> 
            <a href="" class="btn btn-success">Learn More</a>
        </div>
    <?php }
     else{ ?>
        <div class="nhome_bnr">
            <div class="bnr_info">

            </div>
            <div class="bnr_title">
                <div class="container-fluid">
                  <h2><?= $page_title;?></h2>
                </div>
            </div>
        </div>
     <?php }?>
     </div>
</div>