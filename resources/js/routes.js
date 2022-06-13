
//auth component start
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout').default;
//auth component end

let home = require('./components/home.vue').default;

//employee component
let storeEmployee = require('./components/employee/create.vue').default;
let employeeList = require('./components/employee/index.vue').default;
let editEmployee = require('./components/employee/edit.vue').default;

//supplier component
let storeSupplier = require('./components/supplier/create.vue').default;
let supplierList = require('./components/supplier/index.vue').default;
let editSupplier = require('./components/supplier/edit.vue').default;

//category component
let storeCategory = require('./components/cateogry/create.vue').default;
let categoryList = require('./components/cateogry/index.vue').default;
let editCategory  = require('./components/cateogry/edit.vue').default;

//product component
let storeProduct = require('./components/product/create.vue').default;
let productList = require('./components/product/index.vue').default;
let editProduct = require('./components/product/edit.vue').default;

//expanse component
let storeExpanse = require('./components/expanse/create.vue').default;
let expanseList = require('./components/expanse/index.vue').default;
let editExpanse = require('./components/expanse/edit.vue').default;

//salary component
let salary = require('./components/salary/all_employee.vue').default;
let paySalary = require('./components/salary/create.vue').default;
let allSalary = require('./components/salary/index.vue').default;
let viewSalary = require('./components/salary/view.vue').default;
let editSalary = require('./components/salary/edit.vue').default;

//stock component
let stock = require('./components/product/stock.vue').default;
let editStock = require('./components/product/edit-stock.vue').default;

//customer component
let allCustomer = require('./components/customer/index.vue').default;
let storeCustomer = require('./components/customer/create.vue').default;
let editCustomer = require('./components/customer/edit.vue').default;

//pos component
let pos = require('./components/pos/pointofsale.vue').default;


export const routes = [
  //auth rout start
    { path: '/', component: login, name: '/' },
    { path: '/register', component: register, name: 'register' },
    { path: '/forget', component: forget, name: 'forget' },
    { path: '/logout', component: logout, name: 'logout' },
    //auth route end
    { path: '/home', component: home, name: 'home' },

    // employee route 
    { path: '/store-employee', component: storeEmployee, name: 'store-employee' },
    { path: '/employee-list', component: employeeList, name: 'employee-list' },
    { path: '/edit-employee/:id', component: editEmployee, name: 'edit-employee' },

    //supplier route
    { path: '/store-supplier', component: storeSupplier, name: 'store-supplier'},
    { path: '/supplier-list', component: supplierList, name: 'supplier-list'},
    { path: '/edit-supplier/:id', component: editSupplier, name: 'edit-supplier'},


    //category route
    { path: '/store-category', component: storeCategory, name: 'sote-category'},
    { path: '/category-list', component: categoryList, name: 'category-list'},
    { path: '/edit-category', component: editCategory, name: 'edit-category'},

    
    //product route
    { path: '/store-product', component: storeProduct, name: 'store-product'},
    { path: '/product-list', component: productList, name: 'product-list'},
    { path: '/edit-product/:id', component: editProduct, name: 'edit-product'},

    //expanse route
    { path: '/store-expanse', component: storeExpanse, name: 'store-expanse'},
    { path: '/expanse-list', component: expanseList, name: 'expanse-list'},
    { path: '/edit-expanse/:id', component:editExpanse, name: 'edit-expanse'},

    //salary route
    { path: '/given-salary', component: salary, name:'given-salary' },
    { path: '/pay-salary/:id', component: paySalary, name:'pay-salary'},
    { path: '/all-salary', component: allSalary, name:'all-salary'},
    { path: '/view-salary/:id', component: viewSalary, name:'view-salary'},
    { path: '/edit-salary/:id', component: editSalary, name:'edit-salary'},

    //stock route
    { path: '/stock', component: stock, name: 'stock'},
    { path: '/edit-stock/:id', component: editStock, name:'edit-stock'},

    // customer route 
    { path: '/store-customer', component: storeCustomer, name: 'store-customer' },
    { path: '/customer-list', component: allCustomer, name: 'customer-list' },
    { path: '/edit-customer/:id', component: editCustomer, name: 'edit-customer' },

    //pos router
    { path: '/pos', component: pos, name: 'pos' },

  ]