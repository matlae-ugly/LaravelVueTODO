<template lang="pug">
    <div class="w-100 lists"> 
        <div class="d-inline-block mx-2 list border p-4 mb-3 bg-white shadow h-100 w-100" v-for="list in lists"> 
            <div class="">
                <div class="w-100">
                        <div class="text-center">
                            <div class="h5 listname font-weight-bold">
                                {{ list.name }}
                                <span class="font-weight-normal">
                                        (<span @click="deleteList(list.id)" class="deleteList">delete list</span>)
                                </span>
                            </div>
                          
                            <hr>
                        </div>
                    <todos v-bind:list_id="list.id"></todos>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
import todos from './todosComponent.vue';

export default {
    name: 'todosList',
    computed: {
        lists() {
            return this.$store.getters.getLists;
        },
    },
    methods: {
        deleteList(id) { 
            this.$store.dispatch('deleteList', id)
        }
    },
    components: {todos}
}
</script>

<style scoped>
    .lists { 
        column-count: 1; 
    }
    @media only screen and (min-width: 800px) {
        .lists {
            column-count: 2; 
            column-gap: 10px;
        }
    }
    @media only screen and (min-width: 1200px) {
        .lists {
            column-gap: 50px;
        }
    }
    .deleteList {
        cursor: pointer;
        text-decoration: underline;
    }
    .listname {
        overflow-x: auto;
    }
    .list {
        margin: 0 5%;
        display: inline-block;
        width: 40%;
    }
</style>