<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-lg-5 col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6 class="card-title">Expanse Insert</h6>
              <a href="" class="btn btn-sm btn-info">Add Customer</a>
            </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="cart in carts" :key="cart.id">
                  <td>{{cart.product_name}}</td>
                  <td>
                    <span></span>
                    <button @click="decrement(cart.id)" class="btn btn-sm btn-danger csbtn" v-if="cart.product_qty >=2">-</button>
                    <button @click="decrement(cart.id)" class="btn btn-sm btn-danger csbtn" v-else=" " disabled="">-</button>
                    <input type="text" readonly="" :value="cart.product_qty" style="width:25px">
                    <button @click="increment(cart.id)" class="btn btn-sm btn-success csbtn">+</button>
                    </td>
                  <td>{{cart.product_price}}</td>
                  <td>{{cart.sub_total}}</td>
                  <td><a @click="removeItem(cart.id)" class="btn btn-sm btn-danger" style="color:white">X</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
              <strong>{{qty}}</strong>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
              <strong>BDT {{subTotal}}</strong>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">Vat:(calculation {{extras.vat}} %)
              <strong>BDT {{subTotal*extras.vat/100}}</strong>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-center">Total:
              <strong>BDT {{subTotal*extras.vat/100 + subTotal}}</strong>
            </li>
          </ul>
        <br>
        <form>
          <label>Customer name</label>
          <select class="form-control" v-model="customer_id">
            <option v-for="customer in customers"">{{customer.name}}</option>
          </select>

          <label for="pay">Pay</label>
          <input type="text" class="form-control" required="" v-model="pay">

          <label for="pay">Due</label>
          <input type="text" class="form-control" required="" v-model="due">

          <label>Pay By</label>
          <select class="form-control" v-model="customer_id">
            <option value="">Cash</option>
            <option value="">Check</option>
            <option value="">Card</option>
            <option value="">MFS</option>
            <option value="">Gift Card</option>
          </select>
          <br>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>

        </div>
          </div>
        </div>

        <div class="col-lg-7 col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between pb-0">
              <h4 class="card-title">Product Sold</h4>
            </div>
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="homeIcon-tab"
                  data-toggle="tab"
                  href="#homeIcon"
                  aria-controls="home"
                  role="tab"
                  aria-selected="true"
                  >
                  All Products</a
                >
              </li>
              <li class="nav-item" v-for="category in categories" :key="category.id">
                <a
                  class="nav-link"
                  id="profileIcon-tab"
                  data-toggle="tab"
                  href="#profileIcon"
                  aria-controls="profile"
                  role="tab"
                  aria-selected="false"
                  @click="subProduct(category.id)"
                  >
                  {{category.category_name}}</a
                >
              </li>
            </ul>

            <div class="tab-content">
              <div
                class="tab-pane active"
                id="homeIcon"
                aria-labelledby="homeIcon-tab"
                role="tabpanel"
              >
                <div class="card-body">
                  <input
                    type="text"
                    v-model="searchTerm"
                    class="form-control"
                    style="width: 600px"
                    placeholder="Search here"
                  />
                  <div class="justify-content-between mt-1">
                    <section id="ecommerce-products" class="grid-view">
                      <div class="row">
                        <div
                          class="col-lg-4 col-md-4 col-sm-6 col-6"
                          v-for="product in filtersearch"
                          :key="product.id"
                        >
                          <div class="card ecommerce-card">
                            <button class="btn btn-sm cbtn" @click.prevent="AddToCart(product.id)">
                            <div class="item-img text-center">
                              
                                <img
                                  class="img-fluid card-img-top"
                                  :src="product.image"
                                  alt="img-placeholder"
                              />
                            </div>
                            <div class="card-body cardbody">
                              <div class="item-wrapper">
                                <div>
                                  <h6 class="item-price">
                                    BDT {{ product.selling_price }}
                                  </h6>
                                </div>
                              </div>
                              <h6 class="item-name">
                                {{ product.product_name }}
                              </h6>
                              <span
                                class="badge badge-success"
                                v-if="product.product_quantity >= 1"
                                >Available {{ product.product_quantity }}</span
                              >
                              <span class="badge badge-danger" v-else=" "
                                >Stock Out</span
                              >
                            </div>
                            </button>
                            <div class="item-options text-center"></div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane"
                id="profileIcon"
                aria-labelledby="profileIcon-tab"
                role="tabpanel"
              >
                <div class="card-body">
                  <input
                    type="text"
                    v-model="searchTerm"
                    class="form-control"
                    style="width: 600px"
                    placeholder="Search here"
                  />
                  <div class="justify-content-between mt-1">
                    <section id="ecommerce-products" class="grid-view">
                      <div class="row">
                        <div
                          class="col-lg-4 col-md-4 col-sm-6 col-6"
                          v-for="getproduct in getfiltersearch"
                          :key="getproduct.id"
                        >
                          <div class="card ecommerce-card">
                            <button class="btn btn-sm cbtn" @click.prevent="AddToCart(getproduct.id)">
                            <div class="item-img text-center">
                                <img
                                  class="img-fluid card-img-top"
                                  :src="getproduct.image"
                                  alt="img-placeholder"
                              />
                            </div>
                            <div class="card-body cardbody">
                              <div class="item-wrapper">
                                <div>
                                  <h6 class="item-price">
                                    BDT {{ getproduct.selling_price }}
                                  </h6>
                                </div>
                              </div>
                              <h6 class="item-name">
                                {{ getproduct.product_name }}
                              </h6>
                              <span
                                class="badge badge-success"
                                v-if="getproduct.product_quantity >= 1"
                                >Available {{ getproduct.product_quantity }}</span
                              >
                              <span class="badge badge-danger" v-else=" "
                                >Stock Out</span
                              >
                            </div>
                            </button>
                            <div class="item-options text-center"></div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
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
  created() {
    this.allProduct();
    this.allCategory();
    this.allCustomer();
    this.cartProduct();
    this.allExtra();
    Reload.$on('AfterAdd',()=>{
      this.cartProduct();
    })
  },
  data() {
    return {
      products: [],
      categories: "",
      getproducts: [],
      searchTerm: "",
      customers: "",
      errors:"",
      carts:[],
      extras:"",
    };
  },

  computed: {
    filtersearch() {
      return this.products.filter((product) => {
        return product.product_name.match(this.searchTerm);
      });
    },

    getfiltersearch() {
      return this.getproducts.filter((getproduct) => {
        return getproduct.product_name.match(this.searchTerm);
      });
    },
    //calculation cart qty
    qty(){
      let sum = 0;
      for(let i = 0; i< this.carts.length; i++){
          sum += (parseFloat(this.carts[i].product_qty));
      }
      return sum;
    },

    subTotal(){
      let sum = 0;
      for(let i = 0; i< this.carts.length; i++){
          sum += (parseFloat(this.carts[i].sub_total));
      }
      return sum;
    },
  },

  methods: {
    // cart method start
    AddToCart(id){
      axios
        .get("/api/addToCart/" + id)
        .then(() => {
          Reload.$emit('AfterAdd');
          Notification.cart_success();
        })
        .catch((err) => {
          console.error(err);
        });
    }, 

    removeItem(id){
      axios
        .get("/api/removeItem/" + id)
        .then(() => {
          Reload.$emit('AfterAdd');
          Notification.item_remove();
        })
        .catch((err) => {
          console.error(err);
        });
    },

    increment(id){
      axios
        .get("/api/increment/" + id)
        .then(() => {
          Reload.$emit('AfterAdd');
          Notification.success();
        })
        .catch((err) => {
          console.error(err);
        });
    },
    decrement(id){
      axios
        .get("/api/decrement/" + id)
        .then(() => {
          Reload.$emit('AfterAdd');
          Notification.success();
        })
        .catch((err) => {
          console.error(err);
        });
    },

    cartProduct() {
      axios
        .get("/api/cart/product/")
        .then(({ data }) => (this.carts = data))
        .catch((err) => {
          console.error(err);
        });
    },

    //get vat

    allExtra(){
      axios.get('/api/vats/')
      .then(({data}) => (this.extras = data))
      .catch(err => {
        console.error(err); 
      })
    },

    // cart method end
    allProduct() {
      axios
        .get("/api/product/")
        .then(({ data }) => (this.products = data))
        .catch((err) => {
          console.error(err);
        });
    },

    allCategory() {
      axios
        .get("/api/category/")
        .then(({ data }) => (this.categories = data))
        .catch((err) => {
          console.error(err);
        });
    },

    allCustomer() {
      axios
        .get("/api/customer/")
        .then(({ data }) => (this.customers = data))
        .catch((err) => {
          console.error(console.log(err));
        });
    },

    subProduct(id) {
      axios
        .get("/api/getting/product/" + id)
        .then(({ data }) => (this.getproducts = data))
        .catch((err) => {
          console.error(err);
        });
    },
  },
};
</script>

<style type="text/css" scoped>
.emp_img {
  height: 40px;
  width: 40px;
}
.item-img img {
  height: 150px;
}
.cardbody{
  background-color: #043257;
}
.cbtn{
  padding: 5px;
}
.table th, .table td{
      padding: 0.75rem !important;
}
.csbtn{
  padding: 0.7rem 0.7rem !important;
  width: 25px;
}
</style>
