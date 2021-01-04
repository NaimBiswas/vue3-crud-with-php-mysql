const app = Vue.createApp({
   data() {
      return {
         users: [],
         form: {
            name: '',
            username: '',
            email: '',
         },
      }
   },
   methods: {
         getData() {
            axios
            .get('http://localhost/crud/api.php?action=read')
            .then(response => (this.users = response.data.users));
         },
         addNewUser() {
         let formData = this.toFormData(this.form);
            axios.post('http://localhost/crud/api.php?action=create', formData)
               .then(response => (app.getData()))
            
         },
         toFormData(obj) {
         let data = new FormData(); 
         for (let key in obj) {
            data.append(key, obj[key]);
         }
         return data;
      },
   },
   
   
   mounted() {
      this.getData();
     
     
   },
   
   


}).mount('#app')

