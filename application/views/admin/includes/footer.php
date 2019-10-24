
    <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
</div>

<script>
  var adminId = '<?php  echo $this->session->userdata('admin');?>';
  var fullname= '<?php  echo $this->session->userdata('full_name');?>';
  var burl = "<?=base_url();?>";

  var user_info = {
    id:'<?php echo $this->session->userdata("user_id");?>',
    name:'<?php echo $this->session->userdata("full_name");?>',
    email_add:'<?php echo $this->session->userdata("email_address");?>',
    type:'<?php echo $this->session->userdata("user_type");?>'
  }
 
</script>

<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ckeditor/ckeditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/components.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/app.js"></script>




<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>
</body>
</html>