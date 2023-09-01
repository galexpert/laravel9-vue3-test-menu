<template>
    <div class="container">
        <h1>UserProfile!</h1>
                <nav>
                    <ul class="navbar-light bg-light">
                        <router-link to="/userprofile"> <li><a class="navbar-brand" href="">Profile</a></li></router-link>
                        <router-link to="/settingsprofile"> <li><a class="navbar-brand" href="">Settings</a></li></router-link>
                        <router-link to="/dashboard"> <li><a class="navbar-brand" href="">Dashboard</a></li></router-link>
                      <!--     <router-link to="/chat"> <li><a href="">Chat</a></li></router-link>-->
                        <div><!--{{ state }}--></div>
                    </ul>
                </nav>

            <!--<div class="btn btn-info">
                Привет  {{ getUser.name }} <br/>
                {{ getUser.email }}
            </div>-->

            <!-- <div class="buttons">
                 <my-button @click="addToCard" v-if="1">Change card11</my-button>
             </div>-->
            <div class="buttons">
                <my-button @click="logout" v-if="loggedIn">Logout111</my-button>
            </div>

        <div class="card" style="width: 18rem;">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6c757d"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

            <div class="card-body">
                <h5 class="card-title">Name: {{ getUser.name }}</h5>
                <p class="card-text">Email: {{ getUser.email }}</p>
                <p class="card-text">Created: {{ getUser.created_at}}</p>
                <a href="#" class="btn btn-primary" @click="addToCard">Go</a>
            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters, mapActions} from "vuex"; // импорт функций сопоставления
    export default {
        name: "UserProfile",
        methods: {
            // выаод функций Если компонеты лежат в субпапках надо так
            ...mapActions('auth',["changeState","registerUser" ],),

            logout(){
                // 1 вариант обращения
                this.$store.dispatch("auth/logout")
                // 2 вариант обращения к функции
                // this.changeState()
            },


            checkUserState() {
                // проверяем флаг loggedIn и устанавливаем в true если токен есть
                this.$store.dispatch("auth/setLoggedInstate")
            },

        },
        mounted() {
            this.$store.dispatch("auth/currentUser")
        },
        computed: {
            // getters всегда используем в computed!!!!
            // 1 вариант импорта если state находится в подпапках
            ...mapGetters("auth", ["getLogedIn"]),
            // 2 вариант импорта если state находится в корне
            //...mapGetters(["auth"]),
            loggedIn (){
                // 1 вариант
                ///return this.$store.getters["auth/getLogedIn"]
                // 2 вариант записать в session проверяем флаг loggedIn на true
                if (sessionStorage.getItem("store") ) {
                    let user = JSON.parse( sessionStorage.getItem("store") );
                    return user.isLogedIn1

                }
                // проверяем флаг на getLogedIn true
                return this.$store.getters["auth/getLogedIn"]
            },
            state () {
                return this.$store.state
            },
            getUser(){
                return this.$store.getters["auth/getUserDetails"]
            },

        },
    }
</script>

<style  lang="scss">
    .container {
        max-width: 120rem;
        margin: 8rem auto;
        background-color: var(--color-gray-light-1);
        box-shadow: var(--shadow-dark);
        min-height:50rem;

        @media only screen and (max-width: 75rem) {
            margin: 0;
            max-width: 100%;
            width: 100%;

        }
    }
</style>
