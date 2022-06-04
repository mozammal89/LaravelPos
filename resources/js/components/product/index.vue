<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Product List</h4>
              <router-link class="btn btn-warning btn-sm" to="/store-product"
                >Add Product</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <input type="text" v-model="searchTerm" class="form-control" style="width:600px;" placeholder="Search here" >
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                  <div class="row">
                    <div class="col-12">
                      <div class="card-dashboard">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Code</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="product in filtersearch" :key="product.id">
                                <td>{{product.product_name}}</td>
                                <td><img :src="product.image" class="emp_img"></td>
                                <td>{{product.product_code}}</td>
                                <td>{{product.buying_price}}</td>
                                <td>{{product.selling_price}}</td>
                                <td> 
                                  <router-link :to="{name: 'edit-product', params:{id:product.id}}" class="btn btn-warning btn-sm">Edit</router-link> 
                                  <a @click="deleteProduct(product.id)" class="btn btn-danger btn-sm">Delete</a> 
                                </td>
                              </tr>                              
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!--/ Zero configuration table -->
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

  data(){
    return{
      products:[],
      searchTerm:''
    }
  },

  computed:{
    filtersearch(){
      return this.products.filter(product => {
        return product.product_name.match(this.searchTerm)
      })
    }
  },

  methods: {
    allProduct(){
      axios.get('/api/product/')
      .then(({data}) => (this.products = data))
      .catch(err => {
        console.error(err); 
      })
    },
    deleteProduct(id){ 
      // console.log(id);
      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        axios.delete('/api/product/'+id)
        .then(()=>{
          this.products = this.products.filter(product => {
            return product.id != id
          })
        })
        .catch(()=>{
          // console.log('no');
          this.$router.push({name: 'product-list'})
        })
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
    }
  },
  created(){
    this.allProduct();
  }
};
</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>
