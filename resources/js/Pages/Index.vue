<template>
    <Layout>
        <div class="w-full">
            <div class="flex justify-center">
                <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold text-gray-700">เอกสารประกอบการสอน</h1>
                <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold text-blue-600">(PowerPoint)</h1>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
//import TeachingMaterialCard from "@/Pages/Components/TeachingMaterialCard.vue";
import axios from 'axios';
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {Layout},
    props: {

    },
    data() {

    },
    mounted() {

    },
    methods: {

    },
    watch: {

    },
    computed: {}
};
</script>

<style scoped>
</style>
