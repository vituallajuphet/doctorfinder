<script>
   var  thispage = 'email'
  
  </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{title}}</h3>
          <div class="box-tools pull-right">
          <div class="form-group">
          

          <button @click="createShow()" type="button"  id="btn_mod" class="btn btn-flat btn-warning"><i class=" fa fa-plus "></i> Create New
            </button>
               
                <div class="input-group srchbar">
          <input v-model="searchBarText" type="text" name="q" class="form-control" placeholder="Search account name...">
          <span class="input-group-addon"><i class="fa fa-search"></i></span>
        </div>
                <!-- /.input group -->
                
              </div>
            

          </div>
        </div>

        <div class="box-body">


          <table class="table table-bordered email-tbl">
            <tbody>
              <tr>
                <th>Account Name</th>
                <th>To email</th>
                <th>Cc email</th>
                <th>Agent to queue</th>
                <th>Reason</th>
                <th>Action</th>
              </tr>
              <tr v-for="data in displayedData ">
                <td><a target="_blank" :href="data.account_link">{{data.account_name}}</a></td>
                <td>{{data.to_email}}</td>
                <td>{{hasCCemail(data.cc_email)}}</td>
                <td>{{data.agent_to_queue}}</td>
                <td><button @click="show_emails(data.email_id)" class="btn btn-info">View Reason</button></td>
                <td><span @click="show_update(data.email_id)" class="label label-warning"><i class="fa fa-pencil"></i></span>
                  <span @click="deleteEmail(data.email_id)" class="label label-danger"><i class="fa fa-trash"></i></span></td>
              </tr>
              <tr class="no-data-tbl" v-if="hasNodata">
                <td colspan="6">No data found!</td>
              <tr>
            </tbody>
          </table>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <div class="clearfix btn-group col-md-2 offset-md-5">
        <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page--">  &laquo;  </button>
            <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)"  :class="{'bb-active' : page == pageNumber }" @click="page = pageNumber"> {{pageNumber}} </button>
            <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> &raquo; </button>
          </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
