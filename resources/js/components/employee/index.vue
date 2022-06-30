<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Employee List</h4>
              <router-link class="btn btn-info waves-effect waves-float waves-light btn-sm" to="/store-employee"
                >Add Employee</router-link
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
                                <th>Salary</th>
                                <th>Joining date</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="employee in filtersearch" :key="employee.id">
                                <td>{{employee.name}}</td>
                                <td><img :src="employee.photo" class="emp_img"></td>
                                <td>{{employee.phone}}</td>
                                <td>{{employee.salary}}</td>
                                <td>{{employee.joning_date}}</td>
                                <td> 
                                  <router-link :to="{name: 'edit-employee', params:{id:employee.id}}" class="btn btn-warning btn-sm">Edit</router-link> 
                                  <a @click="deleteEmployee(employee.id)" class="btn btn-danger btn-sm">Delete</a> 
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
      employees:[],
      searchTerm:''
    }
  },

  computed:{
    filtersearch(){
      return this.employees.filter(employee => {
        return employee.name.match(this.searchTerm)
      })
    }
  },

  methods: {
    allEmployee(){
      axios.get('/api/employee/')
      .then(({data}) => (this.employees = data))
      .catch(err => {
        console.error(err); 
      })
    },
    deleteEmployee(id){ 
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
        axios.delete('/api/employee/'+id)
        .then(()=>{
          this.employees = this.employees.filter(employee => {
            return employee.id != id
          })
        })
        .catch(()=>{
          // console.log('no');
          this.$router.push({name: 'employee-list'})
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
    this.allEmployee();
  }
};
</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>
