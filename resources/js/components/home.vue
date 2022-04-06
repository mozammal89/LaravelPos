<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <section id="dashboard-analytics">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card bg-analytics text-white">
                <div class="card-content" style="min-height: 400px">
                  <div class="card-body text-center">
                    <img
                      src="/app-assets/images/elements/decore-left.png"
                      class="img-left"
                      alt="
    card-img-left"
                    />
                    <img
                      src="/app-assets/images/elements/decore-right.png"
                      class="img-right"
                      alt="
    card-img-right"
                    />
                    <div class="avatar avatar-xl bg-primary shadow mt-0">
                      <div class="avatar-content">
                        <i class="feather icon-award white font-large-1"></i>
                      </div>
                    </div>
                    <div class="text-center">
                      <h1 class="mb-2 text-white">Welcome To Pos,</h1>
                      <p class="m-auto w-75">
                        You have done <strong>57.6%</strong> more sales today.
                        Check your new badge in your profile.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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
    }
}

</script>

<style type="text/css">
</style>