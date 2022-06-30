<template>
  <div>
    <section id="basic-input">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Add Category</h4>
              <router-link class="btn btn-info waves-effect waves-float waves-light btn-sm" to="/category-list"
                >Category List</router-link
              >
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="category" @submit.prevent="categoryInsert">
                  <div class="row">
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                      <fieldset class="form-group">
                        <label for="basicInput">Category Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="basicInput"
                          placeholder="Enter Name"
                          v-model="form.category_name"
                        />
                      </fieldset>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        
                    </div>
                    
                    
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                      <button
                        type="submit"
                        class="btn btn-primary float-left btn-inline mb-50"
                      >
                        Save
                      </button>
                    </div>
                  </div>
                </form>
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

  data() {
    return {
      form: {
          category_name : null
      },
      errors: {},
    };
  },
  methods: {
    categoryInsert(){
      axios.post('api/category',this.form)
      .then(res => {
        // console.log(res);
        this.$router.push({ name: 'category-list'})
        Notification.success()
      })
      .catch(error => this.errors= error.response.data.errors)
    }
  },
};

</script>

<style type="text/css">
</style>
