<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Pay Salary</h4>
              <router-link class="btn btn-warning btn-sm" to="/employee-list"
                >Employee List</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="employee" @submit.prevent="salaryPaid">
                  <div class="row">
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Name"
                          v-model="form.name"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter email"
                          v-model="form.email"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Phone</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Phone"
                          v-model="form.phone"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Salary</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Salary"
                          v-model="form.salary"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <label for="basicSelect">Salary Month</label>
                        <select class="form-control" id="basicSelect" v-model="form.salary_month">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                      <button
                        type="submit"
                        class="btn btn-primary float-right btn-inline mb-50"
                      >
                        Pay Salary
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
          name : '',
          email : '',
          phone : '',
          salary : '',
          salary_date : '',
          salary_month : '',
          salary : ''
      },
      errors: {},
    };
  },

  created(){
      let id= this.$route.params.id
      axios.get('/api/employee/'+id)
      .then(({data})=>(this.form = data))
      .catch(console.log('error'))
  },
  methods: {
    salaryPaid(){
      let id= this.$route.params.id
      axios.post('/api/salary/paid/'+id,this.form)
      .then(res => {
        // console.log(res['data']);
        if(res['data'] == 'Salary Alrady Paid'){
          this.$router.push({ name: 'given-salary'})
        Notification.alradysuccess()
        }else{
        this.$router.push({ name: 'given-salary'})
        Notification.success()
        }
      })
      .catch(error => this.errors= error.response.data.errors)
    }
  },
};

</script>

<style type="text/css">
</style>
