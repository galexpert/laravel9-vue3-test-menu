import Vuex from 'vuex'
import router from '../../router/router';

import axios from 'axios';

const state = {
    users: [],
    roles: [],

    error: '',
    message:'',
    paginateItems: {},

}

const mutations = {
    MUTATE_ADD_PAGINATE_ITEMS(state, data) {
        state.paginateItems = data;
    },
    MUTATE_SET_LOGIN_IN(state, payload){
        state.isLogedIn1 = payload
    },
    MUTATE_SET_TOKEN_IN(state, payload){
        state.token = payload
    },

    MUTATE_SET_ERROR(state, payload){
        state.error = payload
    },
    MUTATE_SET_MESSAGE(state, payload){
        state.message = payload
    },
    MUTATE_SET_USERS(state, payload){
        state.users = payload
    },
    MUTATE_SET_ROLES(state, payload){
        state.roles = payload
    },


}

const actions = {
    paginationItems(context, payload) {
        axios.post(`/api/users/?page=${payload.page}`, {
            headers: {
                'Content-Type': 'application/json'
            },
        }).then(response => {
            if (response.data) {
                context.commit('MUTATE_ADD_PAGINATE_ITEMS', response.data)
                context.commit('MUTATE_SET_USERS', response.data)
            }
        }).catch((error) => {
            // ловим ошибки
            if (error.response.data.errors) {
                // context.commit('MUTATE_SET_ERROR', error.response.data.errors)
              //  context.commit('MUTATE_SET_ISLOADING', false)
            }
        })

    },
    getUsersAll(context){
        return new Promise((resolve, reject) => {
            axios.get('/api/users').then(response => {
                if(response.data){
                    console.log('getUsersAll ', response.data)
                    context.commit('MUTATE_SET_USERS', response.data)
                }
                resolve(response)
            })
        }).catch((error)=> {
            // ловим ошибки
            console.log('getUsersAll', error)
            if(error.response.data.errors){
                // context.commit('MUTATE_SET_ERROR', error.response.data.errors)
            }
            reject (error);
        })
    },
    addUser (context, user) {
        console.log('addUser', user)
        return new Promise((resolve, reject) => {
            axios.post('/api/add-user', {
                name: user.name ? user.name : '',
                email: user.email ? user.email : '',
                roleId: user.roleId,
                password: user.password ? user.password : '',
                password_confirmation: user.password_confirmation ? user.password_confirmation : '',

            }).then(response => {

                if(response.data){
                    // если ответ с дата то редиректим
                    //window.location.replace('/login')
                    //context.commit('MUTATE_SET_USERDETAILS', response.data.data)
                    context.dispatch("getUsersAll").then(() => resolve(response))
                    //window.location.replace('/admin/dashboard')
                    // устанавливаем promise в resolve
                    resolve(response)
                } else {
                    // устанавливаем promise в reject
                    reject (response)
                }

            }).catch((error)=> {
                // ловим ошибки
                console.log('changeUserName', error.response.data.errors)
                if(error.response.data.errors){
                    context.commit('MUTATE_SET_ERROR', error.response.data.errors)
                }
                //   reject (error);
            })



        })
    },
    deleteUser (context, userId) {
        return new Promise((resolve, reject) => {
            axios.get('/api/delete-user/' + userId).then(response => {
                if(response.data){
                    context.dispatch("getUsersAll").then(() => resolve(response))


                    // устанавливаем promise в resolve
                    resolve(response)
                } else {
                    // устанавливаем promise в reject
                    reject (response)
                }
            }).catch((error)=> {
                // ловим ошибки
                console.log('changeUserName', error.response.data.errors)
                if(error.response.data.errors){
                    context.commit('MUTATE_SET_ERROR', error.response.data.errors)
                }
                //   reject (error);
            })



        })
    },

    closeError (ctx){
        ctx.commit('MUTATE_SET_ERROR', '')

    },
    closeMessaage (ctx){
        ctx.commit('MUTATE_SET_MESSAGE', '')

    }




}

const getters = {
    getterPaginateItems(state) {
        return state.paginateItems
    },

    getLogedIn(state){
        return state.isLogedIn1
    },
    getUsers(state){
        return state.users
    },
    getRoles(state){
        return state.roles
    },

    getError(state){
        return state.error
    },
    getMessage(state){
        return state.message
    }

}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters

}
