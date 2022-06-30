<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit Employee</h4>
              <router-link class="btn btn-info waves-effect waves-float waves-light btn-sm" to="/expanse-list"
                >Employee List</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="expanse" @submit.prevent="expanseUpdate" enctype="multipart/form-data">
                   <div class="row">
                    <div class="col-xl-8 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Details</label>
                        <textarea
                          class="form-control"
                          id="basicInput"
                          rows="3"
                          placeholder="Expanse Details"
                          v-model="form.details"
                        ></textarea>
                      </fieldset>
                    </div>
                     <div class="col-xl-4 col-md-6 col-12 mb-1">
                     </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Amount</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Amount"
                          v-model="form.amount"
                        />
                      </fieldset>
                    </div>

                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Expanse Date</label>
                        <input
                          type="date"
                          class="form-control"
                          v-model="form.expanse_date"
                        />
                      </fieldset>
                    </div>

                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                      <button
                        type="submit"
                        class="btn btn-primary float-right btn-inline mb-50"
                      >
                        Update
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script type="text/javascript">
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },

  data() {
    return {
      form: {
          details : '',
          amount : '',
          expanse_date : ''
      },
      errors: {},
    };
  },

  created(){
      let id= this.$route.params.id
      axios.get('/api/expanse/'+id)
      .then(({data})=>(this.form = data))
      .catch(console.log('error'))
  },
  methods: {
    onFileSelect(event){
      // console.log(event);
      let file = event.target.files[0];
      if (file.size > 1048770) {
        Notification.image_validation();
      }else{
        // console.log(event);
        let reader = new FileReader();
        reader.onload = event =>{
          this.form.newphoto = event.target.result
          console.log(event.target.result);
        };
        reader.readAsDataURL(file);
      }
      
    },
    expanseUpdate(){
      let id= this.$route.params.id
      axios.patch('/api/expanse/'+id,this.form)
      .then(res => {
        // console.log(res);
        this.$router.push({ name: 'expanse-list'})
        Notification.success()
      })
      .catch(error => this.errors= error.response.data.errors)
    }
  },
};

</script>

<style type="text/css">
</style>
