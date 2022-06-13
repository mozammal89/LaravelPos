<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit Stock</h4>
              <router-link class="btn btn-warning btn-sm" to="/product-list"
                >Product List</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="product" @submit.prevent="stockUpdate" enctype="multipart/form-data">
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
                          readonly
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
          product_name : '',
          product_quantity: ''
      },
      errors: {},
      ategories: {},
      suppliers: {},
    };
  },

  created(){
      let id= this.$route.params.id
      axios.get('/api/product/'+id)
      .then(({data})=>(this.form = data))
      .catch(console.log('error'))

  },
  methods: {
    stockUpdate(){
      let id= this.$route.params.id
      axios.post('/api/stock/update/'+id,this.form)
      .then(res => {
        // console.log(res);
        this.$router.push({ name: 'stock'})
        Notification.success()
      })
      .catch(error => this.errors= error.response.data.errors)
    }


    // stockUpdate(){
    //   let id= this.$route.params.id
    //   axios.patch('/api/product/'+id,this.form)
    //   .then(res => {
    //     // console.log(res);
    //     this.$router.push({ name: 'stock'})
    //     Notification.success()
    //   })
    //   .catch(error => this.errors= error.response.data.errors)
    // }
  },
};

</script>

<style type="text/css">
</style>
