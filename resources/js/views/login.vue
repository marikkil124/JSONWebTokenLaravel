<script setup>
import router from "@/router/index.js";
import {ref} from "vue";

const data = {
    email: '',
    password: '',

}
const error_log =ref('')
function login(){
    axios.post('/api/auth/login',data).then(
        res=> {
            localStorage.setItem('access_token',res.data.access_token);
            router.push('/personal');

        }).catch(error=>{

        error_log.value=error.response.data.error
        console.log(data);
    });
}
</script>

<template>
    <form @submit.prevent="login">
          <div>
            <input placeholder="email" id="email" type="text" v-model="data.email"
                   class="form-input px-4 py-2 rounded-full">
        </div>
        <div>
            <input placeholder="password" id="password" type="password" v-model="data.password"
                   class="form-input px-4 py-2 rounded-full ">
        </div>

        <button type="submit" class="text-sky-500">login</button>
        <div v-if=" error_log" class="text-red-600">{{error_log}}</div>
    </form>

</template>

<style scoped>

</style>
