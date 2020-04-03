<template lang="pug">
    <div class="w-100"> 
        <div class="list mt-3" v-for="list in lists"> 
            <div class="d-flex">
                <div class="mb-auto w-100">
                   
                        <div class="text-center"><span class="h5 font-weight-bold">
                            {{ list.name }}</span>
                            (<span @click="deleteList(list.id)" class="deleteList">delete list</span>)
                        </div>
                
                    <hr>
                    <todos v-bind:listID="list.id"></todos>
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
        }
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
    .deleteList {
        cursor: pointer;
        text-decoration: underline;
    }
    .list {
        margin: 0 5%;
        display: inline-block;
        width: 40%;
    }
</style>