<template>
  <div>
    <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                      
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                    <div class="d-flex align-items-center">
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-primary mr-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto todaysell">
                                                    <h4 class="font-weight-bolder mb-0 todaysell-h4">BDT {{todaysell}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Today Sales</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-info mr-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto todayincome">
                                                    <h4 class="font-weight-bolder mb-0 todayincome-h4">BDT {{income}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Today Income</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto todaydue">
                                                    <h4 class="font-weight-bolder mb-0 todaydue-h4">BDT {{due}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Today Due</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto todayexp">
                                                    <h4 class="font-weight-bolder mb-0 todayexp-h4">BDT {{expanse}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Today Expanse</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                    <div class="row match-height">
                        <!-- Company Table Card -->
                        <div class="col-lg-12 col-12">
                            <div class="card card-company-table">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Photo</th>
                                                    <th>Code</th>
                                                    <th>Buying Price</th>
                                                    <th>Status</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="product in products" :key="product.id">
                                                    <td>{{product.product_name}}</td>
                                                    <td><img :src="product.image" class="emp_img"></td>
                                                    <td>{{product.product_code}}</td>
                                                    <td>{{product.buying_price}}</td>
                                                    <td v-if="product.product_quantity >= 1 "><span class="badge badge-success">Available</span></td>
                                                    <td v-else=" "><span class="badge badge-danger">Stock Out</span></td>
                                                    <td>{{product.product_quantity}}</td>
                                                    
                                                </tr>     
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Company Table Card -->

                       

                        <!-- Transaction Card -->
                        <!-- <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-transaction">
                                <div class="card-header">
                                    <h4 class="card-title">Transactions</h4>
                                    <div class="dropdown chart-dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-3 cursor-pointer" data-toggle="dropdown"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="transaction-item">
                                        <div class="media">
                                            <div class="avatar bg-light-primary rounded">
                                                <div class="avatar-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket avatar-icon font-medium-3"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline></svg>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="transaction-title">Wallet</h6>
                                                <small>Starbucks</small>
                                            </div>
                                        </div>
                                        <div class="font-weight-bolder text-danger">- $74</div>
                                    </div>
                                    <div class="transaction-item">
                                        <div class="media">
                                            <div class="avatar bg-light-success rounded">
                                                <div class="avatar-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check avatar-icon font-medium-3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="transaction-title">Bank Transfer</h6>
                                                <small>Add Money</small>
                                            </div>
                                        </div>
                                        <div class="font-weight-bolder text-success">+ $480</div>
                                    </div>
                                    <div class="transaction-item">
                                        <div class="media">
                                            <div class="avatar bg-light-danger rounded">
                                                <div class="avatar-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon font-medium-3"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="transaction-title">Paypal</h6>
                                                <small>Add Money</small>
                                            </div>
                                        </div>
                                        <div class="font-weight-bolder text-success">+ $590</div>
                                    </div>
                                    <div class="transaction-item">
                                        <div class="media">
                                            <div class="avatar bg-light-warning rounded">
                                                <div class="avatar-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card avatar-icon font-medium-3"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="transaction-title">Mastercard</h6>
                                                <small>Ordered Food</small>
                                            </div>
                                        </div>
                                        <div class="font-weight-bolder text-danger">- $23</div>
                                    </div>
                                    <div class="transaction-item">
                                        <div class="media">
                                            <div class="avatar bg-light-info rounded">
                                                <div class="avatar-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon font-medium-3"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="transaction-title">Transfer</h6>
                                                <small>Refund</small>
                                            </div>
                                        </div>
                                        <div class="font-weight-bolder text-success">+ $98</div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!--/ Transaction Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
  </div>
</template>

<script type="text/javascript">

export default{
    created(){
        if (!User.loggedIn()) {
           this.$router.push({ name: '/' }) 
        }
    },

    data(){
        return{
            todaysell:'',
            income:'',
            due:'',
            expanse:'',
            products:''
        }
    },

    mounted(){
        this.TodaySell();
        this.TodayIncome();
        this.TodayDue();
        this.TodayExpanse();
        this.StockOut();
    },

    methods: {
        TodaySell(){
            axios.get('api/today/sell')
            .then(({data}) => (this.todaysell = data))
            .catch(error => this.errors= error.response.data.errors)
        },

        TodayIncome(){
            axios.get('api/today/income')
            .then(({data}) => (this.income = data))
            .catch(error => this.errors= error.response.data.errors)
        },

        TodayDue(){
            axios.get('api/today/due')
            .then(({data}) => (this.due = data))
            .catch(error => this.errors= error.response.data.errors)
        },

        TodayExpanse(){
            axios.get('api/today/expanse')
            .then(({data}) => (this.expanse = data))
            .catch(error => this.errors= error.response.data.errors)
        },

         StockOut(){
            axios.get('api/today/stock-out')
            .then(({data}) => (this.products = data))
            .catch(error => this.errors= error.response.data.errors)
        }
    },
}

</script>

<style type="text/css">
.avatar{
    background-color: #023258;
    margin: 25px;
}

.avatar .avatar-content{
    color: #07c0f0;
    width: 50px;
    height: 50px;
}
.todaysell, .todaysell-h4{
    color: #32cc02;
    font-weight: bold;
}

.todayincome, .todayincome-h4{
    color: mediumslateblue;
    font-weight: bold;
}
.todaydue, .todaydue-h4{
    color: #ee5a24;
    font-weight: bold;
}
.todayexp, .todayexp-h4{
    color: red;
    font-weight: bold;
}



</style>