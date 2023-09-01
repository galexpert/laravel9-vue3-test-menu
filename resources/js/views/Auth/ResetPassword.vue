<template>
    <div>
        <h1>Reset Password!</h1>
        <div>{{ state }}</div><!--style="display: block"-->

        <!--<div class="btn-danger"  v-if="checkError">
            <span class="closebtn" style="text-align: right" @click="closeError()"> &times;</span>
            {{ getError }} {{ 222 }}

        </div>-->
        <validation-errors v-if="checkError" v-bind:errors="getError" ></validation-errors>

        <div class="login-page">

            <form  class="form">
                <my-input  type="text" :placeholder="'email'" v-model="user.email"/>
                <my-input type="text" :placeholder="'password'" v-model="user.password"/>
                <my-input type="text" :placeholder="'password_confirmation'" v-model="user.password_confirmation"/>
                <my-button type="submit" @click.prevent="sendResetPassword">Reset password </my-button>



            </form>
        </div>
    </div>
</template>

<script>
    /*import MyInput from "../../components/UI/MyInput";
    import MyButton from "../../components/UI/MyButton";
    import ValidationErrors from "../../components/UI/ValidationErrors";*/
    import {mapActions,mapGetters} from "vuex";
    export default {
        name: "ResetPassword",
        components: {},
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
                    password_confirmation: "",
                    token: "",
                },
                error1: false,
                tempName: ''
            }
        },
        methods: {
            /* ...mapActions(['auth/closeError']),*/
            closeError () {
                // this.$store.dispatch("auth/closeError")
                // return this.$store.getters["auth/getError"] = this.tempName
                this.checkError = this.tempName
            },
            sendResetPassword(){
                //первый вар !!! если в axios path: '/reset-password:token?' и ('api/reset-password', payload ) без слеша
                //this.user.token = this.$route.query.token
                //this.$store.dispatch("auth/resetPassword", this.user)
                // второй вариант если в axios path: '/reset-password/:token? и ('/api/reset-password', payload )
                const token = this.$route.params.token;
                this.$store.dispatch("auth/resetPassword",  {...this.user, token})
            },

        },
        computed: {
            ...mapGetters({
                getError: "auth/getError",
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
            }


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
