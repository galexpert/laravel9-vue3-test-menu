<template>
    <div>
        <ul>

            <!--            <li v-if="tempError">
                            <div class="btn-danger"  >
                                {{ printError}}
                                <span class="closebtn" style="text-align: right" @click="closeError()"> &times;</span>
                            </div>

                        </li>-->
            <li v-if="tempMessage" v-for="(value,index) in printMessages" :key="index">
                <div class="btn-info">
                    <span>{{ value }} </span>
                    <span class="closebtn" style="text-align: right" @click="closeMessage()"> &times;</span>
                </div>

            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "ValidationMessages",
        data() {
            return {
                tempMessage: this.messages
            }
        },
        props: ['messages'],
        methods: {
            /* ...mapActions(['auth/closeError']),*/
            closeMessage() {
                // this.$store.dispatch("auth/closeError")
                // return this.$store.getters["auth/getError"] = this.tempName
                //this.checkError = this.tempName
                localStorage.removeItem('message');
                this.tempMessage = ''
            },
        },
        computed: {
            printMessages (){
                let messages = Object.values(this.messages)

                messages = messages.flat()
                //console.log(errors)
                //let message = this.message
                return messages
            }
        },
    }
</script>

<style scoped>
    .form .message {
        margin: 15px;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #c69963;
        text-decoration: none;
    }
    .btn-danger span {
        padding-left: 10px;
        font-size: 20px;
        cursor: pointer;
    }

</style>
