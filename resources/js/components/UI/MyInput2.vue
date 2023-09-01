<template>
    поле 1
    <input :value="modelValue" @input="updateInput" class="input" type="text">

    <input
        type="text"
        :value="firstName"
        @input="$emit('update:firstName', $event.target.value)">
поле 3
    <input
        type="text"
        :value="bookTitle"
        @input="$emit('update:bookTitle', $event.target.value)">
</template>



<script>
    export default {
        name: "MyInput2",
        emits: ['update:modelValue', 'update:firstName', 'update:bookTitle'],
        props: {
            modelValue: [String],
            firstName: [String],
            bookTitle: [String],
        },
            methods: {
                updateInput(event) {
                    this.$emit('update:modelValue', event.target.value)
                    //console.log('333', event.target.value)

                }
            }
        }

</script>

<style scoped>

</style>
