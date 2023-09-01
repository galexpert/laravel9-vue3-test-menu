<template>
<div>
    <div class="login-page row">
        <h1 >Login!</h1>
        <validation-messages v-if="checkMessage" v-bind:messages="checkMessage" ></validation-messages>
        <validation-errors v-if="checkError" v-bind:errors="getError" ></validation-errors>

        <form  class="form">

            <my-input class="myClass1" type="text" :placeholder="'email'" v-model="user.email"/>
             <my-input type="password" :placeholder="'password'" v-model="user.password"/>
            <my-button type="submit" @click.prevent="login">login </my-button>
            <router-link to="/register"> <p class="message">Not register</p> <a href="#" > Create account</a></router-link>
            <router-link to="/forgot-password"> <p class="message">Forgot password</p> <a href="#" > Forgot your password</a></router-link>


        </form>
    </div>
</div>
</template>

<script>
    /*import MyInput from "../../components/UI/MyInput";
    import MyButton from "../../components/UI/MyButton";
    import ValidationErrors from "../../components/UI/ValidationErrors";*/
    /* import ValidationMessage from "../../components/UI/ValidationMessage";*/
    import {mapActions,mapGetters} from "vuex";
    export default {
        name: "Login",
       /* components: {ValidationMessage},*/
        created() {
            // Внимание Хук!!!! когда приложение смонтируется выполнится функция
           // console.log('4444', this.$store.getters["auth/getLogedIn"])
            // Записываем sessionStorage используем в хуке created
            // Считываем информацию о статусе в sessionStorage при загрузке страницы
         /*   if (sessionStorage.getItem("store")) {
                this.$store.replaceState(Object.assign({}, this.$store.state, JSON.parse(sessionStorage.getItem("store"))))
            }*/

            // Сохраняем информацию в vuex в sessionStorage при обновлении страницы
           /* window.addEventListener("beforeunload", () => {
                sessionStorage.setItem("store", JSON.stringify(this.$store.state))
            })*/
        },
        data() {
            return {
                user: {
                    email: "",
                    password: "",
                },
                error1: false,
            }
        },
        methods: {
           /* ...mapActions(['auth/closeError']),*/
            login(){
                localStorage.removeItem('message');
                // очищаем ошибки если были
                this.$store.dispatch("auth/closeError", '')
                this.$store.dispatch("auth/closeMessaage", '')
                // посылаем данные
                this.$store.dispatch("auth/loginUser", this.user)
            },

        },
        computed: {
            ...mapGetters({
                getError: "auth/getError",
                getMessage: "auth/getMessage",
            }),
           /* checkError(){
                return this.getError
            },*/

            state () {
                return this.$store.state
            },

            checkError: {
                get: function() {
                    return this.$store.getters["auth/getError"]
                },
                set: function(value) {
                    return this.$store.getters["auth/getError"] = value
                }
            },
            checkMessage: {
                get: function() {

                    if (localStorage.getItem("message") ) {

                     //   let message = JSON.parse( localStorage.getItem("message"));
                        let message = localStorage.getItem("message");
                        let messages = [];
                        messages.push(message)
                        return messages

                    }
                    return this.$store.getters["auth/getMessage"]
                },
                set: function(value) {
                    return this.$store.getters["auth/getMessage"] = value
                }
            },


        },


    }
</script>

<style lang="scss">
    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
        display: flex;
    }

    .form {

        position: relative;
        z-index: 1;
        background-color: var(--color-grey-dark-1);
        background-image: linear-gradient(rgba(#101d2c, .93), rgba(#101d2c, .93)), url(../../../img/book.jpg);
        background-size: cover;
        background-position: center;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.5), 0 5px 0 rgba(0, 0, 0, 0.2);
    }
    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form .message {
        margin: 15px;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #c69963;
        text-decoration: none;
    }
</style>
