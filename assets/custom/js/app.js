var apps = new Vue({
  el: '#apps',
  data: {
    admin_id: adminId,
    fname :fullname,
    url: burl,
    title: 'Dashboard',
    email_data: [],
    virtual_data: [],
    mod_reason_shown: false,
    modalName: "Create",
    modal_desc: {
      acc_name: "",
      acc_desc: ""
    },
    user_infos:user_info,
      updatePassData:{
        err: false,
        msg:"",
        type:200
    },
    selected_option :"",
    defaultpassword:"proweaver",
    selected_id: "",
    formInputs: {
      account_name: null,
      account_link: null,
      description: null,
      to_email: null,
      cc_email: "",
      agent_to_queue: ""
    },
    pageLink:thispage,
    isFormValidated: true,
    resMessage: "Please input the required fields",
    ifSuccess: false,
    hasError:false,
    ifShow:true,
    isSave: false,
    searchBarText:"",
    page: 1,
    perPage: 10,
    pages: [],
    curPass:"",
    newPass:"",

  },
  methods: {
    createShow: function () {
      
      this.clearData()
      this.ifShow = false,
      this.modalName = "Create Email"
      this.isSave = true;
      $("#modal_create_email").modal();
      delete this.formInputs.email_id;
  
    },

    get_email_data: function () {
      axios.get(this.url + 'admin/get-email')
        .then(response => (this.email_data = response.data.data))

       
    },
    hasCCemail: function(eml){
      return (eml != "") ? eml : "N/A"
    },
    search_email_data: function (val) {
      var objs = {search_account_name:val}
      var formData = this.formData(objs);
      axios.post(this.url + 'admin/search-email', formData)
      .then(response => {
      let msg = response.data.message;
      if (msg == "ok") {
        this.email_data = response.data.data
        this.page = 1
      }
      else{
        this.email_data =[]
      }
   

      })
    }
    ,
    show_emails: function (id) {

      for ($i = 0; $i < this.email_data.length; $i++) {
        if (this.email_data[$i].email_id == id) {
          this.modal_desc.acc_name = this.email_data[$i].account_name
          this.modal_desc.acc_desc = this.email_data[$i].description
          break;
        }
      }

      console.log(this.email_data)

      $("#modal_reason").modal();
    },
    show_update: function (id) {
      $("#modal_create_email").modal()
     
      this.isSave = false
      this.ifShow = false
      this.modalName = "Update Email"
      for ($i = 0; $i < this.email_data.length; $i++) {
        if (this.email_data[$i].email_id == id) {
          this.formInputs.email_id = id
          this.formInputs.account_name = this.email_data[$i].account_name
          this.formInputs.account_link = this.email_data[$i].account_link
          this.formInputs.description =
            this.formInputs.to_email = this.email_data[$i].to_email
          this.formInputs.cc_email = this.email_data[$i].cc_email
          this.formInputs.agent_to_queue = this.email_data[$i].agent_to_queue

          CKEDITOR.instances['editor'].setData(this.email_data[$i].description)

          break;
        }
      }
    },
    //   delete functions vue
    deleteEmail: function (id) {
      this.selected_id = id
      $("#modal_delete").modal();
    },
    deleteData: function () {

      var formData = this.formData(this.formInputs);

      axios.post(this.url + 'admin/delete-email/' + this.selected_id, formData)
        .then(function (response) {
          this.resMessage = response.data;
          apps.get_email_data();

          $("#modal_delete").modal("hide")

        })
        .catch(function (error) {
          console.log(error);
        });
    },
    // save email
    saveEmail: function () {

    },
    validateForm: function () {
      // validate form
      this.isFormValidated = true;
      this.formInputs.description = CKEDITOR.instances.editor.getData()

      for (var fdata in this.formInputs) {
        if (fdata == "cc_email") {
          if (this.formInputs[fdata] != "") {
            if (!this.validateEmailAdd(this.formInputs[fdata])) {
              this.isFormValidated = false;
              this.hasError = true
              this.ifShow = true
              this.resMessage = "Invalid email"
            } else {
              continue;
            }
          }
        } else if (fdata == "to_email" || fdata == "agent_to_queue") {
          if (this.formInputs[fdata] != "") {
            if (!this.validateEmailAdd(this.formInputs[fdata])) {
              this.isFormValidated = false;
              this.hasError = true
              this.ifShow = true
              this.resMessage = "Invalid email"
            }
          }
        } else {
          if (this.formInputs[fdata] == "") {
            this.isFormValidated = false;
            this.hasError = true
            this.ifShow = true
            this.resMessage = "Please fill up the require fields!"
          }

        }

      }
      // post request
      if (this.isFormValidated) {
        var formData = this.formData(this.formInputs);
        //  save here
        if (this.isSave) {
          
          console.log(this.formInputs)
          this.hasError = false
          axios.post(this.url + 'admin/create-email', formData)
            .then(response => {
                console.log(response.data.code)
              if(response.data.code == 201){
                
                this.ifSuccess = true
                this.resMessage = "Saved Successfully"
                 apps.get_email_data();
                 apps.clearData()
                 setTimeout(function(){ $("#modal_create_email").modal("hide")}, 2000);
               }
               else{
                this.isFormValidated = false;
                this.hasError = true
                this.ifShow = true
                 this.resMessage = "Account name already exists!"
               }
        
            });
        }
        // updated here
        else {
          console.log(this.formInputs)
          
          this.hasError = false
          axios.post(this.url + 'admin/update-email', formData)
            .then(response => {

              console.log()

              if(response.data.code == 201){
                this.resMessage = "Updated successfully!"
                this.hasError = false
               setTimeout(function(){ $("#modal_create_email").modal("hide")}, 2000);
                apps.get_email_data();
                apps.clearData()
              }

            })
        }
     
        this.ifShow = true
      }
    },
    formData(obj) {
      var formData = new FormData();
      for (var key in obj) {
        formData.append(key, obj[key]);
      }
      return formData;
    },
    clearData() {
      this.formInputs.account_name = ""
      this.formInputs.account_link = ""
      this.formInputs.description = ""
      this.formInputs.to_email = ""
      this.formInputs.cc_email = ""
      this.formInputs.agent_to_queue = ""
      this.isFormValidated = true
      CKEDITOR.instances.editor.setData("");
    },
    validateEmailAdd: function (email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    },
    setPages: function () {
      this.pages = [];
      let numberOfPages = Math.ceil(this.email_data.length / this.perPage);
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
  },
  
    // userr here
    updatePass: function(){
      let data = {
          user_id: this.user_infos.id,
          password: this.newPass
      }
      var formData = this.formData(data);
      if(!this.passValidation()){
          axios.post(this.url + 'admin/update-profile', formData)
          .then(response => {
            //  console.log(response.data)
            this.updatePassData.err =true
              if(response.data.code == 201){
                 this.updatePassData.msg ="Password updated successfully!"
                 this.updatePassData.type = 200
                this.curPass =""
                this.newPass =""
                }
              else{
                  this.updatePassData.msg ="update failed!"
                  this.updatePassData.type = 400
              }
          })
      }
    },
    passValidation: function(){
      let res = true;
      if(!this.curPass || !this.newPass){
          this.updatePassData.err =true
          this.updatePassData.msg ="Please input the required fields"
          this.updatePassData.type = 400
          res = true;
      }
      else{
          if(this.curPass  !=  this.newPass){
              this.updatePassData.err =true
              this.updatePassData.msg ="Password doesn't match"
              this.updatePassData.type = 400
                res = true;
          }
          else{
              let str = new String(this.curPass)
            if(str.length < 4){
                this.updatePassData.err =true
                this.updatePassData.msg ="Your password is too short 4 characters is minimum"
                this.updatePassData.type = 400
                res = true;
            }
            else{
                res = false;
            }
          }
      }
      return res;
    }

  },
  computed: {
    hasNodata :function(){
      if(this.email_data  === undefined || this.email_data .length == 0){
        return true
      }
      else{ 
        return false
      }
    },
    displayedData () {
      return this.paginate(this.email_data);
    }
  },
  mounted() {
    this.get_email_data()    
  }, 
  created (){
     
  }
  ,
  watch: {
    searchBarText : function(newVal, oldVal){
        this.search_email_data(newVal)
    },
    email_data(){
       this.setPages()
    }
  }
})