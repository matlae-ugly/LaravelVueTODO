<template>
    <div>
        <todosHeader></todosHeader>
         <hr>
        <div class="text-center h5" v-if="todoListsLength === 0">No lists. Let's create one?</div>
        <todoList></todoList>
       
    </div>
  
</template>

<script>
import todosHeader from './todosHeaderComponent.vue';
import todoList from './todosListComponent.vue';
export default {
    name: 'todosDashboard',
    computed: {
        todoListsLength() { 
            return this.$store.getters.getListsLength;
        }
    },
    components: {
        todosHeader, todoList
    }
}
</script>

<style lang="stylus" scoped>

</style>