<template>
    <div class="w-full">
        <div class="w-full bg-custom-color h-10 flex items-center px-4 lg:px-32 fixed top-0 left-0 right-0 z-50">
            <p class="text-white">Phranakhon Si Ayutthaya Rajabhat University</p>
        </div>
        <div class="w-full shadow-md h-20 flex items-center justify-between px-4 lg:px-32 fixed top-10 left-0 right-0 z-50 bg-white">
                <Link
                    :href="route('index')"
                    class="flex items-center">
                    <h1 class="text-4xl font-bold uppercase">ARU</h1>
                    <h1 class="text-4xl font-bold text-custom-color">Teaching Materials</h1>
                </Link>
            <div class="flex gap-2">
                <Link
                    :href="route('index')"
                    class="text-custom-color px-1 py-0.5 border-red-600 border-l-0 border-r-0 border-t-0 border-2 font-bold hidden lg:block mr-8">
                    Home
                </Link>

                <Link
                    :href="route('login')"
                    class="text-custom-color px-1 py-0.5 border-red-600 border-l-0 border-r-0 border-t-0 border-2 font-bold hidden lg:block">
                    Login
                </Link>
            </div>
            <!-- เมนูมือถือ -->
            <div class="block lg:hidden">
                <button @click="toggleMenu" class="text-custom-color">
                    <!-- ไอคอนสำหรับเมนูมือถือ (hamburger icon) -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <!-- เมนูที่จะแสดงเมื่อกดปุ่ม -->
                <div v-if="isMenuOpen" class="absolute bg-white shadow-lg rounded-lg mt-2 right-0">
                    <a href="https://www.aru.ac.th/asi" class="block px-4 py-2 text-custom-color">Home</a>
                    <Link class="block px-4 py-2 text-custom-color" :href="route('login')">Login</Link>
                </div>
            </div>
        </div>
        <div class="mt-32">

        </div>
    </div>
</template>
<script>
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "Nav",
    components: {Link},
     data() {
        return {
            isMenuOpen: false,
        }
    },
    methods: {
        logout() {
            Inertia.post(this.route('logout'));
        },
        toggleMenu() {
            this.isMenuOpen = !this.isMenuOpen;
        }
    }
};
</script>
<style scoped>
    .text-custom-color {
    color: #A01D29;
    }
    .bg-custom-color {
    background-color: #A01D29;
    }
    /* เพื่อให้แน่ใจว่าส่วนหัวคงที่ไม่บดบังเนื้อหาของหน้าเว็บ */
    .mt-32 {
        margin-top: 8rem; /* 2.5rem (h-10) + 5rem (h-20) = 7.5rem, เพิ่มเป็น 8rem */
    }
</style>
