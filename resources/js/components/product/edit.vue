<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit Product</h4>
              <router-link class="btn btn-warning btn-sm" to="/product-list"
                >Product List</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="product" @submit.prevent="productUpdate" enctype="multipart/form-data">
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
                        <select class="form-control" id="basicSelect" v-model="form.category_id">
                            <option value="">Select Category</option>
                            <option :value="category.id" v-for="category in categories">{{category.category_name}}</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <label for="basicSelect">Product Supplier</label>
                        <select class="form-control" id="basicSelect" v-model="form.supplier_id">
                            <option>Select supplier</option>
                            <option :value="supplier.id" v-for="supplier in suppliers">{{supplier.name}}</option>
                            
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
                          :src="form.image"
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
          category_id : '',
          product_name : '',
          product_code : '',
          root : '',
          buying_price : '',
          selling_price : '',
          supplier_id : '',
          buying_date : '',
          image: '', 
          product_quantity: '',
          newphoto: ''
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

      axios.get('/api/category/')
    .then(({data})=>(this.categories=data))

    axios.get('/api/supplier/')
    .then(({data})=>this.suppliers=data)

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
    productUpdate(){
      let id= this.$route.params.id
      axios.patch('/api/product/'+id,this.form)
      .then(res => {
        // console.log(res);
        this.$router.push({ name: 'product-list'})
        Notification.success()
      })
      .catch(error => this.errors= error.response.data.errors)
    }
  },
};

</script>

<style type="text/css">
</style>
