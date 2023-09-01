<template>
    <div class="container">
        <h1> Это новий роутер !55555</h1>
        {{ modelValue }} <br>
        {{ firstName }}<br>
        {{ bookTitle }}<br>

    </div>


    <my-button> регистрация </my-button>
    <my-input
        v-model:model-value="modelValue" v-model:first-name="firstName" v-model:book-title="bookTitle"
    ></my-input>

   <!-- <my-input v-model:title="Title"></my-input>-->

</template>

<script>
   /* import MyButton from "../../components/UI/MyButton"
    import MyInput from "../../components/UI/MyInput";*/
    export default {
        name: "Container",
        components: {},
        data(){
            return {
                textDesc: '',
                modelValue: 'John1',
                firstName: 'Doe2',
                bookTitle: 'book4',
            }
        },
        methods: {
            childIdx(data){

                if(data){
                    this.countRead++
                }
                const idx = this.steps.findIndex(steps => steps.id === data)
                this.Readtitle = this.steps[idx].title
                //console.log('2222', this.Readtitle)
            },
            childText(data){
                this.textDesc = data
                 console.log('55555', data)
            },
            selectIndex(index){
                //this.textDesc = this.steps.filter(e => e.index == index)
                //this.textDesc = this.steps.find((el, idx) => el && idx === index)
                // console.log(this.textDesc)
                //this.isOpen = index
            },
            /*isActive(){
                this.Active = true
            },*/
            addNote() {
                if (this.inputValue !== '') {
                    this.notes.push(this.inputValue)
                    this.inputValue = ''
                }

            },
            log(){
                // console.log(this.items2[0])
            },

            addRef(event){
                //console.log(this.$refs.myInput.value)
                this.items2.unshift(this.$refs.myInput.value)
                this.$refs.myInput.value = ''
                console.log(event.key)
            },
            deleteNote(index, event) {
                this.notes.shift(index)
                //console.log(event)

                this.inputValue = ''
            },
            upperCase(value) {
                return value.toUpperCase()
            },

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

        @media only screen and (max-width: 75rem) {
            margin: 0;
            max-width: 100%;
            width: 100%;

        }
    }
</style>
