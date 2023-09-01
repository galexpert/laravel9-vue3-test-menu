<template>
   <!-- Внимание !!! всегда надо оборачивать дочерние компоненты в корневой div!!! иначе будет предупреждение!!!-->
    <div>
    <p>{{placeholder}}</p>
    <input  @input="updateInput" v-bind="$attrs" :placeholder="placeholder">
    </div>
</template>



<script>
    export default {
        name: "MyInput",
        inheritAttrs: false,
        emits: ['update:modelValue'],
        props: {
            modelValue: [String],
           // placeholder: String,
            placeholder: {type: String, default: ""},
        },
        data: () => ({
           // placeholder: "",
        }),
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
