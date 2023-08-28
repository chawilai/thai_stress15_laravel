<script>
import axios from "axios";
import { Link, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import Banner from "./Banner.vue";
import EmotionsSVG from "./icon/EmotionsSVG.vue";
import ForwarderSVG from "./icon/ForwarderSVG.vue";

export default {
    components: {
        Banner,
        EmotionsSVG,
        ForwarderSVG,
    },
    data() {
        const page = usePage();
        const getID = computed(() => page.props.id);
        const getTotalScore = computed(() => page.props.totalScore);
        const getAssessment = computed(() => page.props.assessment);
        return {
            id: getID,
            totalScore: getTotalScore,
            //totalScore: 12,
            assessment: getAssessment,
            user_data: [],
        };
    },
    methods: {
        fetchUserAnswerData() {
            axios
                .get("/getUserAnswerData", {
                    params: {
                        id: this.id,
                    },
                })
                .then((response) => {
                    //console.log(response.data);
                    this.user_data = response.data;
                    console.log(this.user_data);
                })
                .catch((error) => console.log(error));
        },
        Submit() {
            const postData = {
                id: this.id,
                totalScore: this.totalScore,
            };
            console.log("XXXXXXXX");
            router.post("/printForwarder", postData);
        },
    },
    mounted() {
        this.fetchUserAnswerData();
    },
    computed: {
        textColor() {
            if (this.totalScore >= 0 && this.totalScore <= 20) {
                return "#fdc500";
            } else if (this.totalScore >= 21 && this.totalScore <= 40) {
                return "#00a896";
            } else if (this.totalScore >= 44 && this.totalScore <= 60) {
                return "#028090";
            } else {
                return "#05668d";
            }
        },
    },
};
</script>
<template>
    <div class="h-full min-h-screen bg-slate-100">
        <!-- <ScreenIndicator /> -->
        <Banner />
        <div
            class="max-w-2xl p-4 mx-auto my-6 bg-white border border-gray-400 rounded-lg shadow sm:px-6 lg:px-8"
        >
            <div class="flex flex-col space-y-4 font-prompt">
                <div class="rounded-lg">
                    <div class="flex flex-col items-center justify-center">
                        <div class="text-3xl text-gray-800">
                            <span>สรุปคะแนน</span>
                        </div>
                        <div
                            class="flex text-8xl pt-2 items-center justify-center"
                        >
                            <span
                                class="text-gray-800 font-extrabold"
                                :style="{ color: textColor }"
                                >{{ totalScore }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="border mt-4 border-gray-400"></div>
                <div class="rounded-lg">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex flex-row">
                            <div class="pr-2">
                                <div class="relative h-10 w-10 animate-bounce">
                                    <div
                                        class="mx-auto h-16 w-16 animate-pulse rounded-full bg-lime-200"
                                    ></div>
                                    <span
                                        class="absolute flex h-5 w-5 animate-spin"
                                    >
                                        <span
                                            class="h-4 w-4 rounded-full bg-lime-400"
                                        >
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <EmotionsSVG class="w-44 h-auto" />
                        </div>
                        <div class="text-3xl py-4 text-gray-800">
                            <span>ผลการประเมิน </span>
                        </div>
                        <div
                            class="w-full text-5xl py-2 text-center font-bold"
                            :style="{ color: textColor }"
                        >
                            <span>{{ assessment }} </span>
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class="border border-gray-400"></div>
                <div class="flex flex-row justify-center">
                    <div class="m-2 items-center justify-center">
                        <button
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                            type="submit"
                            @click="Submit"
                        >
                            <ForwarderSVG />
                            <span>พิมพ์ใบส่งต่อ</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<!-- [
{
    id: 62,
    info_id: 49,
    questions_id: 1,
    answer_no: 0,
},
{
    id: 63,
    info_id: 49,
    questions_id: 2,
    answer_no: 1,
},
{
    id: 64,
    info_id: 49,
    questions_id: 3,
    answer_no: 2,
},
{
    id: 65,
    info_id: 49,
    questions_id: 4,
    answer_no: 1,
},
{
    id: 66,
    info_id: 49,
    questions_id: 5,
    answer_no: 1,
},
{
    id: 67,
    info_id: 49,
    questions_id: 6,
    answer_no: 1,
},
{
    id: 68,
    info_id: 49,
    questions_id: 7,
    answer_no: 2,
},
{
    id: 69,
    info_id: 49,
    questions_id: 8,
    answer_no: 1,
},
{
    id: 70,
    info_id: 49,
    questions_id: 9,
    answer_no: 1,
},
{
    id: 71,
    info_id: 49,
    questions_id: 10,
    answer_no: 1,
},
{
    id: 72,
    info_id: 49,
    questions_id: 11,
    answer_no: 1,
},
{
    id: 73,
    info_id: 49,
    questions_id: 12,
    answer_no: 1,
},
{
    id: 74,
    info_id: 49,
    questions_id: 13,
    answer_no: 1,
},
{
    id: 75,
    info_id: 49,
    questions_id: 14,
    answer_no: 1,
},
{
    id: 76,
    info_id: 49,
    questions_id: 15,
    answer_no: 2,
},
]; -->
