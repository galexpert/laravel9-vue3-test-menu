<template>
    <div class="container">
        555
        <div class="card" style="width: 18rem;">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6c757d"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary" @click="addToCard">Go somewhere</a>
            </div>
        </div>
        </div>
</template>

<script>
    import {mapActions}  from "vuex";
    export default {
        name: "CardComponent",
        methods: {
            ...mapActions(['changeDropDown']),
            addToCard(){
                this.changeDropDown()
            }
        },
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

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: 0.25rem;
    }
</style>
