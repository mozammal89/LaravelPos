<template>
    <div>
        <h1>Login Form update</h1>
        <section class="row flexbox-container">
                    <!-- <div class="col-xl-8 col-11 d-flex justify-content-center"> -->
                        <div class="justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="/app-assets/images/pages/graphic-2.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Forget</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please Enter Your email.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
            <form action="index.html">
                <fieldset class="form-label-group form-group position-relative has-icon-left">
                    <input type="email" class="form-control" id="email" placeholder="E-mail" required>
                    <div class="form-control-position">
                        <i class="feather icon-mail"></i>
                    </div>
                    <label for="email">E-mail</label>
                </fieldset>
                <router-link to="/" class="btn btn-outline-primary float-left btn-inline">Back to Login</router-link>
                <button type="submit" class="btn btn-primary float-right btn-inline">Forgot Password</button>
            </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                            </div>
                                            <div class="footer-btn d-inline">
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

</script>

<style type="text/css">

</style>