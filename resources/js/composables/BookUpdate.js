import { ref } from 'vue'

const updateBook = (id, formData) => {
    const error = ref(null)

    const load = async () => {
        try {
            formData.append("_method", 'PUT')


            let data = await fetch("/api/books/" + id, {
                method: 'POST',
                body: formData
            })
            if (!data.ok){
                throw Error("Sumthin went wrong")
            }
            console.log(data)
        } 
        catch (err) {
            error.value = err.message
            console.log(error.value)
        }
    }
    return { error, load }
}

export default updateBook