<template>
    <div class="container">
<h1>VUE Articles-component</h1>
        <div class="row mb-3">
            <div class="col-12">
                <form class="d-flex justify-content-around">
                    <div class="filter">
                        <input v-model="title" type="text" class="form-control" placeholder="title">
                    </div>
                    <!--<div class="filter">
                        <select v-model="gender" class="form-control">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>-->
                    <!--<div class="filter">
                        <div class="form-check">
                            <input value="1" v-model="is_active" class="form-check-input" type="checkbox" id="is-active">
                            <label class="form-check-label" for="is-active">
                                Is Active
                            </label>
                        </div>
                    </div>-->
                    <div class="filter">
                        <input v-model="desc" type="text" class="form-control" placeholder="desc">
                    </div>
                    <div class="filter">
                        <input v-model="tag" type="text" class="form-control" placeholder="tag">
                    </div>

                    <div class="submit">
                        <button type="submit" @click.prevent="filter" class="btn btn-primary" :disabled="busy">
                            <i v-if="busy" class="fa fa-spin fa-spinner"></i>
                            Filter!
                        </button>
                    </div>
                </form>
            </div>
        </div>

<!--{{ articles }}-->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
            <div class="col" v-for="(article, index) of articles" :key="article.id">
                <div class="card shadow-sm">
                    <img :src=" article.img " class="bd-placeholder-img card-img-top" width="100%" height="225" aria-label="Placeholder: Thumbnail" >
                    <h3 class="card-title">{{ article.title }}</h3>

                    <div class="card-body">

                        <p class="card-text">{{ article.intro }}</p>
                        <div class="btn-group">
                            <a :href=" route('article', {'id': article.id}) " type="button" class="btn btn-primary">Подробно</a>

                        </div>
                        <!--<div><small class="text-muted">{{ $article.createdAtFormatting () }}</small></div>-->

                        <div class="mt-3">
                            <span class="badge bg-danger mx-1"> {{ article.state.likes }} <i class="far fa-thumbs-up"></i></span>
                            <span class="badge bg-primary"> {{ article.state.views }} <i class="far fa-eye"></i></span>
                        </div>
                        Теги:
                        <div class="mt-4">

                           <!-- <span class="badge bg-primary m-3"> {{ tag.label }}</span>-->
                            <a v-for="(tag, index) in article.tags" :key="tag.id" :href="route('tags', {'tag': tag.id})" type="button" class="badge bg-primary m-3" >{{ tag.label }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--<div class="mx-auto">{{ $articles->links() }}</div>-->
    </div>
</template>

<script>

    import axios from "axios";
    export default {
        name: "ArticlesComponent",
        props: {
            articlesdata: Array,
        },
        data () {
            return {
                title: null,
                desc: null,
                tag: null,
                is_active: null,
                birthday: null,
                gender: null,
                articles: this.articlesdata,
                busy: false,
            }
        },
        methods: {

            filter () {
                this.busy = true;
                axios.get(`/articles`, {
                    params: {
                        title: this.title,
                        desc: this.desc,
                        tag: this.tag,
                    }
                })
                    .then(response => {
                        this.articles = response.data;
                        this.busy = false;
                    })
            }


        }
    }


</script>

<style scoped>

</style>
