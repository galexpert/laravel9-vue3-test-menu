<template>
    <div class="container">
    <h1>Post Component!</h1>
        <post-form-component></post-form-component>

        <h2>count: {{ postCount }}</h2>
        <form class="form-control" >
            Количество постов
            <input class="col-lg-6" type="text" placeholder="body" v-model="limit">
            <button class="btn-danger" type="submit" @click.prevent="limitPost">Выбрать</button>

        </form>

        <div class="wrap" v-for="item of vilidPost" :key="item.id">

            <h2>{{item.title}}</h2>
            <h3> {{item.body}} </h3>
        </div>

    </div>
</template>

<script>
    import {mapGetters, mapActions, mapMutations} from "vuex" // импорт getters из store
    import PostFormComponent from "./PostFormComponent";
    export default {
        name: "PostComponent",
        components: {PostFormComponent},
        data() {
          return {
              items: [],
              limit: '',
          };
        },
        /*  1 вариант*/
        computed: {
            /* // 1 вариант получения getter из store
              allPosts(){
                  return this.$store.getters.allPosts
              },*/
            // 3 вариант комбинированный с другими методами
            ...mapGetters(['vilidPost', "postCount"]),
              // 1 вариант получения getter из store
            countPost(){
                  //return this.$store.getters.postCount
                this.postCount //3 вариант получение getter через импорт
              }


        },
        //2 вариант вывода через импорт mapGetters
        // computed: mapGetters(["allPosts", "postCount"]),
       // methods: mapActions(['fetchPosts']),
// 3 вариант комбинированный
        methods: {
            // роскрытие обэкта метода 2 вариант
            ...mapActions(['fetchPosts']),
            limitPost(){
                // количество постов
                this.fetchPosts(this.limit)
            }
        },


      async mounted() {
            /* переносим получение данных в store в поле actions metod fetchPosts resources\js\store\modules\posts.js
            const res = await fetch('https://jsonplaceholder.typicode.com/posts?_limit=3')
            const posts = await res.json()
           this.items = posts*/
           /* // 1 способ вызываем метод запроса данных из store fetchPosts $store.dispatch
           this.$store.dispatch("fetchPosts")*/
           // 2 вариант через импорт из store
          // передаем параметры если в store определено вторым параметром  (context, limit = 3)
           this.fetchPosts(5)
        }


    }
</script>

<style scoped lang="scss">
    .container {
        max-width: 120rem;
        margin: 8rem auto;
        background-color: var(--color-gray-light-1);
        box-shadow: var(--shadow-dark);
        min-height:50rem;
        .wrap {

            border: 1px solid #0a58ca;
        }

        @media only screen and (max-width: 75rem) {
            margin: 0;
            max-width: 100%;
            width: 100%;

        }
    }
</style>
