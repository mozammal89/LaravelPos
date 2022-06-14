<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-lg-5 col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between pb-0">
              <h4 class="card-title">Support Tracker</h4>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between mt-1"></div>
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
              <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> All Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg> Category</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
              <div class="card-body">
              <input type="text" v-model="searchTerm" class="form-control" style="width:600px;" placeholder="Search here" >
              <div class="justify-content-between mt-1">
                <section id="ecommerce-products" class="grid-view">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-6" v-for="product in filtersearch" :key="product.id">
                      <div class="card ecommerce-card">
                        <div class="item-img text-center">
                          <a href="app-ecommerce-details.html">
                            <img
                              class="img-fluid card-img-top"
                              :src="product.image"
                              alt="img-placeholder"
                          /></a>
                        </div>
                        <div class="card-body">
                          <div class="item-wrapper">
                            <div>
                              <h6 class="item-price">BDT {{product.selling_price}}</h6>
                            </div>
                          </div>
                          <h6 class="item-name">
                            <a
                              class="text-body"
                              href="app-ecommerce-details.html"
                              >{{product.product_name}}</a
                            >
                          </h6>
                          <span class="badge badge-success" v-if="product.product_quantity >= 1 ">Available {{product.product_quantity}}</span>
                          <span class="badge badge-danger" v-else=" ">Stock Out</span>
                        </div>
                        <div class="item-options text-center">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
            </div>
            <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
              <p>
                Dragée jujubes caramels tootsie roll gummies gummies icing bonbon. Candy jujubes cake cotton candy.
                Jelly-o lollipop oat cake marshmallow fruitcake candy canes toffee. Jelly oat cake pudding jelly beans
                brownie lemon drops ice cream halvah muffin. Brownie candy tiramisu macaroon tootsie roll danish.
              </p>
              <p>
                Croissant pie cheesecake sweet roll. Gummi bears cotton candy tart jelly-o caramels apple pie jelly
                danish marshmallow. Icing caramels lollipop topping. Bear claw powder sesame snaps.
              </p>
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
  },
  data() {
    return {
      products: [],
      searchTerm: "",
    };
  },

  computed: {
    filtersearch() {
      return this.products.filter((product) => {
        return product.product_name.match(this.searchTerm);
      });
    },
  },

  methods: {
    allProduct() {
      axios
        .get("/api/product/")
        .then(({ data }) => (this.products = data))
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
.item-img img{
height: 200px;
}
</style>
