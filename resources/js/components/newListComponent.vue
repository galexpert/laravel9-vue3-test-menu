<template>
<ul>
    {{title}}
    <li v-for="item of steps">
        {{ item.title}}
    </li>
</ul>
</template>

<script>
    export default {
        inject: ['title',
            'steps'],
        name: "newListComponent"
    }
</script>

<style scoped>

</style>
