  <!-- Full Width Column -->

  <script>
    var thispage   = "profile";
  </script>
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          User Profile
        </h1>
        
      </section>

      <!-- Main content -->
      <section class="content">
      <div class="tab-pane active " id="updateprofile">
    <div class="box-header bg-blue-gradient custom-tab-pane-header">
        <h3 class="box-title" style="margin: 0 0 0px;"><i class="fa fa-user">&nbsp;</i>Personal Information</h3>
    </div>
        <div class="box-body" style="border: 1px solid #e6e0e0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="status-message"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Full Name </label>
                        <div class="input-group">
                            {{user_infos.name}}                                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Email Address </label>
                        <div class="input-group">
                        {{user_infos.email_add}}                                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">User Type</label>
                        <div class="input-group">
                            {{user_infos.type }}                                      </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input  v-model="curPass" name="Password" class="form-control" placeholder="Password" type="password">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-expeditedssl"  aria-hidden="true"></i></span>
                            <input v-model="newPass" name="Confirm_Password" class="form-control" placeholder="Confirm Password" type="password" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                 <div  v-if="updatePassData.err" class="alert" :class="{'alert-success':updatePassData.type == '200', 'alert-danger':  updatePassData.type == '400' }" role="alert"> {{updatePassData.msg}}  </div>
                </div>
                <div class="col-md-6">
                 <button class="btn btn-primary pull-right" @click="updatePass()" type="button">Apply Changes</button>
                </div>
            </div>
        </div>
       
</div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->