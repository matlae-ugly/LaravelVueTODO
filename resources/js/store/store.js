import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        lists: [],
        todos: []
    },
    mutations: {
        loadLists: state => {
            Axios.get('/api/lists').then(res => {state.lists = res.data});
        },
        loadTodos: state => {
            Axios.get('/api/todos').then(res => {state.todos = res.data});
        },
        addTODO: (state, payload) => {
            state.todos.push(payload);
        },
        deleteTODO: (state, payload) => {
            state.todos = state.todos.filter(element => element.id != payload)
        },
        changeTODO: (state, payload) => {
            state.todos.find(element => element.id == payload.id).completed = payload.completed;
        },
        addList: (state, payload) => {
            state.lists.push(payload);
        },
        deleteList: (state, payload) => {
            state.lists = state.lists.filter(element => element.id != payload);
        },
        updateOrder: (state, payload) => {
            payload.forEach(element => state.todos.find(value => value.id == element.id).order = element.order);
        }
    },
    actions: {
        addTODO: (context, payload) => {
            Axios.post('/api/todos', payload).then(res => {context.commit('addTODO', res.data)});
        },
        deleteTODO: (context, payload) => {
            Axios.delete(`/api/todos/del/${payload.id}`).then(res => {if (res.data = 'OK') { context.commit('deleteTODO', payload.id); }});
        },
        changeTODO: (context, payload) => {
            Axios.post('/api/todos/edit', payload).then(res => context.commit('changeTODO', res.data));
        },
        addList: (context, payload) => {
            Axios.post('/api/lists', payload).then(res => {context.commit('addList', res.data)});
        },
        deleteList: (context,payload) => {
            Axios.delete(`/api/lists/del/${payload}`).then(res => {if (res.data = 'OK') { context.commit('deleteList', payload); }});
        },
        updateOrder: ({context, dispatch},payload) => {
            payload.forEach(element => { Axios.post('/api/todos/edit', element) });
        }
    },
    getters: {
        getListsLength: state => {
            return state.lists.length;
        },
        getLists: state => {
            return state.lists;
        },
        getTodos: (state) => (payload) => {
            return state.todos.filter(element => element.list_id == payload);
        }
    }
})