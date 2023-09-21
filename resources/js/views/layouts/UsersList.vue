<template>
    <main class="main-part">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Data</th>
            </tr>
            </thead>
            <tbody>
            <tr scope="row" v-for="(user,index) in users" :key="user.id">
                <td>{{ index +1 }}</td>
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.created_at }}</td>
            </tr>
            </tbody>
        </table>
        <div class="page-pagination">
            <nav aria-label="Pagination">
                <Bootstrap5Pagination class="mt-1 " v-if="paginateItemsData"
                                      :data="paginateItemsData"
                                      align="center"
                                      :limit="1"
                                      @pagination-change-page="paginateItems"
                ></Bootstrap5Pagination>
            </nav>
        </div>
    </main>
</template>

<script>
    import {Bootstrap5Pagination} from 'laravel-vue-pagination';

export default {
    name: "UsersList",
    components: {
        Bootstrap5Pagination,
    },
    data(){
        return {
            user: {},
            itemsdata: {}
        }
    },
    mounted(){
      this.getUsers()

    },
    computed: {
        state () {
            return this.$store.state
        },
        users(){
            let users = this.$store.getters["users/getUsers"]
            if(users.data){
                return users.data
            }

        },
        paginateItemsData() {
            let paginateData = this.$store.getters['users/getterPaginateItems']
            if (paginateData.data) {
                return paginateData
            }
            let users = this.$store.getters["users/getUsers"]

            return users
        },

    },
    methods: {
        paginateItems(page = 1) {
            let url = window.location.pathname
            let params = this.getFilterParams
            let sorting = this.getSortingParams
            this.$store.dispatch('users/paginationItems', {url, page, params, sorting})
        },
        getUsers(){
            this.$store.dispatch('users/getUsersAll')
        },

    },

}
</script>

<style lang="scss">
.main-part {
    color: cornsilk;
    background-color:   #ddd;
    flex: 1;
}
</style>
