  <script>
   var  thispage = 'email'
  
  </script>
  
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!-- <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1> -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Agent Email Information</h3>
            <div class="pull-right" style="width: 170px; padding-right: 3px">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input type="date" v-model="searchdate"  value="2019-07-11" class="" style="height: 34px;" >
    </div>
</div>
            <div class="input-group srchbar">
          <input v-model="searchBarText" type="text" name="q" class="form-control" placeholder="Search here...">
          <span class="input-group-addon"><i class="fa fa-search"></i></span>
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
                <th>Date Created</th>
                <th>Reason</th>

              </tr>
              <tr v-for="data in filteredEmail ">
                <td><a target="_blank" :href="data.account_link">{{data.account_name}}</a></td>
                <td>{{data.to_email}}</td>
                <td>{{hasCcemail(data.cc_email)}}</td>
                <td>{{data.agent_to_queue}}</td>
                <td>{{getDateformat(data.date_added)}}</td>
                <td><button @click="show_emails(data.email_id)" class="btn btn-info"><i class="fa fa-eye"></i> View Reason</button></td>   
              <tr class="no-data-tbl" v-if="hasNodata">
                <td colspan="6">No data found within that date!</td>
              <tr>
            </tbody>
          </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->