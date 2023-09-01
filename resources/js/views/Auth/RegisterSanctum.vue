<template>
    <div>
        <validation-messages v-if="checkMessage" v-bind:messages="checkMessage" ></validation-messages>
        <validation-errors v-if="checkError" v-bind:errors="getError" ></validation-errors>
        <div class="register-page">

            <form  class="form">
              <p> {{ user.name }} <br> </p>
                <my-input
                    type="text" :placeholder="'name'"
                    v-model="user.name"
                    key="username-input"/>
                <my-input type="text" :placeholder="'email'" v-model="user.email"/>
                <my-input type="text" :placeholder="'password'" v-model="user.password"/>
                <my-input type="text" :placeholder="'password_confirmation'" v-model="user.password_confirmation"/>
                <my-button type="submit" @click.prevent="register">Register</my-button>
                <router-link to="/login"> <p class="message">Not login</p> <a href="#" > sign In</a></router-link>
            </form>
        </div>
    </div>


</template>

<script>

    import {mapActions,mapGetters} from "vuex";

    export default {
        name: "RegisterSanctum",
        props: {
         /*   placeholder: String,*/
           /* modelValue: [String],*/
        },
       // props: ['placeholder',],
        data() {
            return {
               user: {
                        name: "",
                        email: "",
                        password: "",
                        password_confirmation: "",
                },
        }},
        methods: {
            register (){
                // очищаем ошибки если были
                this.$store.dispatch("auth/closeError", '')
                // посылаем данные
                this.$store.dispatch("auth/registerUserSanctum", this.user )

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
    .register-page {
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
    .form p {
        color: #c69963;
        text-decoration: none;
    }
</style>
