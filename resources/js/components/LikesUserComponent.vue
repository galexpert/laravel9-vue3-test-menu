<template>
    <span class="badge " :class="{'bg-primary' : isLike, 'bg-danger' : !isLike}" v-if="likesNumber" @click.prevent="addLike"> {{likesNumber}} <i class="far fa-thumbs-up"></i></span>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "LikesUserComponent",
        data() {
            return {
                //lastComment: [],


            };
        },
        methods: {
            // роскрытие обэкта метода 2 вариант
          //  ...mapActions(['fetchPosts']),
            /*getArticle(id){
                // количество постов
                this.$store.dispatch('getArticle', id)
            },

            deleteComment(commentId) {
                let articleId = this.article.id
                this.$store.dispatch('delComment', {articleId, commentId})
                // удаление коммента из массива по ключу id
                this.article.comments.forEach((it, index) => {
                    console.log('itttt', index)
                    if (it.id === commentId) {
                        this.article.comments.splice(index, 1)

                    }
                })

            },*/

            addLike(){
                let url = window.location.pathname
                let articleId = url.substring(url.lastIndexOf('/')+1)
                //let articleId =  this.article.id
                ///console.log('333', this.article1.id)
                let isLike = this.isLike
                this.$store.dispatch('updateLikes', {articleId, isLike})
                // удаление коммента из массива по ключу id
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
         /*   state () {
                return this.$store.state
            },
            article(){
                let comments = this.$store.getters.getterArticle
                //console.log(comments.comments)

                return comments
            },
            articleId(){
                let articleId = this.$store.getters.getterArticleId
               // console.log('computed articleId', this.articleId)

                return articleId
            },*/
            isLike(){
                return this.$store.getters.getterIsLike
            },
            likesNumber(){
                let number = this.$store.getters.getterArticleLikes
                return number
            },

         /*   getlastComment(){
                let comment = this.$store.getters.getterLastComment
                //console.log('comment111', Object.keys(comment).length)
                if(comment.length > 0) {
                    console.log('comment222', comment)
                    return comment
                }
                return ''



               // return comment
            },*/

        },
        mounted() {

            //this.addLike()

        },
        created() {


            //console.log('created articleId', this.article.id)
        },
    }
</script>

<style scoped>

</style>
