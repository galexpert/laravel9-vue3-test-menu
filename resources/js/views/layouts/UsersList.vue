<template>
    <main class="main-part">


      <!--  Test: {{ users }}-->

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
    import axios from 'axios';
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
    created(){
       // this.getUsers()


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
            //let paginateData = toRaw(this.$store.getters['items/getterPaginateItems'])
            let paginateData = this.$store.getters['users/getterPaginateItems']
            console.log('users111',paginateData)
            if (paginateData.data) {
                // this.busy = false
                return paginateData
            }
            let users = this.$store.getters["users/getUsers"]
            console.log('users222222',this.$store.getters["users/getUsers"].data)
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
        deleteUser(id){
            this.isPopUpVisible = false
            //console.log('delete',id)
            this.$store.dispatch('users/deleteUser', id)

        },
        getUsers(){
            /*axios.get('/api/users')
                .then(response => {
                    console.log('MainAdmin' , response.data)
                    this.users = response.data.data
                }).catch(error => {
                console.log('getData' , error)
            })*/
            this.$store.dispatch('users/getUsersAll')
        },

        getInitUsers(){
            axios.get('/api/users')
                .then(response => {
                    console.log('MainAdmin' , response.data)
                    this.users = response.data.data
                }).catch(error => {
                console.log('getData' , error)
            })
            this.$store.dispatch('users/getUsersAll')
        },


    },

}
</script>

<style lang="scss">
.main-part {
    color: cornsilk;
    background-color:   #ddd;
   /* height: 73rem;*/
    flex: 1;
}
</style>
