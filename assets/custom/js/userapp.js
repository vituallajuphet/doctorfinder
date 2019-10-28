var apps = new Vue({
    el: '#apps',
    data: {
       modalName:"User",
      admin_id: adminId,
      fname :fullname,
      url: burl,
      title: 'Dashboard',
      user_data: [],
      contTotal:0,
      virtual_data: [],
      mod_reason_shown: false,
      modalName: "Create new user",
      modal_desc: {
        acc_name: "",
        acc_desc: ""
      },
      selected_id: "",
      selected_option:"",
      formInputs: {
        full_name:null,
        email_address:null,
        user_type:null
      },
      pageLink:"user",
      defaultpassword:"proweaver!!2019",
      isFormValidated: true,
      resMessage: "Please input the required fields",
      ifSuccess: false,
      hasError:false,
      ifShow:true,
      isSave: false,
      searchBarUser:"",
      page: 1,
      perPage: 10,
      pages: [],
      vdata :{
        full_name:null,
        email_address:null,
        user_type:null
      }
     
    },
    methods: {
    //  get data to user function
        getUsedata:function(){
            axios.get(this.url + 'admin/user-list')
            .then(response => (this.user_data = response.data.data))
        },
        // save userdata
        saveUserData : function(){   
            if(this.validateForm(this.formInputs)){
            var formData = this.formData(this.formInputs);
             axios.post(this.url + 'admin/create-user', formData)
             .then(response =>  {
              this.ifSuccess = true
              if(response.data.code != "203"){
                this.resMessage = "Saved successfully!"   
                apps.getUsedata();
                this.ifShow = true
                console.log(response.data)
                this.hasError = false
                setTimeout(function(){ $("#modal_create_user").modal("hide")}, 1300);
              }
              else{
                this.resMessage = "This user is already exist!"   
                apps.getUsedata();
                this.hasError = true
                this.ifShow = true
              }
            })
            apps.cleardata()
           }
            else{
                this.ifSuccess = true
                apps.getUsedata();
            }
        },
        // update userdata
        updateUserData : function(){
            if(this.validateForm(this.formInputs) && this.hasChanges() ){
                var formData = this.formData(this.formInputs);
                 axios.post(this.url + 'admin/update-user', formData)
                 .then(response =>  {
                  this.ifSuccess = true
                  this.hasError = false
                  this.resMessage = "Updated successfully!"   
                  apps.getUsedata();
                  
                  console.log(response.data)
                  this.ifShow = true
                })
                apps.cleardata()
               }
                else{
                
             }
        },
        // search user data
        search_user_data :function(val){

            
            let objs = {search_full_name:val}
            let formData = this.formData(objs);
            axios.post(this.url + 'admin/search-user', formData)
            .then(response => {
                console.log(response.data)
            let msg = response.data.message;
            if (msg == "ok") {
                this.user_data = response.data.data
                this.page = 1
            }
            else{
                this.user_data =[]
            }
            })
        },
        // delete user data
        deleteUser : function(){
            var formData = this.formData(this.formInputs);
            axios.post(this.url + 'admin/delete-user/' + this.selected_id, formData)
            .then(function (response) {
               apps.getUsedata(); // call 
                $("#mod_user_delete").modal("hide")
            })
            .catch(function (error) {
                console.log(error);
            });
        },

    //  modal functionalities here
        createUser: function(){
            delete this.formInputs.user_id;
            $("#modal_create_user").modal();
            this.ifShow = false
            this.modalName = "Create New User"
            this.isSave = true
            this.cleardata()
        },
        showDelete:function(id){
            $("#mod_user_delete").modal();
            this.selected_id = id
        },
        showUserUpdate:function(id){


            $("#modal_create_user").modal()
            this.ifShow = false
            this.isSave = false
            this.modalName = "Update User"
            for ($i = 0; $i < this.user_data.length; $i++) {
                if (this.user_data[$i].user_id == id) {
                  this.formInputs.user_id = id
                  this.formInputs.full_name = this.user_data[$i].full_name
                  this.formInputs.email_address = this.user_data[$i].email_address
                  this.formInputs.user_type = this.user_data[$i].user_type
                  this.selected_option =  this.user_data[$i].user_type

                  this.vdata.full_name = this.user_data[$i].full_name
                  this.vdata.email_address = this.user_data[$i].email_address
                  this.vdata.user_type = this.user_data[$i].user_type
                  

                  break;
                }
              }
        },


        // form data here
        formData(obj) {
            var formData = new FormData();
            for (var key in obj) {
              formData.append(key, obj[key]);
            }
            return formData;
        },
        // form validation here
        validateForm: function (obj) {
            // validate form
            let res = true
            for (var fdata in obj) {
              if (fdata == "email_address") {
                if (obj[fdata] != "") {
                  if (!this.validateEmailAdd(obj[fdata])) {
                    this.isFormValidated = false;
                    this.hasError = true
                    this.ifShow = true
                    this.resMessage = "Invalid email"
                    res = false;
                  }
                }
                else{
                  this.isFormValidated = false;
                  this.hasError = true
                  this.ifShow = true
                  this.resMessage = "Please fill up the require fields!"
                  res = false;
                }
              } else {
                if (obj[fdata] == "") {
                  this.isFormValidated = false;
                  this.hasError = true
                  this.ifShow = true
                  this.resMessage = "Please fill up the require fields!"
                  res = false;
                }
              }
            }
            return res;
        },
        hasChanges : function(){
            var res = true;

   

            if(this.formInputs.full_name == this.vdata.full_name &&  
            this.formInputs.email_address  == this.vdata.email_address &&
            this.formInputs.user_type == this.vdata.user_type
            ){ 
              res = false 
             
              this.hasError = true
              this.ifShow = true
              this.resMessage = "No changes made!"
            } 
            return res;
        },

        // validate email
        validateEmailAdd: function (email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
        },

        // set clear all data here
        cleardata:function(){
            this.formInputs.full_name = ""
            this.formInputs.email_address = ""
            this.formInputs.user_type = ""
            this.isFormValidated = true
            $('#user_type option').eq(0).prop('selected', true);
            this.vdata.full_name = ""
            this.vdata.email_address =""
            this.vdata.user_type = ""
            this.vdata.full_name = ""

        },
        
        setPages: function () {
            this.pages = [];
            let numberOfPages = Math.ceil(this.user_data.length / this.perPage);
            for (let index = 1; index <= numberOfPages; index++) {
                this.pages.push(index);
            }
        },
        paginate :function (posts) {
            let page = this.page;
            let perPage = this.perPage;
            let from = (page * perPage) - perPage;
            let to = (page * perPage);
            return  posts.slice(from, to);
        }
    },
    // mounted properties
    mounted() {
      
    }, 
    // create properties
    created (){
       this.getUsedata();
    },
    // watch properties
    watch: {
        selected_option: function(nwval, oldval){
           this.formInputs.user_type = nwval 
        },
        user_data(){
            this.setPages()
        },
        searchBarUser : function(newVal, oldVal){
            this.search_user_data(newVal)
        }

    },
    // computed properties
    computed:{
        displayedData () {
            return this.paginate(this.user_data);
        },
        hasNodata :function(){
            if(this.user_data  === undefined || this.user_data .length == 0){
              return true
            }
            else{ 
              return false
            }
        },
        // conputed getTotaluser
        getTotalUser:function(){
          return this.user_data.length
        }
    }
  })