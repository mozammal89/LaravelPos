<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">All Salary Details</h4>
              <router-link class="btn btn-warning btn-sm" to="/given-salary"
                >Pay Salary</router-link
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
                                <th>Month</th>
                                <th>Details</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="salary in filtersearch" :key="salary.id">
                                <td>{{salary.salary_month}}</td>
                                <td> 
                                  <router-link :to="{name: 'view-salary', params:{id:salary.salary_month}}" class="btn btn-primary btn-sm">View Salary</router-link>
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
        return salary.salary_month.match(this.searchTerm)
      })
    }
  },

  methods: {
    allSalary(){
      axios.get('/api/salary/')
      .then(({data}) => (this.salaries = data))
      .catch(err => {
        console.error(err); 
      })
    },
  },
  created(){
    this.allSalary();
  }
};
</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>
