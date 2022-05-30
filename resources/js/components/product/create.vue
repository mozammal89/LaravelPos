<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Add Product</h4>
              <router-link class="btn btn-warning btn-sm" to="/employee-list"
                >Product List</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="employee" @submit.prevent="employeeInsert" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Product Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Product Name"
                          v-model="form.product_name"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Product Code</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Product code"
                          v-model="form.product_code"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <label for="basicSelect">Product Category</label>
                        <select class="form-control" id="basicSelect">
                            <option>IT</option>
                            <option>Blade Runner</option>
                            <option>Thor Ragnarok</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <label for="basicSelect">Product Supplier</label>
                        <select class="form-control" id="basicSelect">
                            <option>IT</option>
                            <option>Blade Runner</option>
                            <option>Thor Ragnarok</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Product Root</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Product Root"
                          v-model="form.root"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Buying Price</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Buying price"
                          v-model="form.buying_price"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Buying Date</label>
                        <input
                          type="date"
                          class="form-control"
                          v-model="form.buying_date"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Selling Price</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Selling Price"
                          v-model="form.selling_price"
                        />
                      </fieldset>
                    </div>
                    
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Product Quantity</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          v-model="form.product_quantity"
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
                        Save
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
          name : null,
          email : null,
          phone : null,
          salary : null,
          nid : null,
          joning_date : null,
          address : null,
          photo : null
      },
      errors: {},
    };
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
          this.form.photo = event.target.result
          console.log(event.target.result);
        };
        reader.readAsDataURL(file);
      }
      
    },
    employeeInsert(){
      axios.post('api/employee',this.form)
      .then(res => {
        // console.log(res);
        this.$router.push({ name: 'employee-list'})
        Notification.success()
      })
      .catch(error => this.errors= error.response.data.errors)
    }
  },
};

</script>

<style type="text/css">
</style>
