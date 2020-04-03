<template lang="pug">
    <div class="text-center">
        <h1>Your TODO lists</h1>
        <input type="text" v-model="newListName" placeholder="Enter new list name"></input></br>
        <span class="add-todo" @click="addList">Add list</span>
        <hr>
    </div>
</template>

<script>
export default {
    name: 'todosHeader',
    data() {
        return { 
            newListName: ''
        }
    },
    methods: {
        addList() {
            this.$store.dispatch('addList', this.newListName);
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
    .add-todo {
        text-decoration: underline;
        cursor: pointer;
    }
    h2 {
           font-family: 'Nunito', sans-serif;
           font-weight: 200;
    }
</style>