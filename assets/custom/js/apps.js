console.clear()
var apps = new Vue({
    el: '#apps',
    data:{
        url: "http://192.168.1.14/APPS/updatestracker/",
        email_data:[],
        hasNodata:false,
        searchBarText:"",
        searchdate: "2019/02/02",
        modal_desc:{
            acc_name:"",
            acc_desc:"",
            acc_link:""
        },
        updatePassData:{
            err: false,
            msg:"",
            type:200
        },
        user_infos:user_info,
        curPass:"",
        newPass:"",
        ispage : thispage
    },
    methods:{
        get_email_data: function () {
            axios.get(this.url + 'get-email')
              .then(response => {
                  this.email_data = response.data.data
                  console.log(this.email_data)
            })
        },
        show_emails:function(id){
         
            for ($i = 0; $i < this.email_data.length; $i++) {
                if (this.email_data[$i].email_id == id) {
                  this.modal_desc.acc_name = this.email_data[$i].account_name
                  this.modal_desc.acc_desc = this.email_data[$i].description
                  this.modal_desc.acc_link = this.email_data[$i].account_link
                  break;
                }
              }
              $("#mod_agent_reason").modal();
        },
        // date functions
        getDateformat:function (mdate){
            let dt = new Date(mdate)
                  
            return  ((dt.getMonth().toString().length == 1) ? "0"+(dt.getMonth()+1): (dt.getMonth()+1 ))+"/"+((dt.getDate().toString().length == 1) ? "0"+(dt.getDate()): (dt.getDate() )) +"/"+dt.getFullYear()
        },
        getcureentdate:function(){
            let dt = new Date()
            return  dt.getFullYear() +"-" +((dt.getMonth().toString().length == 1) ? "0"+(dt.getMonth()+1): (dt.getMonth()+1 )) +"-"+((dt.getDate().toString().length == 1) ? "0"+(dt.getDate()): (dt.getDate() ))
        },
        // link
        gotoMain : function(){
            window.location = 'http://192.168.1.14/APPS/updatestracker/profile'
        },
        hasCcemail:function(eml){
            return (eml =="") ? "N/A" : eml
        },

        // uopdate passwaod
        updatePass: function(){
            let data = {
                user_id: this.user_infos.id,
                password: this.newPass
            }
            var formData = this.formData(data);
            if(!this.passValidation()){
                 axios.post(this.url + 'update-profile', formData)
                .then(response => {
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

        // validate password
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
        },
        // formdata here
        formData(obj) {
            var formData = new FormData();
            for (var key in obj) {
              formData.append(key, obj[key]);
            }
            return formData;
          }



    },
    created (){
        this.get_email_data()
        this.searchdate = this.getcureentdate()

     

    },
    mounted(){  

    },
    computed: {
        filteredEmail() {
            var filtered = this.email_data
            var res = []
            if (this.searchBarText ||  this.searchdate ) {
                     filtered = this.email_data.filter(m => !m.account_name.indexOf(this.searchBarText))
                     filtered = filtered.filter(d => !this.getDateformat(d.date_added).indexOf(this.getDateformat(this.searchdate)))
            } 

            this.hasNodata = (filtered == "") ? true : false;

            return filtered;

        }
    },
    watch :{
       
    }

})