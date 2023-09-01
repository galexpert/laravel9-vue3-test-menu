<template>
<div>
    <header class="header1">
        <img src="../../../img/logo.png" height="150" width="150" class="logo1" alt="logo">
    </header>
</div>
</template>

<script>

export default {
    name: "Header",
    data() {
        return {
            token: false
        }
    },
    mounted() {
        //this.$store.dispatch("auth/currentUser")
      //  this.$store.dispatch("auth/currentUser")

    },
    methods: {
       /* logout() {
            this.$store.dispatch('auth/logoutSanctum')
        },*/

    },

    computed: {
        getUser(){
            return this.$store.getters["auth/getUserDetails"]
        },
    },
}
</script>

<style scoped>

</style>
