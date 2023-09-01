<template>
    <div class="container">
        <nav>
            <ul class="navbar-light bg-light">
                <router-link to="/userprofile"> <li><a class="navbar-brand" href="">Profile</a></li></router-link>
                <router-link to="/dashboard"> <li><a class="navbar-brand" href="">Dashboard</a></li></router-link>
                <!--     <router-link to="/chat"> <li><a href="">Chat</a></li></router-link>-->
                <div><!--{{ state }}--></div>
            </ul>
        </nav>
            <div class="btn btn-info">
               Привет  {{ getUser.name }} <br/>
                {{ getUser.email }}
            </div>

           <!-- <div class="buttons">
                <my-button @click="addToCard" v-if="1">Change card11</my-button>
            </div>-->
            <div class="buttons">
                <my-button @click="logout" v-if="loggedIn">Logout111</my-button>
            </div>


</div>

</template>

<script>
   /* import store from "vuex"*/
   import {mapGetters, mapActions} from "vuex"; // импорт функций сопоставления

    export default {
        name: "Dashboard",
        data(){
            return {
               /* loggedIn: '',*/
            }
        },
        methods: {
            // выаод функций Если компонеты лежат в субпапках надо так
            ...mapActions('auth',["changeState","registerUser" ],),

            logout(){
                // 1 вариант обращения
                    this.$store.dispatch("auth/logout")
                // 2 вариант обращения к функции
                   // this.changeState()
            },

            register (){
                this.$store.dispatch("auth/registerUser" , {user:{
                    name: '111'
                    }})

            },

            addToCard(){
                //this.changeDropDown()
                this.$store.dispatch("changeDropDown")
            },
            checkUserState() {
                // проверяем флаг loggedIn и устанавливаем в true если токен есть
                this.$store.dispatch("auth/setLoggedInstate")
            },

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
        mounted() {
            this.$store.dispatch("auth/currentUser")
        },
        created () {
            // Записываем sessionStorage используем в хуке created
            // Считываем информацию о статусе в sessionStorage при загрузке страницы
           /* if (sessionStorage.getItem("store") ) {
                this.$store.replaceState(Object.assign({}, this.$store.state,JSON.parse(sessionStorage.getItem("store"))))
            }

            // Сохраняем информацию в vuex в sessionStorage при обновлении страницы
            window.addEventListener("beforeunload",()=>{
                sessionStorage.setItem("store",JSON.stringify(this.$store.state))
            })*/
            // выполняем функцию установки флага loggedIn и устанавливаем в LogedIn true если токен есть
            this.checkUserState();
        }
    }
</script>

<style lang="scss">
    .container {
      /*  max-width: 120rem;*/
        margin: 8rem auto;
        background-color: var(--color-gray-light-1);
        box-shadow: var(--shadow-dark);
        min-height:2rem !important;
        margin-top: 10px  !important;
        margin-bottom: 10px  !important;

   /*     @media only screen and (max-width: 75rem) {
            margin: 0;
            max-width: 100%;
            width: 100%;

        }*/
    }

 /*   nav {
        margin: 30px;
        background-color: var(--color-grey-dark-1);
    }
*/
/*    .navigation {
        list-style: none;
        float: left;

        li {
            display: inline-block;
            margin-left: 30px;

            &:first-child {
                margin: 10;
            }
        }
    }*/

    .buttons {
        float: right;
    }

    .btn {
        background-color: var(--color-primary-light);
        color: #b02a37 !important;
        border-radius: 0;
        font-family: "Josefin Sans", sans-serif;
        font-size: 1.5rem;
        text-transform: uppercase;
        padding: 1.8rem 3rem;
        transition: all 0.2s;
        cursor: pointer;
    }

</style>
