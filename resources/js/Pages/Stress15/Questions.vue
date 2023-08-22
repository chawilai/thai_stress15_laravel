<script>
import axios from "axios";
export default {
    data() {
        return {
            totalScore: 0,
            user: {
                user_info: {
                    user_first_name: "อลิซ",
                    user_last_name: "แซมเบอร์ก",
                    user_id_card: 406,
                    user_total: null,
                    user_data: "2023-07-22 11:10:00",
                },
            },
            answered: {},
            questions: [
                {
                    questions_id: 1,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question: "ท่านรู้สึกว่าชีวิตของท่านมีความสุข",
                    selectedAnswer: null,
                },
                {
                    questions_id: 2,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question: "ท่านรู้สึกภูมิใจในตนเอง",
                    selectedAnswer: null,
                },
                {
                    questions_id: 3,
                    never: 3,
                    middle: 2,
                    big: 1,
                    biggest: 0,
                    question:
                        "ท่านต้องไปรับการรักษาพยาบาลเสมอ ๆ เพื่อให้สามารถดำเนินชีวิตและทำงานได้",
                    selectedAnswer: null,
                },
                {
                    questions_id: 4,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question: "ท่านพึงพอใจในรูปร่างหน้าตาของท่าน",
                    selectedAnswer: null,
                },
                {
                    questions_id: 5,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question: "ท่านมีสัมพันธภาพที่ดีกับเพื่อนบ้าน",
                    selectedAnswer: null,
                },
                {
                    questions_id: 6,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question: "ท่านรู้สึกประสบความสำเร็จและความก้าวหน้าในชีวิต",
                    selectedAnswer: null,
                },
                {
                    questions_id: 7,
                    never: 3,
                    middle: 2,
                    big: 1,
                    biggest: 0,
                    question:
                        "ท่านมั่นใจที่จะเผชิญกับเหตุการณ์ร้ายแรงที่เกิดขึ้นในชีวิต",
                    selectedAnswer: null,
                },
                {
                    questions_id: 8,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question:
                        "ถ้าสิ่งต่างๆ ไม่เป็นไปตามที่คาดหวัง ท่านจะรู้สึกหงุดหงิด",
                    selectedAnswer: null,
                },
                {
                    questions_id: 9,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question:
                        "ท่านสามารถปฏิบัติกิจวัตรประจำวันต่าง ๆ ด้วยตัวท่านเอง",
                    selectedAnswer: null,
                },
                {
                    questions_id: 10,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question:
                        "ท่านรู้สึกเป็นสุขในการช่วยเหลือผู้อื่นที่มีปัญหา",
                    selectedAnswer: null,
                },
                {
                    questions_id: 11,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question:
                        "ท่านมีความสุขกับการริเริ่มงานใหม่ๆ และมุ่งมั่นที่จะทำให้สำเร็จ",
                    selectedAnswer: null,
                },
                {
                    questions_id: 12,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question: "ท่านรู้สึกว่าชีวิตของท่านไร้ค่า ไม่มีประโยชน์",
                    selectedAnswer: null,
                },
                {
                    questions_id: 13,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question:
                        "ท่านมีเพื่อนหรือญาติพี่น้องคอยช่วยเหลือท่านในยามที่ท่านต้องการ",
                    selectedAnswer: null,
                },
                {
                    questions_id: 14,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question:
                        "ท่านมั่นใจว่าชุมชนที่ท่านอยู่อาศัยมีความปลอดภัยต่อท่าน",
                    selectedAnswer: null,
                },
                {
                    questions_id: 15,
                    never: 0,
                    middle: 1,
                    big: 2,
                    biggest: 3,
                    question: "ท่านมีโอกาสได้พักผ่อนคลายเครียด",
                    selectedAnswer: null,
                },
                // เพิ่มข้อมูลเพิ่มเติมตามต้องการ
            ],
            totalScore: null,
            assessment: null,
        };
    },
    methods: {
        calculateScore(e, index, choice) {
            let date = new Date();

            this.totalScore = 0;

            this.answered[`question${index + 1}`] = {};

            this.answered[`question${index + 1}`].answer_timestamp = date;
            this.answered[`question${index + 1}`].answer_choice = choice;
            this.answered[`question${index + 1}`].answer_score = e.target.value;

            this.questions
                .map((item) => item.selectedAnswer)
                .filter((item) => item != null)
                .forEach((item) => (this.totalScore += item));
            // console.log(this.totalScore);
            // console.log(this.answered);

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
        calculateTotalSelectedAnswer() {
            return this.questions.reduce((total, question) => {
                if (question.selectedAnswer !== null) {
                    total += parseInt(question.selectedAnswer, 10);
                }
                return total;
            }, 0);
        },

        isAllQuestionsAnswered() {
            return this.questions.every(
                (question) => question.selectedAnswer !== null
            );
        },

        scrollToTop() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        },

        // doSomething() {
        //     // this.scrollToTop()
        //     if (this.isAllQuestionsAnswered()) {
        //         this.totalScore = this.calculateTotalSelectedAnswer();
        //         // ส่วนอื่น ๆ ของฟังก์ชัน doSomething()
        //         Swal.fire({
        //             title: "คะแนนรวม = " + this.totalScore,
        //             text: "ผลการประเมิน: " + this.assessment,
        //             confirmButtonText: "ทำอีกครั้ง",
        //             icon: "success",
        //             didClose: () => {
        //                 // this.scrollToTop()
        //                 window.scrollTo({ top: 0, behavior: "smooth" });
        //             },
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 // ส่ง ข้อมูล
        //                 this.answered = {};
        //                 this.totalScore = 0;

        //                 this.questions.forEach(
        //                     (item, index) =>
        //                         (this.questions[index].selectedAnswer = null)
        //                 );

        //                 fetch("/saveData", {
        //                     totalScore: this.totalScore,
        //                     user: this.user,
        //                     answered: this.answered,
        //                 })
        //                     .then((response) => response.json())
        //                     .then((data) => {
        //                         console.log(data);
        //                     });
        //             }
        //         });
        //     } else {
        //         Swal.fire({
        //             title: "แจ้งเตือน",
        //             text: "โปรดตอบคำถามให้ครบทุกข้อ",
        //             icon: "warning",
        //             confirmButtonText: "ตกลง",
        //             didClose: () => {
        //                 this.scrollToTop();
        //             },
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 // ส่ง ข้อมูล
        //                 // fetch('/saveData', {
        //                 //   totalScore: this.totalScore,
        //                 //   user: this.user,
        //                 //   answered: this.answered,
        //                 // })
        //                 //   .then((response) => response.json())
        //                 //   .then((data) => {
        //                 //     console.log(data);
        //                 //   });
        //             }
        //         });
        //     }
        // },

        Submit() {
            if (this.isAllQuestionsAnswered()) {
                this.totalScore = this.calculateTotalSelectedAnswer();

                const postData = {
                    totalScore: this.totalScore,
                    answered: this.answered
                };

                //console.log(postData);
                axios
                    .post("/saveQuestion", postData)
                    .then((response) => {
                        console.log(response.data);
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            } else {
                Swal.fire({
                    title: "แจ้งเตือน",
                    text: "โปรดตอบคำถามให้ครบทุกข้อ",
                    icon: "warning",
                    confirmButtonText: "ตกลง",
                    didClose: () => {
                        this.scrollToTop();
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ส่ง ข้อมูล
                        // fetch('/saveData', {
                        //   totalScore: this.totalScore,
                        //   user: this.user,
                        //   answered: this.answered,
                        // })
                        //   .then((response) => response.json())
                        //   .then((data) => {
                        //     console.log(data);
                        //   });
                    }
                });
            }
        },
    },
};
</script>

<template>
    <div
        class="max-w-2xl p-4 mx-auto my-6 bg-white rounded-lg shadow sm:px-6 lg:px-8"
    >
        <form @submit.prevent="Submit" action="">
            <div
                v-for="(question, index) in questions"
                :key="index"
                class="pt-4 pb-3 mx-3 border-b-2 border-gray-300"
            >
                <span class="mr-2 font-bold">ข้อที่ {{ index + 1 }} </span
                ><span class="font-medium">{{ question.question }}</span>
                <div class="py-3">
                    <div
                        class="flex flex-col px-2 py-2 md:flex-row sm:w-full lg:w-auto"
                    >
                        <label
                            class="flex items-center h-10 px-2 mr-4 rounded-md cursor-pointer hover:text-white hover:bg-purple-600"
                            :class="{
                                'text-white bg-purple-600':
                                    answered[`question${index + 1}`] &&
                                    answered[`question${index + 1}`]
                                        .answer_score == question.never
                                        ? true
                                        : false,
                            }"
                        >
                            <input
                                class="mr-1 border-2 border-gray-900 checked:border-white hover:border-white animations_input"
                                type="radio"
                                :name="'choice_' + [index + 1]"
                                @change="calculateScore($event, index, 1)"
                                v-model="question.selectedAnswer"
                                :value="question.never"
                            />
                            <span>ไม่เลย</span>
                        </label>
                        <label
                            class="flex items-center h-10 px-2 mr-4 rounded-md cursor-pointer hover:text-white hover:bg-purple-600"
                            :class="{
                                'text-white bg-purple-600':
                                    answered[`question${index + 1}`] &&
                                    answered[`question${index + 1}`]
                                        .answer_score == question.middle
                                        ? true
                                        : false,
                            }"
                        >
                            <input
                                class="mr-1 border-2 border-gray-900 checked:border-white hover:border-white animations_input"
                                type="radio"
                                :name="'choice_' + [index + 1]"
                                @change="calculateScore($event, index, 2)"
                                v-model="question.selectedAnswer"
                                :value="question.middle"
                            />
                            <span>เล็กน้อย</span>
                        </label>
                        <label
                            class="flex items-center h-10 px-2 mr-4 rounded-md cursor-pointer hover:text-white hover:bg-purple-600"
                            :class="{
                                'text-white bg-purple-600':
                                    answered[`question${index + 1}`] &&
                                    answered[`question${index + 1}`]
                                        .answer_score == question.big
                                        ? true
                                        : false,
                            }"
                        >
                            <input
                                class="mr-1 border-2 border-gray-900 checked:border-white hover:border-white animations_input"
                                type="radio"
                                :name="'choice_' + [index + 1]"
                                @change="calculateScore($event, index, 3)"
                                v-model="question.selectedAnswer"
                                :value="question.big"
                            />
                            <span>มาก</span>
                        </label>
                        <label
                            class="flex items-center h-10 px-2 mr-4 rounded-md cursor-pointer hover:text-white hover:bg-purple-600"
                            :class="{
                                'text-white bg-purple-600':
                                    answered[`question${index + 1}`] &&
                                    answered[`question${index + 1}`]
                                        .answer_score == question.biggest
                                        ? true
                                        : false,
                            }"
                        >
                            <input
                                class="mr-1 border-2 border-gray-900 checked:border-white hover:border-white animations_input"
                                type="radio"
                                :name="'choice_' + [index + 1]"
                                @change="calculateScore($event, index, 4)"
                                v-model="question.selectedAnswer"
                                :value="question.biggest"
                            />
                            <span>มากที่สุด</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="my-5 text-center">
                <button
                    class="px-4 py-2 text-white bg-indigo-500 rounded"
                    type="submit"
                >
                    ส่งแบบสอบถาม
                </button>
            </div>
        </form>
    </div>
</template>

<style>
.animations_input[type="radio"] {
    appearance: none;
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    /* border: 2px solid #5c5c5c; */
    border-radius: 50%;
    margin-right: 10px;
    background-color: transparent;
    position: relative;
}

.animations_input[type="radio"]:checked::before {
    content: "";
    display: block;
    width: 11px;
    height: 11px;
    background-color: white;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: appear 0.8s;
}

@keyframes appear {
    0% {
        transform: translate(-50%, -50%) scale(0);
        background-color: #fff;
    }
    45% {
        transform: translate(-50%, -50%) scale(1.6);
        background-color: #fff;
    }
    50% {
        transform: translate(-50%, -50%) scale(1.7);
        background-color: #fff;
    }
    55% {
        transform: translate(-50%, -50%) scale(1.6);
    }
    100% {
        transform: translate(-50%, -50%) scale(1);
        background-color: #fff;
    }
}
</style>

{ "totalScore": 17, "answered": { "question1": { "answer_timestamp":
"2023-08-22T10:27:56.040Z", "answer_choice": 2, "answer_score": "1" },
"question2": { "answer_timestamp": "2023-08-22T10:27:56.490Z", "answer_choice":
2, "answer_score": "1" }, "question3": { "answer_timestamp":
"2023-08-22T10:27:56.864Z", "answer_choice": 2, "answer_score": "2" },
"question4": { "answer_timestamp": "2023-08-22T10:27:57.134Z", "answer_choice":
2, "answer_score": "1" }, "question5": { "answer_timestamp":
"2023-08-22T10:27:57.383Z", "answer_choice": 2, "answer_score": "1" },
"question6": { "answer_timestamp": "2023-08-22T10:27:57.610Z", "answer_choice":
2, "answer_score": "1" }, "question7": { "answer_timestamp":
"2023-08-22T10:27:57.858Z", "answer_choice": 2, "answer_score": "2" },
"question8": { "answer_timestamp": "2023-08-22T10:27:58.106Z", "answer_choice":
2, "answer_score": "1" }, "question9": { "answer_timestamp":
"2023-08-22T10:27:58.342Z", "answer_choice": 2, "answer_score": "1" },
"question10": { "answer_timestamp": "2023-08-22T10:27:58.567Z", "answer_choice":
2, "answer_score": "1" }, "question11": { "answer_timestamp":
"2023-08-22T10:27:58.806Z", "answer_choice": 2, "answer_score": "1" },
"question12": { "answer_timestamp": "2023-08-22T10:27:59.024Z", "answer_choice":
2, "answer_score": "1" }, "question13": { "answer_timestamp":
"2023-08-22T10:27:59.339Z", "answer_choice": 2, "answer_score": "1" },
"question14": { "answer_timestamp": "2023-08-22T10:27:59.589Z", "answer_choice":
2, "answer_score": "1" }, "question15": { "answer_timestamp":
"2023-08-22T10:27:59.839Z", "answer_choice": 2, "answer_score": "1" } } }
