import { ref } from 'vue'

const deleteBook = (id) => {
    const err = ref(null)

    const load = async () => {
        try {
          let data = await fetch("http://localhost:8000/api/books/" + id, {
            method: 'delete'
          })
          if (!data.ok){
            throw Error("No data available")
          }
  
        }
        catch (err){
          err.value = err.message
          console.log(err.value)
        }
    }

    return { err, load }
}

export default deleteBook