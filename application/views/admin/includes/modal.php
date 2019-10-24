<div class="modal fade" id="modal_create_email">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{modalName}}</h4>
            </div>
            <div class="modal-body">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Fill up the form</h3>
                        <div v-show="ifShow" :class="{'alert-danger':hasError, 'alert-success':!hasError}" class="alert  alert-dismissible"   >
                            {{resMessage}}
                        </div>
                        
                      
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" acton="" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="accountName">Account Name <span class="req">*</span></label>
                                        <input type="text" v-model="formInputs.account_name" class="form-control" required id="accountName"
                                            placeholder="Enter account name">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="accountName">Account Link <span class="req">*</span></label>
                                        <input  v-model="formInputs.account_link" type="text" class="form-control" required id="account_link"
                                            placeholder="Enter link">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                
                                <div class="col-xs-6">
                                    <div class="form-group">
                                         <label for="Cc_email">To email <span class="req">*</span></label>
                                      <input type="text" v-model="formInputs.to_email" class="form-control" required id="Cc_email"
                                        placeholder="Enter to email">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="toEmail">To Cc </label>
                                        <input type="text" v-model="formInputs.cc_email" class="form-control" required id="toEmail"
                                        placeholder="Enter cc email">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="agent_que">Agent to queue <span class="req"> *</span></label>
                                <input type="text" class="form-control" v-model="formInputs.agent_to_queue" required id="agent_que"
                                    placeholder="Enter Agent">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-body pad">
                        <label for="agent_que">Enter Reason Description <span class="req">*</span></label>
                            <textarea v-model="formInputs.description" id="editor" name="editor" rows="10" cols="80">

                           </textarea>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button v-if="isSave" @click="validateForm()" type="button" class="btn btn-primary">Save changes</button>
                <button  @click="validateForm()" type="button" class="btn btn-primary" v-else>Update changes</button>

            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal view -->

<div class="modal fade" id="modal_reason">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  bg-light-blue color-palette">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Account Name: <span style="color:#fff;font-weight:bold">{{ modal_desc.acc_name }}</span> </h4>
            </div>
            <div class="modal-body">
            <h5 class="box-title">  <strong>Agent Reason Details:</strong></h5>
                <div class="box ">
                    <div class="box-header ">
                        
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">             
                            <div v-html="modal_desc.acc_desc"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade " id="modal_delete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default " data-dismiss="modal">No</button>
                <button @click="deleteData()" type="button" class="btn btn-danger">Yes</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- delete user modal-->

<div class="modal fade " id="mod_user_delete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure to delete this User?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default " data-dismiss="modal">No</button>
                <button @click="deleteUser()" type="button" class="btn btn-danger">Yes</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end delete user modalk -->


<!-- create usermodal -->

<div class="modal fade" id="modal_create_user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{modalName}}</h4>
            </div>
            <div class="modal-body">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Fill up the form</h3>
                        <div v-show="ifShow" :class="{'alert-danger':hasError, 'alert-success':!hasError}" class="alert  alert-dismissible"   >
                            {{resMessage}}
                        </div>
                        
                      
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" acton="" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name <span class="req">*</span></label>
                                        <input v-model="formInputs.full_name" type="text"  class="form-control" required id="full_name"
                                            placeholder="Enter account name">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                   <div class="form-group">*
                                    <label for="user_type">User Type <span class="req">*</span></label>
                                    <select id="user_type" class="form-control" v-model="selected_option">
                                         <option disabled value="">Please select one</option>
                                        <option>admin</option>
                                        <option>member</option>
                                    </select>
                                    </div>

                            </div>
                        
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="email_addr">Email Address <span class="req"> *</span> </label>
                                        <input type="text" v-model="formInputs.email_address"  class="form-control" required id="email_addr"
                                        placeholder="Enter to email">
                                    </div>
                                </div>

                        
                                <div class="col-xs-12">
                            <div class="form-group">
                                <label for="agent_que">Default Password </label>
                                <input type="text" class="form-control" readonly=""  required 
                                    placeholder="Enter Password" v-model="defaultpassword" >
                                <em style="margin: 10px 0px 0px; display: block; font-size: 12px;">The default password is {{defaultpassword}}. To update the default password, go to settings tab.</em>
                            </div>
                        </div>
                        </div>
                        <!-- /.box-body -->
                      

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button v-if="isSave" @click="saveUserData()" type="button" class="btn btn-primary">Save changes</button>
                <button  @click="updateUserData()" type="button" class="btn btn-primary" v-else>Update changes</button>

            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<!-- end create modal -->


<!-- end app -->
