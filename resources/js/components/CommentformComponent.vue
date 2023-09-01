<template>
    <div class="container">555555555555
        <form method="post" action="#" autocomplete="off">
            <div class="form-group">
                <label for="commentSubject">Тема коментариев</label>
                <input name="commentSubject" type="text" class="form-control" id="commentSubject" placeholder="Тема коментариев" v-model="comment.commentSubject">
                <div class="alert alert-warning" v-if="errorsMessage.commentSubject"> {{ errorsMessage.commentSubject[0]}}</div>
            </div>
            <div class="form-group">
                <label for="commentBody">Коментарий</label>
                <textarea name="commentBody" type="text" class="form-control" id="commentBody" placeholder="Тема коментариев" cols="30" rows="10" v-model="comment.commentBody"></textarea>
                <div class="alert alert-warning" v-if="errorsMessage.commentBody"> {{ errorsMessage.commentBody[0]}}</div>
            </div>

            <button type="submit" @click.prevent="sendMessage" class="btn btn-primary">Отправить</button>
        </form>
        <div class="bg-info" v-if="lastCommentIsset">Ваш коментарий добавлен!!!
            <button type="button" class="btn-close" style="margin-left: 10rem" data-bs-dismiss="toast" aria-label="Close" v-on:click.prevent="deleteNotif"></button>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "CommentformComponent",
        data() {
            return {
                comment: {
                    commentSubject: "",
                    commentBody: "",
                },

            };
        },
        methods: {
            // роскрытие обэкта метода 2 вариант
          //  ...mapActions(['fetchPosts']),
            getArticle(id){
                // количество постов
                this.$store.dispatch('getArticle', id)
            },
            deleteNotif(){
                //this.$store.mutations.lastCommentIsset(false)
                this.$store.commit('MUTATE_SET_LASTCOMMENT_ISSET', false )
            },
            sendMessage(){
                //localStorage.removeItem('message');
                // очищаем ошибки если были
                //this.$store.dispatch("auth/closeError", '')
                // посылаем данные
                let article = this.$store.getters.getterArticle
                let id = article.id

                let comment = this.comment
                // передаем коментарий в бд
                this.$store.dispatch("sendComment", {comment, id})

                // очищаем поля формы
                this.comment.commentSubject = ''
                this.comment.commentBody = ''


            },
        },
        computed: {
            // getters всегда используем в computed!!!!
            // 1 вариант импорта если state находится в подпапках
            //...mapGetters("auth", ["getLogedIn"]),
            // 2 вариант импорта если state находится в корне
            //...mapGetters(["auth"]),
            /*loggedIn (){
                // 1 вариант
                ///return this.$store.getters["auth/getLogedIn"]
                // 2 вариант записать в session проверяем флаг loggedIn на true
                if (sessionStorage.getItem("store") ) {
                    let user = JSON.parse( sessionStorage.getItem("store") );
                    return user.isLogedIn1

                }
                // проверяем флаг на getLogedIn true
                return this.$store.getters["auth/getLogedIn"]
            },*/
            state () {
                return this.$store.state
            },
            article(){
                let comments = this.$store.getters.getterArticle
                //console.log(comments.comments)

                return this.$store.getters.getterArticle
            },
            lastCommentIsset(){
                //console.log('lastcomment', this.$store.getters.getterLastCommentIsset)
                let lastComment = this.$store.getters.getterLastCommentIsset
                if (this.$store.getters.getterLastCommentIsset) {
                    return this.$store.getters.getterLastCommentIsset
                }
                return ''

            },

            errorsMessage(){

                let errors = this.$store.getters.getterErrorsMessage
                //console.log('errorsMessage', Object.keys(errors).length)
                if (Object.keys(errors).length > 0) {
                    console.log('errorsMessage', errors)
                    return errors
                }
                return ''

            },


        },
        mounted() {
          //  let url = window.location.pathname
          //  let id = url.substring(url.lastIndexOf('/')+1)
          //  console.log('url', url)
           // console.log('id', id)
           // this.getArticle(id)

        },
    }
</script>

<style scoped>

</style>
