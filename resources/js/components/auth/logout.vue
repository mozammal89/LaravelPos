<template>
    
</template>


<script>
export default {
    created(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')

        //sweet alert start
            Toast.fire({
                icon: 'success',
                title: 'Logout successfully'
                })
            //sweet alert end
            this.$router.push({ name: '/' })
    }
}
</script>

<style>

</style>