<script setup>
import router from "@/router/index.js";
import {ref} from "vue";

const data = {
    name: '',
    email: '',
    password: '',
    password_confirmation: '',

}

let error_log =  ref('')
function store() {
    axios.post('api/users', data).then(
        res =>
        {
            localStorage.setItem('access_token',res.data.access_token)
            router.push('/personal')
        }).catch(error=>{

        error_log.value=error.response.data.error

    });
}

</script>

<template>
    <div>
        <form @submit.prevent="store">
            <div>
                <input placeholder="name" id="name" type="text" v-model="data.name"
                       class="form-input px-4 py-2 rounded-full for ">
            </div>
            <div>
                <input placeholder="email" id="email" type="text" v-model="data.email"
                       class="form-input px-4 py-2 rounded-full">

            </div>
            <div>
                <input placeholder="password" id="password" type="password" v-model="data.password"
                       class="form-input px-4 py-2 rounded-full ">

            </div>
            <div>
                <input placeholder="confirm password" id="password_confirmation" type="password" v-model="data.password_confirmation"
                       class="form-input px-4 py-2 rounded-full ">
            </div>
        <button type="submit">register</button>

        </form>
        <div v-if="error_log"> {error_log}}</div>
    </div>
</template>

<style scoped>

</style>
