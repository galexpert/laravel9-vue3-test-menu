<template>
    <div>
        <ul>

<!--            <li v-if="tempError">
                <div class="btn-danger"  >
                    {{ printError}}
                    <span class="closebtn" style="text-align: right" @click="closeError()"> &times;</span>
                </div>

            </li>-->
            <li v-if="tempError" v-for="(value,index) in printError" :key="index">
                <div class="btn-danger"  >
                    <span>{{ value }} </span>
                    <span class="closebtn" style="text-align: right" @click="closeError()"> &times;</span>
                </div>

            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "ValidationErrors",
        data() {
            return {
                tempError: this.errors
            }
        },
        props: ['errors'],
        methods: {
            /* ...mapActions(['auth/closeError']),*/
            closeError() {
                // this.$store.dispatch("auth/closeError")
                // return this.$store.getters["auth/getError"] = this.tempName
                //this.checkError = this.tempName

                this.tempError = ''
            },
        },
        computed: {
            printError (){
                let errors = Object.values(this.errors)
                errors = errors.flat()
                return errors
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
