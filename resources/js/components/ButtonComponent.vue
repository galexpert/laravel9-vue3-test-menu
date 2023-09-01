<template>
    <button class="btn" :class="color" @click="$emit('action')">
        <!-- 1 вариант через props
        {{Bottontext}}-->
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "ButtonComponent",
        /*emits:['action'],*/
        emits: {
            'action': null, // для валидации данных
        },
        props: {
            Bottontext: {
                type: String,
                required: false
            },
            color: {
                type: String,
                default: ''
            },
        }
    }
</script>

<style scoped>

</style>
