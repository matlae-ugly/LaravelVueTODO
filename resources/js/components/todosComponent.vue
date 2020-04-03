<template lang="pug">
    <div>
        <div v-for="todo in todosData">
            <div class="row px-3">
                <div class="col-8">
                    <div class="pretty p-svg p-bigger p-curve p-tada mt-3">
                        <input v-model="todo.completed" type="checkbox" />
                        <div class="state p-success">
                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                            </svg>
                            <label v-bind:class="{completed : todo.completed}">{{ todo.name }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex flex-row-reverse">
                    <box-icon name='x' color="red" class="mt-auto" animation='tada-hover' @click="deleteTODO(todo.id)"></box-icon>
                </div>
            </div>
        </div> 
        <div class="text-center mt-2">
            <input type="text" v-model="newTODO" placeholder="New TODO name"><br>
            <span class="add-todo" @click="addTODO">Add todo</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'todos',
    props: ['listID'],
    data() {
        return {
            newTODO: ''
        }
    },
    computed: {
        todosData() {
            return this.$store.getters.getTodos(this.listID);
        }
    },
    methods: {
        addTODO: function() {
            this.$store.dispatch('addTODO', {name: this.newTODO, listID: this.listID});
        },
        deleteTODO: function(id) {
            this.$store.dispatch('deleteTODO', {id: id, listID: this.listID});
        }
    }
}
</script>

<style scoped>
    input {
        border: 0;
        text-align: center;
        outline: 0;
        background: transparent;
        border-bottom: 1px solid #555;
    }
    .completed {
        text-decoration: line-through; 
    }
    .add-todo {
        text-decoration: underline;
        cursor: pointer;
    }
    box-icon {
        cursor: pointer;
    }
</style>