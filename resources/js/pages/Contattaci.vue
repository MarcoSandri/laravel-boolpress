<template>
    <div class="container">
        <h1>Contattaci</h1>

        <form @submit.prevent="sendForm">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                </div>
                <input type="text" class="form-control" id="name" name="name" v-model="name" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                <input type="email" class="form-control" id="email" name="email" v-model="email" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Messaggio</span>
                </div>
                <textarea class="form-control" id="message" name="message" v-model="message" aria-label="With textarea"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>

        </form>
    </div>
</template>

<script>
export default {
    name: 'Contattaci',
    data() {
        return {
            name: '',
            email: '',
            message: '',
        }
    },
    methods: {
        sendForm() {

            axios.post('/api/contacts',{
                'name' : this.name,
                'email' : this.email,
                'message' : this.message
            }).then(response => {
                console.log(response);
            });
        }
    }
}
</script>

<style>

</style>