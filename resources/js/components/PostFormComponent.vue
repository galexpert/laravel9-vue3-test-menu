<template>
    <h1>Это форма добавления поста</h1>
    <form class="form-control" >
        <input class="col-lg-6" type="text" placeholder="title" v-model="title">
        <input class="col-lg-6" type="text" placeholder="body" v-model="body">
        <button class="btn-danger" type="submit" @click.prevent="addPost">Добавить</button>

    </form>
</template>

<script>
    import {mapMutations} from "vuex"
    export default {
        name: "PostFormComponent",
        data() {
            return {
                title: '',
                body: '',
            }
        },
        methods: {
            // роскрытие обэкта метода 2 вариант
            ...mapMutations(['addItem']),
            addPost(){

                var item = {
                    title: this.title,
                    body:this.body
                }
                /* 1 вариант без импорта mapMutations
                this.$store.commit('addItem', item )*/
                // 2 вариант с импортом
                this.addItem(item)
                this.title=this.body = ''
            }
        },
    }
</script>

<style scoped>

</style>
