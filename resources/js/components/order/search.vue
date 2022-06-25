<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Search Order</h4>
              <router-link class="btn btn-warning btn-sm" to="/today-order"
                >Today Order</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="category" @submit.prevent="searchOrder">
                  <div class="row">
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Date</label>
                        <input
                          type="date"
                          class="form-control"
                          id="basicInput"
                          v-model="date"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        
                    </div>
                    
                    
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                      <button
                        type="submit"
                        class="btn btn-primary float-left btn-inline mb-50"
                      >
                        Search
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Order List</h4>
              <router-link class="btn btn-warning btn-sm" to="/pos"
                >POS</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <section id="basic-datatable">
                  <div class="row">
                    <div class="col-12">
                      <div class="card-dashboard">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Invoice</th>
                                <th>Total Amount</th>
                                <th>Pay</th>
                                <th>Due</th>
                                <th>Pay By</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="order in orders" :key="order.id">
                                <td>{{order.name}}</td>
                                <td>{{order.id}}</td>
                                <td>{{order.total}}</td>
                                <td>{{order.pay}}</td>
                                <td>{{order.due}}</td>
                                <td>{{order.payby}}</td>
                                <td> 
                                  <router-link :to="{name: 'order-details', params:{id:order.id}}" class="btn btn-warning btn-sm" target='_blank'>View</router-link> 
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

  data() {
    return {
      date:'',
      orders:{},
    };
  },



  methods: {
    searchOrder(){
        var data = {date:this.date}
      axios.post('api/search/order',data)
        .then(({data}) => (this.orders = data))
        .catch(error => this.errors= error.response.data.errors)
    }
  },
};

</script>

<style type="text/css">
</style>
