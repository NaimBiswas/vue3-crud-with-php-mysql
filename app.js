const app = Vue.createApp({
    data() {
       return {
          users: [],
       }
   },
   methods: {
    
   },
   mounted() {
      axios
         .get('http://localhost/crud/api.php?action=read')
            .then(response => (this.users = response.data.users))
   },
   
})
app.component('', {
   props: [],
  template:``, 
})
app.mount('#app')