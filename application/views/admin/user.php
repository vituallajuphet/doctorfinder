
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

     <div class="box box-user box-primary">
            <div class="box-header">
              <h3 class="box-title">User</h3>

              <div class="box-tools pull-right">
          <div class="form-group">
          

          <button @click="createUser()" type="button"  id="btn_mod" class="btn btn-flat btn-warning"><i class=" fa fa-plus "></i> Create New
            </button>
               
            <div class="input-group srchbar">
          <input v-model="searchBarUser" type="text" name="q" class="form-control" placeholder="Search account name...">
          <span class="input-group-addon"><i class="fa fa-search"></i></span>
        </div>
                <!-- /.input group -->     
              </div>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered">
                <tbody><tr>
                  <th>Name</th>
                  <th>Email Address</th>
                  <th>User Type</th>
                  <th>Action</th>
                </tr>
                <tr v-for="data in displayedData">
                  <td>{{data.full_name}}</td>
                  <td><a :href="'mailto:' + data.email_address">{{data.email_address}}</a></td>
                  <td>{{data.user_type}}</td>
                  <td>
                      <span @click="showUserUpdate(data.user_id)" class="btn btn-flat btn-warning"> <i class="fa fa-pencil"></i> </span>
                      <span @click="showDelete(data.user_id)" class="btn btn-flat btn-danger"> <i class="fa fa-trash"></i> </span>
                  </td>
                </tr>
                <tr class="no-data-tbl" v-if="hasNodata">
                <td colspan="4">No data found!</td>
              <tr>
              </tbody></table>
              <div class="clearfix btn-group col-md-2 offset-md-5" style="padding: 0; margin: 20px 0;">
        <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page--">  &laquo;  </button>
            <button type="button"  class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)" :class="{'bb-active' : page == pageNumber }" @click="page = pageNumber"> {{pageNumber}} </button>
            <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> &raquo; </button>
          </div>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box-footer">
       

          <span class="pull-right">Results: {{getTotalUser}}</span>

        </div>

    </section>
    <!-- /.content -->
  </div>
 
  <!-- /.content-wrapper -->