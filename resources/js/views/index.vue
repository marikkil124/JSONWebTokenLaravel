<script setup>
import {computed, onBeforeMount, onBeforeUpdate, onMounted, onUpdated, ref, watch} from "vue";
import allowAccess from "@/allowAccess.js";
import router from "@/router/index.js";
let accessToken = ref(localStorage.getItem('access_token'));
let em = defineEmits(['upd'])

console.log(accessToken)

function logOut(){
    allowAccess().post('/api/auth/logout',{}).then(res=>{
               localStorage.removeItem('access_token')
        router.push('/login')
    })
}

</script>

<script>


</script>
<template>

    <router-link to="/register" class="mr-3.5 text-sky-500 "  v-if="!accessToken" >register</router-link>
    <router-link to="/fruits" class="mr-3.5 text-sky-500 ">Fruits</router-link>
    <router-link to="/login" class="mr-3.5 text-sky-500 "  v-if="!accessToken">Login</router-link>
    <router-link to="/personal" class="mr-3.5 text-sky-500 ">Personal</router-link>
    <router-link to="/logout" class="mr-3.5 text-sky-500 " v-if="accessToken" @click="logOut">Logout</router-link>


    <router-view></router-view>
</template>

<style scoped>

</style>
