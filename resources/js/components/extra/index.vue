<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Extra List</h4>
              <router-link class="btn btn-info waves-effect waves-float waves-light btn-sm" to="/store-extra"
                >Add Extra</router-link
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
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="extra in filtersearch" :key="extra.id">
                                <td>{{extra.vat}}</td>
                                <td><img :src="extra.logo" class="emp_img"></td>
                                <td>{{extra.phone}}</td>
                                <td>{{extra.email}}</td>
                                <td> 
                                  <router-link :to="{name: 'edit-extra', params:{id:extra.id}}" class="btn btn-warning btn-sm">Edit</router-link> 
                                  <a @click="deleteExtra(extra.id)" class="btn btn-danger btn-sm">Delete</a> 
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
      extras:[],
      searchTerm:''
    }
  },

  computed:{
    filtersearch(){
      return this.extras.filter(extra => {
        return extra.phone.match(this.searchTerm)
      })
    }
  },

  methods: {
    allExtra(){
      axios.get('/api/extra/')
      .then(({data}) => (this.extras = data))
      .catch(err => {
        console.error(err); 
      })
    },
    deleteExtra(id){ 
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
        axios.delete('/api/extra/'+id)
        .then(()=>{
          this.extras = this.extras.filter(extra => {
            console.log(extra)
            return extra.id != id
          })
        })
        .catch(()=>{
          // console.log('no');
          this.$router.push({name: 'extra-list'})
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
    this.allExtra();
  }
};
</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>
