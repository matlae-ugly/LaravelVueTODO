<template lang="pug">
    <div class="d-flex flex-column">
        <div>
            <draggable v-model='todosData' :sort="true" :options="{handle:'.area'}" @start="drag=true" @end="drag=false" v-bind:group="list_id">
                <div class="d-flex todo" v-for="todo in todosData" v-bind:key="todo.id">
                    <div class="d-flex w-100 px-3 pt-2">
                        <div class="col-8" style="overflow-x: auto;">
                            <div class="pretty p-svg p-bigger p-curve mt-3">
                                <input v-model="todo.completed" @change="changeTODO(todo.id, todo.completed)" type="checkbox" />
                                <div class="state p-success">
                                    <svg class="svg svg-icon" viewBox="0 0 20 20">
                                        <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                    </svg>
                                    <div><label v-bind:class="{completed : todo.completed}" style="">{{ todo.name }}</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex flex-row-reverse">
                            <box-icon name="move" class="labelc area mt-auto" color="black"></box-icon>
                            <box-icon name='x' color="red" class="mt-auto" animation='tada-hover' @click="deleteTODO(todo.id)"></box-icon>
                        </div>
                    </div>
                </div>                
            </draggable>
        </div>
        <div v-if="todosData.length == 0" class="text-center">No TODOs :(</div>
        <div class="mt-4">
            <div class="text-center pt-1">
                <input type="text"  @keyup.enter="addTODO" v-model="newTODO" placeholder="New TODO name"><br>
                <span class="add-todo" @click="addTODO">Add todo</span>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';

export default {
    name: 'todos',
    props: ['list_id'],
    data() {
        return {
            newTODO: ''
        }
    },
    computed: {
        todosData: {
            get() {
                return this.$store.getters.getTodos(this.list_id).sort((a,b) => {if (a.order > b.order) {return 1} else {return -1}});
            }, 
            set(value) {
                value = value.map((element,index) => {return {name: element.name, id: element.id, order: index, completed: element.completed}});
                this.$store.commit('updateOrder', value);
                this.$store.dispatch('updateOrder', value);
            }
        }
    },
    methods: {
        addTODO: function() {
            this.$store.dispatch('addTODO', {name: this.newTODO, list_id: this.list_id, completed: false, order: this.todosData.length});
            this.newTODO = '';
        },
        deleteTODO: function(id) {
            this.$store.dispatch('deleteTODO', {id: id});
        },
        changeTODO: function(id, completed) {
            this.$store.dispatch('changeTODO', {id: id, completed: completed});
        }
    },
    components: {
        draggable
    }
}
</script>

<style scoped>
    .labelc {
        cursor: move;
    }
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