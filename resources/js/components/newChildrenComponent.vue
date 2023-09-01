<template>

    <div class="feature col">

        <div class="card">
            <list-component :steps="steps"></list-component>
            <div :style="{ //внимание ставим объект {}
                    color: (isOpen) ? 'red' : 'blue',
                }" class="card-header" @click="selectTitle(index)">{{ index }} {{title}}</div>
            <!--<button class="btn " @click="isOpen = !isOpen, selectTitle(text)">{{!isOpen ? 'Открыть' : 'Закрыть'}}</button>-->
            <button-component :color="''" @action="isOpen = !isOpen, selectTitle(text)" >
                <!-- 1 вариант без слота передаем props
                :Bottontext="!isOpen ? 'Открыть' : 'Закрыть'"-->
               <!-- 2 вариант если в дочернем есть slot то передаем как раньше через {{ !isOpen ? 'Открыть' : 'Закрыть' }}-->
                {{ !isOpen ? 'Открыть' : 'Закрыть' }}
            </button-component>
            <div class="card-body" v-if="isOpen">
                {{text}}
               <!-- <button class="btn " @click="selectIdNews(id)">{{!isRead ? 'Отметить' : 'Прочитано'}}</button>-->
                <button-component :color="'danger'" @action="selectIdNews(id)" >
                    <!--:Bottontext="!isRead ? 'Отметить' : 'Прочитано'"-->
                    {{!isRead ? 'Отметить' : 'Прочитано'}}
                </button-component>


            </div>

        </div>
    </div>


</template>


<script>
    import ButtonComponent from "./ButtonComponent";
    import newListComponent from "./newListComponent";
    export default {
        /* 1вар
        props: ['index','title','text'],*/
        components: {ButtonComponent, 'list-component': newListComponent,},
     /*   inject: ['title',
            'steps'],*/

        props: {
            index: {
                type: Number,
                required: true
            },
            id: {
                type: Number,
                required: true
            },
            title: {
                type: String,
                required: true
            },
            text: {
                type: String,
                required: true
            },
            isOpen: {
                type: Boolean,
                required: false,
                default: false
            },
        },
        /*1 вар
        emits: ['child-text'],*/
        emits: {
           'child-text': null, // для валидации данных
            'child-idx': null,

        },
        data: () => ({
           // Active: '',
            now:  new Date().toLocaleString() ,
            isRead: false
        }),
        mounted() {
            console.log('Component mounted.')
        },
        name: "NewComponent",
        methods: {
            selectIdNews(id){
               // console.log(id)
                this.$emit('child-idx', id) // передаем на верх текст
                this.isRead = true
            },
            selectTitle(text){
                this.$emit('child-text', text, this.isOpen) // передаем на верх текст
                //this.isOpen = false
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
        /*<!--2 вариант-->*/
     /*   template: `
             <div class="container">
        <div class="justify-content-center" v-for="item of steps">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">{{ item['title'] }}</div>

                    <div class="card-body">
                        {{ title_2 }} {{ counter }}
                    </div>
                    <button class="btn danger" v-on:click="counter++, title_2 = 'Изменили!!!'">
                    отнять: -
                </button>
                </div>
            </div>
        </div>
    </div>
        `*/



    }


</script>
