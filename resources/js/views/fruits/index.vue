<script setup>
import axios from "axios";
import {ref} from "vue";
import router from "@/router/index.js";
import AllowAccess from "@/allowAccess.js";
let fruits = ref({});

function getFruits() {
    AllowAccess().get('api/auth/fruits', {}).then(
        res => {
            fruits.value = res.data.data;
        }
    );
}



getFruits();

</script>

<template>

    <div class="flex-initial w-64">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center text-sm font-light">
                        <thead
                            class="border-b bg-neutral-50 font-medium dark:border-neutral-500 dark:text-neutral-800">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600"
                            v-for="fruit in fruits">

                            <td>{{ fruit.id }}</td>
                            <td>{{ fruit.name }}</td>
                            <td>{{ fruit.price }}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</template>

<style scoped>

</style>
