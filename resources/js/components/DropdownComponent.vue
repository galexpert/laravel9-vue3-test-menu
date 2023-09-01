<template>
    <div class="container">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <slot name="title">Данные по умолчанию</slot>
                <slot>Данные по умолчанию</slot>
            </button>

            <div class="dropdown-menu" v-if="getToggle">

                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>

    </div>
</template>

<script>
    import {mapGetters} from "vuex";
    export default {
        name: "DropdownComponent",
        computed: {
            ...mapGetters(['getToggle']),

        },

    }
</script>

<style>
    .dropdown-menu {
        display: block;
    }
    .container{
        min-height: 20px !important;
    }

</style>
