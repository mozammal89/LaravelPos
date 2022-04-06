<template>
    <div id="reg-form">
        <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                    <div class="justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="/app-assets/images/pages/register.jpg" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">User Registration</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Fill the below form to create a new account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form  class="user" @submit.prevent="singup">
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputName" class="form-control" placeholder=" Enter Your Name" v-model="form.name" required>
                                                        <label for="inputName">First Name</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email" v-model="form.email" required>
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" v-model="form.password" required>
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" v-model="form.password_confirmation" required>
                                                        <label for="inputConfPassword">Confirm Password</label>
                                                    </div>
                                                    <router-link to="/" class="btn btn-outline-primary float-left btn-inline mb-50">Login</router-link>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</button>
                                                </form>
                                            </div>
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

export default{
    created(){
        if (User.loggedIn()) {
           this.$router.push({ name: 'home' }) 
        }
    },

    data(){
    return {
        form:{
            name:null,
            email:null,
            password:null,
            confirm_password:null
        },
        errors:{}
    }
},
methods: {
    singup(){
        axios.post('/api/auth/singup',this.form)
        .then(res => {
            User.responseAfterLogin(res)
            //sweet alert start
            Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
                })
            //sweet alert end
            this.$router.push({ name: 'home' })
        })
        .catch(error => this.errors = error.response.data.errors)
        // .catch(
        //     //sweet alert start
        //     Toast.fire({
        //         icon: 'warning',
        //         title: 'Invalid Email or Password'
        //         })
        //     //sweet alert end 
        // )
    }
},
}

</script>

<style type="text/css">

</style>