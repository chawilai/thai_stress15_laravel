<script>
import axios from "axios";
import { Link, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

export default {
    data() {
        const page = usePage();
        const getID = computed(() => page.props.id);
        return {
            id: getID,
            totalScore: 0,
            assessment: "",
            user_data: [],
        };
    },
    methods: {
        calculateScore() {
            if (this.totalScore >= 0 && this.totalScore <= 20) {
                this.assessment = "มีความสุขน้อยกว่าคนทั่วไป ";
            } else if (this.totalScore >= 21 && this.totalScore <= 40) {
                this.assessment = "มีความสุขเท่ากับคนทั่วไป ";
            } else if (this.totalScore >= 44 && this.totalScore <= 60) {
                this.assessment = "มีความสุขมากกว่าคนทั่วไป ";
            } else {
                this.assessment = "สุขภาพดีมาก";
            }
        },
        fetchUserAnswerData() {
            axios
                .get("/getUserAnswerData", {
                    params: {
                        id: this.id,
                    },
                })
                .then((response) => {
                    console.log(response.data);
                    this.user_data = response.data;
                })
                .catch((error) => console.log(error));
        },
    },
    mounted() {
        this.fetchUserAnswerData();
    },
};
</script>

<template>
    <div
        class="max-w-2xl p-4 mx-auto my-6 bg-red-300 rounded-lg shadow sm:px-6 lg:px-8"
    >
        <div class="">
            <h1>New Page</h1>
            <div class="">
                <label for="">
                    <span>User ID {{ id }}</span>
                    <span>คะแนนรวม = </span>
                    <span>ผลการประเมิน:</span>
                </label>
            </div>
        </div>
    </div>
</template>
