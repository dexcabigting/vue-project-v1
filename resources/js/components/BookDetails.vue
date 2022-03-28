<template>
  <div v-if="selectedBook?.value && !editMode" class="book-view-wrapper">
      <h2 class="book-header">{{ selectedBook.value.data.title }}</h2>
      <p> Author: {{ selectedBook.value.data.author }}</p>
      <p> Category: {{ selectedBook.value.data.category }}</p>
      <p> Description: {{ selectedBook.value.data.description }}</p>
      <p> Publishing House: {{ selectedBook.value.data.publishing_house }}</p>
      <p> Date published: {{ selectedBook.value.data.publishing_date }}</p>
      <p> Entry created at: {{ selectedBook.value.data.created_at }}</p>
      <p> Entry last updated at: {{ selectedBook.value.data.updated_at }}</p>
      <div class="book-view-buttons">
        <button @click="updateFormData()" class="edit-button rounded-input"> Edit </button>
        <button @click="deleteBook(selectedBook.value.data.id)" class="delete-button rounded-input"> Delete </button>
      </div>
  </div>
  <div v-else-if="selectedBook?.value && editMode" class="book-view-wrapper">
      <h2 class="book-header"> Edit "{{ selectedBook.value.data.title }}"</h2>
      <form method="POST" @submit.prevent="updateBook" name="updateForm"> 
      <label> Book Title: </label>
      <input class="rounded-input" type="text" required v-model="title">

      <label> Book Author: </label>
      <input class="rounded-input" type="text" required v-model="author">

      <label> Book Category: </label>
      <input class="rounded-input" type="text" required v-model="category">

      <label> Book Description: </label>
      <textarea class="rounded-input" id="" cols="30" rows="10" v-model="description"></textarea>

      <label> Publishing House: </label>
      <input class="rounded-input" type="text" required v-model="publishing_house">

      <label> Publish Date: </label>
      <input class="rounded-input" type="date" required v-model="publishing_date">
      <input class="rounded-input" type="submit" value="Update Book">
  </form>
      <div class="book-update-buttons">
        <button @click="editMode = false" class="cancel-button rounded-input"> Cancel </button>
      </div>
  </div>
  <div v-else class="book-view-wrapper">
      <h2 class="book-header"> Book Title </h2>
      <slot></slot>
  </div>
</template>

<script>
import { ref, toRefs, reactive, watch } from "vue"

export default {
    props: [ 'selectedBook' ],
    emits: [ 'deleteClicked', 'updateClicked' ],
    setup(props, { emit }){

        const editMode = ref(false)

        const formData = reactive
        ({
            title: '',
            author: '',
            category: '',
            description: '',
            publishing_house: '',
            publishing_date: '',
        })

        const updateFormData = () => {
            editMode.value = true
            formData.title = props.selectedBook.value.data.title
            formData.author = props.selectedBook.value.data.author
            formData.category = props.selectedBook.value.data.category
            formData.description = props.selectedBook.value.data.description
            formData.publishing_house = props.selectedBook.value.data.publishing_house
            formData.publishing_date = props.selectedBook.value.data.publishing_date
        }

        const updateBook = () => {
            editMode.value = false
            emit('updateClicked', props.selectedBook.value.data.id, handleSubmit())
        }

        const deleteBook = (id) => {
            emit('deleteClicked', id)
            props.selectedBook.value = null
        }

        function handleSubmit(){
            let fd = new FormData()
            fd.append("title", formData.title)
            fd.append("author", formData.author)
            fd.append("category", formData.category)
            fd.append("description", formData.description)
            fd.append("publishing_house", formData.publishing_house)
            fd.append("publishing_date", formData.publishing_date)

            return fd
        }

        // Turn off edit mode when selecting another book in booklist.vue
        watch(() => props.selectedBook, () => {
            editMode.value = false
        })
        
        return { ...toRefs(formData), deleteBook, updateBook, updateFormData , editMode }
    }
}

</script>

<style>
    .book-view-wrapper{
        margin: 0 auto;
        width: 500px;
    }
    .book-view-buttons{
        display: flex;
        justify-content: space-evenly;
    }
    .book-update-buttons{
        display: flex;
    }
    .book-update-buttons > *{
        flex-grow: 1;
        padding: 10px 0;
        font-weight: bold;
    }
    input[value="Update Book"], .edit-button{
        background-color: var(--process-button);
        padding: 10px 1.5rem;
        font-weight: bold;

    }
    .cancel-button , .delete-button{
        background-color: var(--hot-button);
        padding: 10px 1.5rem;
        font-weight: bold;
    }
</style>