<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Expanse List</h4>
              <router-link class="btn btn-info waves-effect waves-float waves-light btn-sm" to="/store-expanse"
                >Add Expanse</router-link
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
                                <th>Details</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="expanse in filtersearch" :key="expanse.id">
                                <td>{{expanse.details}}</td>
                                <td>{{expanse.expanse_date}}</td>
                                <td>{{expanse.amount}}</td>
                                <td> 
                                  <router-link :to="{name: 'edit-expanse', params:{id:expanse.id}}" class="btn btn-warning btn-sm">Edit</router-link> 
                                  <a @click="deleteExpanse(expanse.id)" class="btn btn-danger btn-sm">Delete</a> 
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
      expanses:[],
      searchTerm:''
    }
  },

  computed:{
    filtersearch(){
      return this.expanses.filter(expanse => {
        return expanse.details.match(this.searchTerm)
      })
    }
  },

  methods: {
    allExpanse(){
      axios.get('/api/expanse/')
      .then(({data}) => (this.expanses = data))
      .catch(err => {
        console.error(err); 
      })
    },
    deleteExpanse(id){ 
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
        axios.delete('/api/expanse/'+id)
        .then(()=>{
          this.expanses = this.expanses.filter(expanse => {
            return expanse.id != id
          })
        })
        .catch(()=>{
          // console.log('no');
          this.$router.push({name: 'expanse-list'})
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
    this.allExpanse();
  }
};
</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>
