<template>
    <div class="container">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-1">


            <div class="card">
                <list-component></list-component>
                <div class="card-header">Описание  и дата {{ now }}</div>
Прочитанно раз: {{ countRead }} Статья: {{ Readtitle }}
                <div class="card-body">
                    {{isOpen ? textDesc : ''}}
                </div>
            </div>

        </div>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

                    <children-component v-for="(item, index) of steps"
                    :id="item.id"
                     :title="item.title"
                     :text="item.text"
                     :index="index +1 "
                     :is-open="item.isOpen"
                     v-on:child-text="childText"
                      @child-idx="childIdx"
                    ></children-component>

        </div>

    </div>
</template>


<script>
    import newChildrenComponent from "./newChildrenComponent";
    import newListComponent from "./newListComponent";
    export default {
        components: {
'children-component': newChildrenComponent,
            'list-component': newListComponent,
        },
        provide(){
           return  {
                title: "Список новостей ",
               steps: this.steps
            }

    },
        data: () => ({
            countRead: 0,
            Readtitle: '',
            counter: 1,
            title: 'Счетчик!!!',
            title_2: "Заметки",
            plaseHolder: 'Введите название 1',
            inputValue: '',
            notes: ['заметка 1', 'заметка 2', 'заметка 3'],
            items: ['стаття 1', 'стаття 2', 'стаття 3'],
            items2: [ 3, '4', '5'],
            count: '',
            dubleCount2: '<h5> привет </h5>',
            textDesc: '',
            isOpen: '',
            now:  new Date().toLocaleString() ,
            steps: [
                {id: 1, title: 'Основы', text: 'В блоке вы познакомитесь со всеми основами Vue.js на практике. На протяжении блока мы напишем реактивное приложение, в процессе разработки которого разберем вся базу фреймворка.'},
                {id: 2, title: 'Компоненты', text: 'Один из самых важных блоков в курсе, где вы узнаете все о компонентах. В блоке мы напишем 2 разных приложения и создадим более 5 различных UI компонентов как в реальной разработке. Блок расскажет про абсолютно все составляющие, которые есть в компонентах: взаимодействие, slots, асинхронные и динамические компоненты и тонна примеров.'},
                {id: 3, title: 'Роутер', text: 'В данном блоке вы узнаете все о том, как работает мультиязычность во Vue. Мы создадим миниклон Gmail в данном блоке, где вы на практике увидите как работать с динамическим роутером.'},
                {id: 4, title: 'Vuex', text: 'В блоке вы узнаете абсолютно все про Vuex. Вы узнаете как работать с данными, какие есть лучшие практики по их программированию и структурированию. Все на практике.'},
                {id: 5, title: 'Composition', text: 'Одним из наиболее важных обновлений в Vue 3 является появление альтернативного синтаксиса Composition API. В этом блоке вы узнаете все, чтобы полностью пользоваться данными синтаксисом на практических примерах. Помимо этого вы узнаете как работать совместно с Vue Router и Vuex.'},
            ]
        }),
        mounted() {
            console.log('Component mounted.')
        },
        name: "NewComponent",
        methods: {
            childIdx(data){

                if(data){
                    this.countRead++
                }
                const idx = this.steps.findIndex(steps => steps.id === data)
                this.Readtitle = this.steps[idx].title
                //console.log('2222', this.Readtitle)
            },
            childText(data, data2){
                this.textDesc = data
                this.isOpen = data2
                // console.log('111', data2)
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
