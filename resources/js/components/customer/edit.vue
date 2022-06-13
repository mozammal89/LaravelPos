<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit Customer</h4>
              <router-link class="btn btn-warning btn-sm" to="/customer-list"
                >Customer List</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="employee" @submit.prevent="customerUpdate" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Name"
                          v-model="form.name"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter email"
                          v-model="form.email"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Phone</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Phone"
                          v-model="form.phone"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Address</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Address"
                          v-model="form.address"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInputFile">Photo</label>
                        <div class="custom-file">
                          <input
                            type="file"
                            class="custom-file-input"
                            id="inputGroupFile01"
                            @change="onFileSelect"
                          />
                          <label
                            class="custom-file-label"
                            for="inputGroupFile01"
                            >Choose file</label
                          >
                        </div>
                      </fieldset>
                    </div>
                    <div class="col-xl-1 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <img
                          :src="form.photo"
                          style="height: 50px; width: 50px"
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
          name : '',
          email : '',
          phone : '',
          address : '',
          photo : '',
          newphoto: ''
      },
      errors: {},
    };
  },

  created(){
      let id= this.$route.params.id
      axios.get('/api/customer/'+id)
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
    customerUpdate(){
      let id= this.$route.params.id
      axios.patch('/api/customer/'+id,this.form)
      .then(res => {
        // console.log(res);
        this.$router.push({ name: 'customer-list'})
        Notification.success()
      })
      .catch(error => this.errors= error.response.data.errors)
    }
  },
};

</script>

<style type="text/css">
</style>
