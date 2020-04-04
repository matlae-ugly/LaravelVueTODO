<template lang="pug">
    <div class="text-center">
        <h1>Your TODO lists</h1>
        <form @submit="addList">
            <input required type="text" maxlength="25" v-model="newListName" placeholder="Enter new list name"></br>
            <button type="submit" class="btn add-todo" >Add list</button>
        </form>
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
        addList(e) {
            
            this.$store.dispatch('addList', {name: this.newListName});
            e.preventDefault();
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