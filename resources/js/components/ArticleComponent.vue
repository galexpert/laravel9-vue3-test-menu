<template>
    <div class="container article" v-cloak>8888
        <img :src="article.img" class="bd-placeholder-img card-img-top 555" width="100%" height="450" aria-label="Placeholder: Thumbnail" v-cloak>
        <h3 class="card-title">{{ article.title }}</h3>

        <div class="card-body">

            <p class="card-text">{{ article.body }}</p>
            <div><small class="text-muted">{{article.created_at}}</small></div>

            <div class="mt-3">
                <likes-user-component></likes-user-component>
                <views-user-component></views-user-component>

            </div>
            <span class="tag" v-for="( tag, index) of article.tags"  :key="tag">
                <!--<a href="{{ route('tags', tag.id) }}" type="button" class="badge bg-primary m-3">{{ tag.label }}</a>-->

                <a :href="route('tags', {'tag': tag.id})" type="button" class="badge bg-primary m-3" >{{ tag.label }}</a>

                <!--//работает-->
               <!-- <router-link :to="{name: 'tags', params: {id: tag.id}}"> {{ tag.label }} </router-link>-->

            </span>

        </div>


    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    import ViewsUserComponent from "./ViewsUserComponent";
    import LikesUserComponent from "./LikesUserComponent";


    export default {
        name: "ArticleComponent",
        props: {
            route5: {
                type: String,

            },
        },
        data() {
            return {
                //id: this.$router.currentRoute.params['id']

            };
        },
        components: {ViewsUserComponent, LikesUserComponent},
        methods: {
            // роскрытие обэкта метода 2 вариант
          //  ...mapActions(['fetchPosts']),
            getArticle(id){
                // количество постов
             return   this.$store.dispatch('getArticle', id)

            },

            tagsRoute(id){
                // количество постов
                this.$router.push({ path: '/tags/' + id })

        }
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
               // let art = this.$store.getters.getterArticle

                return this.$store.getters.getterArticle
            },

        },
        mounted() {
            // вызывается позже created()  используется для загрузки данніх из api и изменения дерева dom
           /* let url = window.location.pathname
            let id = url.substring(url.lastIndexOf('/')+1)
            console.log('url', url)
            console.log('id', id)
            this.getArticle(id)*/
            let url = window.location.pathname
            let id = url.substring(url.lastIndexOf('/')+1)
            this.getArticle(id)


        },
        created() {
            // вызывается раньше mounted()  используется для загрузки данніх из api


        },
    }
</script>

<style >
    [v-cloak] {
        display: none!important;
    }
    div.container.article {
        background: #b6effb !important;
    }

</style>
