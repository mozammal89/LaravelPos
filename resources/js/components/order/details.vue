<template>
  <div>
    <section id="basic-input">
      <div class="row">

        <!-- customer detais card start -->
        <div class="col-md-6 col-sm-12 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Customer Details</h4>
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <section id="basic-datatable">
                  <div class="row">
                    <div class="col-12">
                      <div class="card-dashboard">
                       <ul class="list-group">
                            <li class="list-group-item"><b>Name:</b> {{orders.name}} </li>
                            <li class="list-group-item"><b>Phone:</b> {{orders.phone}}</li>
                            <li class="list-group-item"><b>Address:</b> {{orders.address}}</li>
                            <li class="list-group-item"><b>Date:</b>{{orders.order_date}}</li>
                            <li class="list-group-item"><b>Pay Through:</b>{{orders.payby}}</li>
                       </ul> 
                      </div>
                    </div>
                  </div>
                </section>
                <!--/ Zero configuration table -->
              </div>
            </div>
          </div>
        </div>

        <!-- customer detais card end  -->


        <!-- order summery card start  -->
        <div class="col-md-6 col-sm-12 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Order Summery</h4>
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <section id="basic-datatable">
                  <div class="row">
                    <div class="col-12">
                      <div class="card-dashboard">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Sub Total:</b> BDT {{orders.sub_total}}</li>
                            <li class="list-group-item"><b>Vat:</b> ( {{orders.vat}}% ) BDT {{orders.total_vat}}</li>
                            <li class="list-group-item"><b>Total:</b> BDT {{orders.total}}</li>
                            <li class="list-group-item"><b>Pay amount:</b> BDT {{orders.pay}}</li>
                            <li class="list-group-item"><b>Due Amount:</b> BDT {{orders.due}}</li>
                       </ul> 
                      </div>
                    </div>
                  </div>
                </section>
                <!--/ Zero configuration table -->
              </div>
            </div>
          </div>
        </div>

        <!-- order summery card end -->


        <!-- order detais card start -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Order Details</h4>
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
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Image</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="detail in details" :key="detail.id">
                                <td>{{detail.product_name}}</td>
                                <td>{{detail.product_code}}</td>
                                <td><img :src="'/'+detail.image" class="emp_img"></td>
                                <td>{{detail.product_qty}}</td>
                                <td>BDT {{detail.product_price}}</td>
                                <td>BDT {{detail.sub_total}}</td>
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

        <!-- order detais card end  -->
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
      errors: {},
      orders:{},
      details:{},
    };
  },

  created(){
      let id= this.$route.params.id
      axios.get('/api/order-details/'+id)
      .then(({data})=>(this.orders = data) )
      .catch(console.log('error'))


      axios.get('/api/order/order-details/'+id)
      .then(({data})=>(this.details = data))
      .catch(console.log('error'))

  },
  methods: {
  },
};

</script>

<style type="text/css">

  .emp_img{
    height: 40px;
    width: 40px;
  }
</style>
