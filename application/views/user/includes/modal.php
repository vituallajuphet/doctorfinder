<div class="modal fade" id="mod_agent_reason">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  bg-light-blue color-palette">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Account Name: <span ><a style="color:#fff;font-weight:bold" target="_blank"  :href="modal_desc.acc_link">{{ modal_desc.acc_name }}</a></span> </h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header ">
                        <h5 class="box-title">  Agent Reason Details</h5>
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