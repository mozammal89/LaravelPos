<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Category List</h4>
              <router-link class="btn btn-info waves-effect waves-float waves-light btn-sm" to="/store-category"
                >Add Category</router-link
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
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="category in filtersearch" :key="category.id">
                                <td>{{category.category_name}}</td>
                                <td> 
                                  <router-link :to="{name: 'edit-category', params:{id:category.id}}" class="btn btn-warning btn-sm">Edit</router-link> 
                                  <a @click="deleteCategory(category.id)" class="btn btn-danger btn-sm">Delete</a> 
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
      categories:[],
      searchTerm:''
    }
  },

  computed:{
    filtersearch(){
      return this.categories.filter(category => {
        console.log(category);
        return category.category_name.match(this.searchTerm)
      })
    }
  },

  methods: {
    allCategory(){
      axios.get('/api/category/')
      .then(({data}) => (this.categories = data))
      .catch(err => {
        console.error(err); 
      })
    },
    deleteCategory(id){ 
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
        axios.delete('/api/category/'+id)
        .then(()=>{
          this.categories = this.categories.filter(category => {
            return category.id != id
          })
        })
        .catch(()=>{
          // console.log('no');
          this.$router.push({name: 'category-list'})
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
    this.allCategory();
  }
};
</script>

<style type="text/css">

</style>
