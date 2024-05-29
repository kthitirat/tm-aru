<template>
    <Layout>
        <ProfessorForm :departments="departments" mode="create"/>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import { router } from '@inertiajs/vue3';
import ProfessorForm from '@/Pages/Dashboard/Professor/ProfessorForm.vue';
import SubjectForm from '@/Pages/Dashboard/Subject/SubjectForm.vue';


export default {
    name:"CreateProfessor",
    components:{
        ProfessorForm,
        SubjectForm,
        Layout
    },
    props:{
        departments:{
            type: Array,
            required: true
        },

    }

}
</script>


