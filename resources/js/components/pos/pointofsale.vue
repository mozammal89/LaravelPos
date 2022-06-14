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
                <tr>
                  <td><a href="#">Name</a></td>
                  <td>Qty</td>
                  <td>Unit</td>
                  <td>Total</td>
                  <td><a href="#" class="btn btn-sm btn-danger">X</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
              <strong>50</strong>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
              <strong>BDT 120.00</strong>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">Vat:
              <strong>BDT 00.00</strong>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-center">Total:
              <strong>BDT 120.00</strong>
            </li>
          </ul>
        <br>
        <form>
          <label>Customer name</label>
          <select class="form-control" v-model="customer_id">
            <option value="">Sohel</option>
            <option value="">Moriom</option>
            <option value="">Mozamml</option>
            <option value="">Ador</option>
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
                                  <h6 class="item-price">
                                    BDT {{ product.selling_price }}
                                  </h6>
                                </div>
                              </div>
                              <h6 class="item-name">
                                <a
                                  class="text-body"
                                  href="app-ecommerce-details.html"
                                  >{{ product.product_name }}</a
                                >
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
                            <div class="item-img text-center">
                              <a href="app-ecommerce-details.html">
                                <img
                                  class="img-fluid card-img-top"
                                  :src="getproduct.image"
                                  alt="img-placeholder"
                              /></a>
                            </div>
                            <div class="card-body">
                              <div class="item-wrapper">
                                <div>
                                  <h6 class="item-price">
                                    BDT {{ getproduct.selling_price }}
                                  </h6>
                                </div>
                              </div>
                              <h6 class="item-name">
                                <a
                                  class="text-body"
                                  href="app-ecommerce-details.html"
                                  >{{ getproduct.product_name }}</a
                                >
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
  },
  data() {
    return {
      products: [],
      categories: "",
      getproducts: [],
      searchTerm: "",
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

    allCategory() {
      axios
        .get("/api/category/")
        .then(({ data }) => (this.categories = data))
        .catch((err) => {
          console.error(err);
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
  height: 200px;
}
</style>
