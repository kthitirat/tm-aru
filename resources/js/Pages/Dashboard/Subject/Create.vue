<template>
    <Layout>
        <form @submit.prevent="submit" class="w-full grid grid-cols-3 gap-4">
            <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">รหัสวิชา</span>
                </div>
                <input class="input input-bordered w-full" placeholder="รหัสวิชา" type="text"  />
            </label>
            </div>

            <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">ชื่อวิชา(ภาษาไทย)</span>
                </div>
                <input class="input input-bordered w-full" placeholder="ชื่อวิชา(ภาษาไทย)" type="text"  />
            </label>
            </div>

            <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">ชื่อวิชา(ภาษาอังกฤษ)</span>
                </div>
                <input class="input input-bordered w-full" placeholder="ชื่อวิชา(ภาษาอังกฤษ)" type="text"  />
            </label>
            </div>

            <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">หน่วยกิต</span>
                </div>
                <input class="input input-bordered w-full" placeholder="เช่น 3(3-0-6)" type="text"  />
            </label>
            </div>

            <div class="w-full">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">วันที่เผยแพร่</span>
                </div>
                <input class="input input-bordered w-full" placeholder="" type="date"  />
            </label>
            </div>

            <div class="col-span-3 w-full">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">คำอธิบายรายวิชา</span>
                    </div>
                    <textarea rows="5" placeholder="คำอธิบายรายวิชา" class="textarea textarea-bordered textarea-md w-full" ></textarea>
                </label>

            </div>

            <div class="col-span-3 w-full">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">เลือกอาจารย์</span>
                    </div>
                    <select class="select select-bordered">
                        <option disabled selected>Pick one</option>
                        <option>Star Wars</option>
                        <option>Harry Potter</option>
                        <option>Lord of the Rings</option>
                        <option>Planet of the Apes</option>
                        <option>Star Trek</option>
                    </select>
                </label>
                <div class="w-full flex gap-4 mt-4">
                    <div class="w-40 border flex flex-col pb-2 relative">
                        <img class="object-cover w-full h-40" src="https://www.aru.ac.th/aru-tm/images/IMG_E4314.jpg">
                        <div class="text-xs text-center leading-4 mt-2">
                            <p>อาจารย์ ดร.มรุต กลัดเจริญ</p>
                            <p>คณะวิทยาการจัดการ</p>
                        </div>
                        <button type="button" class="absolute top-1 right-1 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>

                    <div class="w-40 border flex flex-col pb-2 relative">
                        <img class="object-cover w-full h-40" src="https://www.aru.ac.th/aru-tm/images/IMG_E4314.jpg">
                        <div class="text-xs text-center leading-4 mt-2">
                            <p>อาจารย์ ดร.มรุต กลัดเจริญ</p>
                            <p>คณะวิทยาการจัดการ</p>
                        </div>
                        <button type="button" class="absolute top-1 right-1 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-span-3 w-full flex gap-2">
                <span class="label-text">เอกสาร</span>
            </div>

            <div class="col-span-3 w-full flex gap-2">
                <div class="w-40 border border-dashed flex flex-col pb-2 relative">
                            <div class="h-24 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>

                            </div>
                            <div class="text-xs text-center leading-4 mt-2">
                                <p>ชื่อ file kdkdkd.pdf</p>
                            </div>
                            <button type="button" class="absolute top-1 right-1 text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                </div>
                <button class="w-40 border border-dashed flex flex-col pb-2 justify-center items-center">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
             </div>
             <div class="col-span-3 w-full flex justify-end">
                <button class="uppercase btn btn-primary">
                    Submit
                </button>
             </div>

        </form>
    </Layout>

</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";


export default {
    name:"SubjectCreate",
    components:{
        Layout
    },
    // data(){
    //     return{
    //         form:{

    //         }
    //     }
    // },
    methods:{

    }
}
</script>


