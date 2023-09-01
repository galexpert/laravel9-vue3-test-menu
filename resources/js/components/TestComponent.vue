<template>
    <div class="container pt-5" v-cloak>
        <div class="card center">
            <h1>
                {{ title }}: {{ counter}}
            </h1>
            <div>
                <button class="btn primary" v-on:click="counter++">
                    добавить: +
                </button>
                <button class="btn danger" v-on:click="counter--">
                    отнять: -
                </button>
            </div>
        </div>
        <div>
            <div class="form-control">
                <h2 :style="{ //внимание ставим объект {}
                    color:  'blue',
                    fontSize: '20px',
                }"> $REFS референции </h2>

                <input type="text"
                       :placeholder="plaseHolder"
                       ref="myInput"
                       @keyup.enter="addRef($event), log()"
                >
            </div>

            <div class="form-control">
                <h2 :style="{ //внимание ставим объект {}
                    color: inputValue.length < 5 ? 'red' : 'blue',
                    fontSize: inputValue.length < 5 ? '20px' : '40px',
                }"> {{ title_2}}</h2>
ми тут
                <input type="text"
                       :placeholder="plaseHolder"
                       v-model="inputValue"
                       @keypress.enter="addNote"
                >
            </div>
            inputValue : {{ inputValue }}
            <h5>
                <ul  class="list"><!--/*eventItems*/-->
                    <li class="list-item" v-for="(item2, i ) of items2"
                        @click="items2.splice(i, 1)"
                        v-bind:key="item2">
                       <!-- {{ index }}-->
                        {{ item2 }}
                        <input type="text"
                               :placeholder="plaseHolder"
                               @click.stop
                        >

                        <!--<button class="btn danger" v-on:click="deleteNote(index, $event)">удалить</button>-->
                    </li>
                </ul>
                <ul v-if="items.length !== 0" class="list">
                    <li class="list-item" v-for="(item, index ) in items"
                        @click="items.splice(index, 1)"
                        v-bind:key="item">
                        {{ upperCase(item) }}
                        <input type="text"
                               :placeholder="plaseHolder"
                               @click.stop
                        >

                        <!--<button class="btn danger" v-on:click="deleteNote(index, $event)">удалить</button>-->
                    </li>
                </ul>
                <div v-else>статей нет</div>
                <div v-show="items.length == 0">статей нет 2</div>
                <ul v-if="notes.length !== 0" class="list">
                    <li class="list-item" v-for="(note, index ) in notes">
                        <!--1 вар
                       <span :class="inputValue.length < 5 ? 'bold' : 'danger'">{{ upperCase(note) }}</span>-->
                        <!--2 вар
                        <span :class="{danger: inputValue.length < 5,
                         bold: true}">{{ upperCase(note) }}</span>-->
                        <!--3 вар-->
                        <span :class="[{danger: inputValue.length > 5},
                         'bold']">{{ upperCase(note) }}</span>

                        <button class="btn danger" v-on:click="deleteNote(index, $event)">удалить</button>
                    </li>
                </ul>
                <div v-else-if="notes.length === 2">заметок 2</div>
                <div v-else>нет заметок</div>
            </h5>
            <hr>
            <!-- 1 вар
            <span>Count : {{ dubleCount }} </span>-->
            <!-- 2 вар-->
            <div>Count v-text: <span v-text="dubleCount"></span></div>
            <div>Count2 v-once: <span v-once> {{ dubleCount }}</span></div>
            <div>Count3 v-pre: <span v-pre> {{ dubleCount }}</span></div>
            <div>Count4 v-html : <span v-html="dubleCount2"></span></div>


            <button class="btn" v-on:click="addNote">Добавить</button>


        </div>


    </div>
</template>

<script>
    export default {
        name: "TestComponent",
        /* 1 вар
        data(){
            return {
                counter: 1,
                title: 'Счетчик!!!',
                title_2: "Заметки",
                plaseHolder: 'Введите название 1',
                inputValue: '',
                notes: ['заметка 1', 'заметка 2','заметка 3'],
                count: ''
            }
        },*/
        /*2 вар*/
        data: () => ({
            counter: 1,
            title: 'Счетчик!!!',
            title_2: "Заметки",
            plaseHolder: 'Введите название 1',
            inputValue: '',
            notes: ['заметка 1', 'заметка 2', 'заметка 3'],
            items: ['стаття 1', 'стаття 2', 'стаття 3'],
            items2: [ 3, '4', '5'],
            count: '',
            dubleCount2: '<h5> привет </h5>'
        }),
        methods: {
            /*changeInputValue(event){
                this.inputValue = event.target.value
            },*/
            addNote() {
                if (this.inputValue !== '') {
                    this.notes.push(this.inputValue)
                    this.inputValue = ''
                }

            },
            log(){
                console.log(this.items2[0])
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
        computed: {
            dubleCount() {
                console.log('dubleCount')
                return this.notes.length * 2
                //всегда надо чтото возвращать
            },
            eventItems(index) {
                //return this.items2.filter(i => i % 2 === 0) // делится без остатка  4
                //return this.items2.filter(item => item  == '2стаття')
                //return this.items2.filter(item => item > 2) //555,4,5
                return this.items2.filter(item => item)
            }
        },
        watch: {
            inputValue(value) {
                console.log('inputValue', value)
                if (value.length > 10) {
                    this.inputValue = 1
                }
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');

    [v-cloak] {
        display: none;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: Inter, Roboto, Oxygen, Fira Sans, Helvetica Neue, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-size: 16px;
        color: #2c3e50;
        background: #2c3e50;
    }

    hr {
        margin: 1rem 0;
    }

    strong,
    .bold {
        font-weight: 500;
    }

    ol,
    p,
    ul {
        line-height: 1.7;
    }

    a {
        color: #3eaf7c;
        font-weight: 500;
        text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 500;
        line-height: 1.45;
    }

    h1 {
        font-size: 2.2rem;
        font-weight: 600;
    }

    h2 {
        font-size: 1.65rem;
        padding-bottom: 0.3rem;
        border-bottom: 1px solid #eaecef;
    }

    h3 {
        font-size: 1.35rem;
    }

    .primary {
        color: #42b983;
    }

    .danger {
        color: #e53935;
    }

    .btn {
        color: #42b983;
        position: relative;
        place-content: center;
        place-items: center;
        width: fit-content;
        border-radius: 99px;
        letter-spacing: 0.05em;
        border: 1px solid #42b983;
        text-decoration: none;
        text-transform: uppercase;
        margin-right: 10px;
        padding: 0.5rem 1.5rem;
        white-space: nowrap;
        font-weight: 700;
        outline: none;
        background: #fff;
        transition: all 0.22s;
    }

    .btn:hover {
        cursor: pointer;
        opacity: 0.8;
    }

    .btn:active {
        box-shadow: inset 1px 1px 1px rgba(0, 0, 0, 0.3);
    }

    .btn.primary {
        background: #42b983;
        color: #fff;
    }

    .btn.danger {
        background: #e53935;
        color: #fff;
        border-color: #e53935;
    }

    .container {
        margin: 0 auto;
        max-width: 1000px;
    }

    .pt-5 {
        padding-top: 5rem;
    }

    .form-control {
        position: relative;
        margin-bottom: 0.5rem;
    }

    .form-control input {
        margin: 0;
        outline: none;
        border: 2px solid #ccc;
        display: block;
        width: 100%;
        color: #2c3e50;
        padding: 0.5rem 1.5rem;
        border-radius: 3px;
        font-size: 1rem;
    }

    .form-control label {
        display: block;
        margin: 0 0 0.3rem 0.3rem;
        font-weight: 500;
    }

    .form-control input:active,
    .form-control input:focus {
        transition: border 0.22s;
        border: 2px solid #42b983;
    }

    .card {
        padding: 1rem;
        border-radius: 10px;
        box-shadow: 2px 3px 10px rgba(0, 0, 0, 0.2);
        background: #fff;
    }

    .card.center {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .list {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .list-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.5rem 0;
    }

</style>
