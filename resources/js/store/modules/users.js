import axios from 'axios';

const state = {
    users: [],
    roles: [],

    error: '',
    message: '',
    paginateItems: {},
}

const mutations = {
    MUTATE_ADD_PAGINATE_ITEMS(state, data) {
        state.paginateItems = data;
    },

    MUTATE_SET_USERS(state, payload) {
        state.users = payload
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

            }
        })

    },
    getUsersAll(context) {
        return new Promise((resolve, reject) => {
            axios.get('/api/users').then(response => {
                if (response.data) {
                    context.commit('MUTATE_SET_USERS', response.data)
                }
                resolve(response)
            })
        }).catch((error) => {
            // ловим ошибки
            if (error.response.data.errors) {

            }
            reject(error);
        })
    },


}

const getters = {
    getterPaginateItems(state) {
        return state.paginateItems
    },

    getUsers(state) {
        return state.users
    },
}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters

}
