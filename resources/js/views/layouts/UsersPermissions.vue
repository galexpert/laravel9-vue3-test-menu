<template>
    <div class="container">


        <div class="row align-items-md-stretch text-center ">
            <div class="col-md-3 text-center">
                <div class="h-100 p-5 text-white text-center bg-secondary rounded-3">
                    <SidebarAdmin/>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card p-sm-4 p-md-5 text-center signup-form mb-3">
                    <div class="card-body">
                        <h1>Users Permissions panel</h1>
                    </div>
                </div>
                <div class="h-100 p-5 bg-light border rounded-3">
                    <UsersList/>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    import Header from "./Header.vue";
    import UsersList from "./UsersList.vue";
    import SidebarAdmin from "./SidebarAdmin.vue";

    export default {
        name: "UsersPermissions",
        components: {
            Header,
            UsersList,
            SidebarAdmin,
        }
    }
</script>

<style scoped>

</style>
