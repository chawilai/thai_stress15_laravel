<script>
import axios from "axios";
export default {
    data() {
        return {
            user_info: {
                name: "อลิซ แซมเบอร์ก",
                phone: "0988888888",
                uic: "อซ123456",
            },
        };
    },
    methods: {
        Submit() {
            const postData = {
                name: this.user_info.name,
                phone: this.user_info.phone,
                uic: this.user_info.uic,
            };
            axios
                .post("/save_user_info", postData)
                // .then((response) => {
                //     console.log(response.data);
                // })
                // .catch((error) => {
                //     console.log(response.error);
                // });
        },
    },
};
</script>
<template>
    <div
        class="max-w-2xl p-4 mx-auto my-6 bg-white rounded-lg shadow sm:px-6 lg:px-8"
    >
        <form @submit.prevent="Submit" action="">
            <div class="pt-4 pb-3 mx-3 border-b-2 border-gray-300">
                <span class="mr-2 font-bold"> ทำแบบสอบถาม </span>
                <div class="py-3">
                    <div
                        class="flex flex-col px-2 py-2 md:flex-row sm:w-full lg:w-auto"
                    ></div>
                </div>
            </div>
            <div class="my-5 text-center">
                <button
                    class="px-4 py-2 text-white bg-indigo-500 rounded"
                    type="submit"
                >
                    ต่อไป
                </button>
            </div>
        </form>
    </div>
</template>
<style></style>
