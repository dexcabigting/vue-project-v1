<template>
  <h2 class="book-header"> Add book </h2>
  <form @submit.prevent="handleSubmit" class="book-add-form"> 
      <label> Book Title: </label>
      <input class="rounded-input" type="text" required v-model="title">

      <label> Book Author: </label>
      <input class="rounded-input" type="text" required v-model="author">

      <label> Book Category: </label>
      <input class="rounded-input" type="text" required v-model="category">

      <label> Book Description: </label>
      <textarea class="rounded-input" name="" id="" cols="30" rows="10" v-model="description"></textarea>

      <label> Publishing House: </label>
      <input class="rounded-input" type="text" required v-model="publishing_house">

      <label> Publish Date: </label>
      <input class="rounded-input" type="date" required v-model="publishing_date">

      <input class="rounded-input book-add-submit" type="submit" value="Add Book">
  </form>
</template>

<script>
import { toRefs, reactive } from 'vue'

export default {
    emits: ['submitted'],
    setup(props, { emit }){
        const formData = reactive
        ({
            title: 'My Vue Training',
            author: 'Kyle Andrae Mendiola',
            category: 'Web Development',
            description: 'Just a test book',
            publishing_house: 'Bahay_Kyle',
            publishing_date: '2021-01-01',
        })

        function handleSubmit(){
            let fd = new FormData()
            fd.append("title", formData.title)
            fd.append("author", formData.author)
            fd.append("category", formData.category)
            fd.append("description", formData.description)
            fd.append("publishing_house", formData.publishing_house)
            fd.append("publishing_date", formData.publishing_date)

            emit('submitted', fd)
        }

        return { ...toRefs(formData), handleSubmit }
    }
}
</script>

<style>
    .book-add-submit{
        background-color: var(--process-button);
        font-weight: bold;
        margin: 10px auto;
        height: 2.5rem;
        width: 100%;
    }
</style>