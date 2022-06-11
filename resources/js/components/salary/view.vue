<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Employee Salary Details</h4>
              <router-link class="btn btn-warning btn-sm" to="/store-employee"
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
                                <th>Month</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="salary in filtersearch" :key="salary.id">
                                <td>{{salary.name}}</td>
                                <td>{{salary.salary_month}}</td>
                                <td>{{salary.salary_date}}</td>
                                <td>{{salary.amount}}</td>
                                <td> 
                                  <router-link :to="{name: 'edit-salary', params:{id:salary.id}}" class="btn btn-primary btn-sm">Edit Salary</router-link>
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
      salaries:[],
      searchTerm:''
    }
  },

  computed:{
    filtersearch(){
      return this.salaries.filter(salary => {
        return salary.name.match(this.searchTerm)
      })
    }
  },

  methods: {
    viewSalary(){
      let id= this.$route.params.id
      axios.get('/api/salary/view/'+id)
      .then(({data})=>(this.salaries = data))
      .catch(error => this.errors= error.response.data.errors)
    },
  },
  created(){
    this.viewSalary();
  }
};
</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>
