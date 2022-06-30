<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Today Order</h4>
              <router-link class="btn btn-info waves-effect waves-float waves-light btn-sm" to="/pos"
                >Pos</router-link
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
                                <th>Invoice</th>
                                <th>Total Amount</th>
                                <th>Pay</th>
                                <th>Due</th>
                                <th>Pay By</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="extra in filtersearch" :key="extra.id">
                                <td>{{extra.name}}</td>
                                <td>{{extra.id}}</td>
                                <td>{{extra.total}}</td>
                                <td>{{extra.pay}}</td>
                                <td>{{extra.due}}</td>
                                <td>{{extra.payby}}</td>
                                <td> 
                                  <router-link :to="{name: 'order-details', params:{id:extra.id}}" class="btn btn-warning btn-sm">View</router-link> 
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
      orders:[],
      searchTerm:''
    }
  },
  computed:{
    filtersearch(){
      return this.orders.filter(order => {
        return order.name.match(this.searchTerm)
      })
    }
  },

  methods: {
    todayOrder(){
      axios.get('/api/today-order/')
      .then(({data}) => (this.orders = data))
      .catch(err => {
        console.error(err); 
      })
    }
  },
  created(){
    this.todayOrder();
  }
};
</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>