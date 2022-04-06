
//auth route start
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout').default;
//auth route end

let home = require('./components/home.vue').default;

//employee route
let storeEmployee = require('./components/employee/create.vue').default;
let employeeList = require('./components/employee/index.vue').default;
let editEmployee = require('./components/employee/edit.vue').default;

//supplier route
let storeSupplier = require('./components/supplier/create.vue').default;
let supplierList = require('./components/supplier/index.vue').default;
let editSupplier = require('./components/supplier/edit.vue').default;

//category route
let storeCategory = require('./components/cateogry/create.vue').default;
let categoryList = require('./components/cateogry/index.vue').default;
let editCategory  = require('./components/cateogry/edit.vue').default;




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


  ]