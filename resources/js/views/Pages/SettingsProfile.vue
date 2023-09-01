<template>
    <div class="container">

        <h1>Settings!</h1>
        <nav>
            <ul class="navbar-light bg-light">
                <router-link to="/userprofile"> <li><a class="navbar-brand" href="">Profile</a></li></router-link>
                <router-link to="/settingsprofile"> <li><a class="navbar-brand" href="">Settings</a></li></router-link>
                <router-link to="/dashboard"> <li><a class="navbar-brand" href="">Dashboard</a></li></router-link>

            </ul>
        </nav>
        <validation-errors v-if="checkError" v-bind:errors="getError" ></validation-errors>
        <form  class="form">
            <h5 class="card-title" style="color: #c69963;">Current Name: {{ getUser.name }}</h5><br>
            <my-input
                type="text" :placeholder="'New name'"
                v-model="user.name"
                key="username-input"/>
            <my-button type="submit" @click.prevent="changeName">Change Name</my-button>
        </form>

        <form  class="form">


            <my-input type="text" :placeholder="'old password'" v-model="user.old_password"/>
            <my-input type="text" :placeholder="'new password'" v-model="user.password"/>
            <my-input type="text" :placeholder="'password_confirmation'" v-model="user.password_confirmation"/>
            <my-button type="submit" @click.prevent="changePassword">New Password</my-button>
        </form>

    </div>
</template>

<script>
    import {mapActions,mapGetters} from "vuex";
    export default {
        name: "SettingsProfile",
        data() {
            return {
                user: {
                    id: "",
                    name: "",
                    old_password: "",
                    password: "",
                    password_confirmation: "",
                },
            }
            },
        methods: {
            changePassword (){
                // очищаем ошибки если были
                this.$store.dispatch("auth/closeError", '')
                // посылаем данные
                this.user.id = this.getUser.id
                this.$store.dispatch("auth/changeUserPassword", this.user )

            },
            changeName (){
                // очищаем ошибки если были
                this.$store.dispatch("auth/closeError", '')
                // посылаем данные
                this.user.id = this.getUser.id
                this.$store.dispatch("auth/changeUserName", this.user )

            }
        },
        computed: {
            ...mapGetters({
                getError: "auth/getError",
            }),
            checkError: {
                get: function() {
                    return this.$store.getters["auth/getError"]
                },
                set: function(value) {

                    return this.$store.getters["auth/getError"] = value
                }
            },
            getUser(){
                return this.$store.getters["auth/getUserDetails"]
            },


        },
        mounted() {
            this.$store.dispatch("auth/currentUser")
        },
    }
</script>

<style scoped>

</style>
