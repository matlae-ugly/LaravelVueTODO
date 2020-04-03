import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        lists: []
    },
    mutations: {
        loadLists: state => {
            state.lists = [
                {id: 1, name: 'toda', todos: [{id: 1, name:'la', completed: false},{id: 2, name:'la1', completed: true}, {id: 3, name:'awdd', completed:false}]},
                {id: 2, name: 'toda', todos: [{id: 4, name:'la', completed: false},{id: 5, name:'la1', completed: true}]},
                {id: 3, name: 'toda', todos: [{id: 6, name:'la', completed: false},{id: 7, name:'la1', completed: true}]},
            ];
        },
        addTODO: (state,payload) => {
            state.lists.find(element => element.id == payload.listID).todos.push({id: 5, name: payload.name, completed:false});
        },
        deleteTODO: (state, payload) => {
            state.lists.find(element => element.id == payload.listID).todos =
            state.lists.find(element => element.id == payload.listID).todos.filter(element => element.id != payload.id);
        },
        addList: (state,payload) => {
            state.lists.push({id:4, name:payload, todos: []});
        },
        deleteList: (state, payload) => {
            state.lists = state.lists.filter(element => element.id != payload);
        }
    },
    actions: {
        addTODO: (context, payload) => {
            context.commit('addTODO', payload);
        },
        deleteTODO: (context, payload) => {
            context.commit('deleteTODO', payload);
        },
        addList: (context,payload) => {
            context.commit('addList', payload);
        },
        deleteList: (context,payload) => {
            context.commit('deleteList', payload);
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
            return state.lists.find(element => element.id == payload).todos;
        }
    }
})