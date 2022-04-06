<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Supplier List</h4>
              <router-link class="btn btn-warning btn-sm" to="/store-supplier"
                >Add Supplier</router-link
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
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Shop Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="supplier in filtersearch" :key="supplier.id">
                                <td>{{supplier.name}}</td>
                                <td><img :src="supplier.photo" class="emp_img"></td>
                                <td>{{supplier.phone}}</td>
                                <td>{{supplier.email}}</td>
                                <td>{{supplier.shopname}}</td>
                                <td> 
                                  <router-link :to="{name: 'edit-supplier', params:{id:supplier.id}}" class="btn btn-warning btn-sm">Edit</router-link> 
                                  <a @click="deleteSupplier(supplier.id)" class="btn btn-danger btn-sm">Delete</a> 
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
      suppliers:[],
      searchTerm:''
    }
  },

  computed:{
    filtersearch(){
      return this.suppliers.filter(supplier => {
        return supplier.name.match(this.searchTerm)
      })
    }
  },

  methods: {
    allSupplier(){
      axios.get('/api/supplier/')
      .then(({data}) => (this.suppliers = data))
      .catch(err => {
        console.error(err); 
      })
    },
    deleteSupplier(id){ 
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
        axios.delete('/api/supplier/'+id)
        .then(()=>{
          this.suppliers = this.suppliers.filter(supplier => {
            return supplier.id != id
          })
        })
        .catch(()=>{
          // console.log('no');
          this.$router.push({name: 'supplier-list'})
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
    this.allSupplier();
  }
};
</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>
