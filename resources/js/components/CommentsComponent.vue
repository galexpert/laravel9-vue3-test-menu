<template>
    <div class="container">8888
        <div class="toast-container" >


            <div class="toast show" style="width: 100%" v-if="getlastComment" v-for="(comment, index) of getlastComment" v-bind:key="comment.id">
                <div class="toast-header">
                    index: {{ index }}
                    comment.id: {{ comment.id }}
                    <img :src="article.img" class="mx-2" width="80" height="80" aria-label="Placeholder: Thumbnail" >
                    <strong class="me-auto">
                        {{ comment.subject }}
                    </strong>

                    <small>
                        {{ comment.created_at }}
                    </small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" v-on:click="deleteComment(comment.id)"></button>

                </div>
                <div class="toast-body">
                    {{ comment.body}}

                </div>
            </div>

<!--{{ article.comments }}-->
            <div class="toast show" style="width: 100%" v-if="article.comments" v-for="(comment, index) of article.comments" v-bind:key="comment.id">
                <div class="toast-header">
                    index: {{ index }}
                    comment.id: {{ comment.id }}
                    <img :src="article.img" class="mx-2" width="80" height="80" aria-label="Placeholder: Thumbnail" >
                    <strong class="me-auto">
                        {{ comment.subject }}
                    </strong>
                    <small>
                        {{ comment.created_at }}
                    </small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" v-on:click="deleteComment(comment.id)"></button>


                </div>
                <div class="toast-body">
                    {{ comment.body}}

                </div>
            </div>


        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "CommentsComponent",
        data() {
            return {
                //lastComment: [],


            };
        },
        methods: {
            // роскрытие обэкта метода 2 вариант
          //  ...mapActions(['fetchPosts']),
            getArticle(id){
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
               // console.log(comments.comments)

                return comments
            },
            getlastComment(){
                let comment = this.$store.getters.getterLastComment
                //console.log('comment111', Object.keys(comment).length)
                if(comment.length > 0) {
                    console.log('comment222', comment)
                    return comment
                }
                return ''



               // return comment
            },

        },
        mounted() {
          //  let url = window.location.pathname
           // let id = url.substring(url.lastIndexOf('/')+1)
           // console.log('url', url)
           // console.log('id', id)
           // this.getArticle(id)

        },
    }
</script>

<style scoped>

</style>
