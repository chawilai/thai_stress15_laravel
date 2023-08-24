<?php

//- แบบประเมิน
//  - เก็บค่า
//     - name
//     - phone
//     - uic
//     - choice
//     - score
// - questions
//         - id
//         - no
//         - title
// - answers
//         - id
//         - question_id
//         - no
//         - title
//         - value

// - user_answers_info
//     - id
//     - name
//     - phone
//     - uic
//     - submited_at

// - user_answer_data
//     - id
//     - info_id
//     - question_id
//     _ answer_no


// ท่านรู้สึกว่าชีวิตของท่านมีความสุข
// ท่านรู้สึกภูมิใจในตนเอง
// ท่านต้องไปรับการรักษาพยาบาลเสมอ ๆ เพื่อให้สามารถดำเนินชีวิตและทำงานได้
// ท่านพึงพอใจในรูปร่างหน้าตาของท่าน
// ท่านมีสัมพันธภาพที่ดีกับเพื่อนบ้าน
// ท่านรู้สึกประสบความสำเร็จและความก้าวหน้าในชีวิต
// ท่านมั่นใจที่จะเผชิญกับเหตุการณ์ร้ายแรงที่เกิดขึ้นในชีวิต
// ถ้าสิ่งต่างๆ ไม่เป็นไปตามที่คาดหวัง ท่านจะรู้สึกหงุดหงิด
// ท่านสามารถปฏิบัติกิจวัตรประจำวันต่าง ๆ ด้วยตัวท่านเอง
// ท่านรู้สึกเป็นสุขในการช่วยเหลือผู้อื่นที่มีปัญหา
// ท่านมีความสุขกับการริเริ่มงานใหม่ๆ และมุ่งมั่นที่จะทำให้สำเร็จ
// ท่านรู้สึกว่าชีวิตของท่านไร้ค่า ไม่มีประโยชน์
// ท่านมีเพื่อนหรือญาติพี่น้องคอยช่วยเหลือท่านในยามที่ท่านต้องการ
// ท่านมั่นใจว่าชุมชนที่ท่านอยู่อาศัยมีความปลอดภัยต่อท่าน
// ท่านมีโอกาสได้พักผ่อนคลายเครียด

// <form @submit.prevent="Submit" action="">
//             <div
//                 v-for="(question, index) in questions"
//                 :key="index"
//                 class="pt-4 pb-3 mx-3 border-b-2 border-gray-300"
//             >
//                 <!-- <p>Request Data: {{ requestData }}</p> -->
//                 <span class="mr-2 font-bold">ข้อที่ {{ index + 1 }} </span
//                 ><span class="font-medium">{{ question.question }}</span>
//                 <div class="py-3">
//                     <div
//                         class="flex flex-col px-2 py-2 md:flex-row sm:w-full lg:w-auto"
//                     >
//                         <label
//                             class="flex items-center h-10 px-2 mr-4 rounded-md cursor-pointer hover:text-white hover:bg-purple-600"
//                             :class="{
//                                 'text-white bg-purple-600':
//                                     answered[`question${index + 1}`] &&
//                                     answered[`question${index + 1}`]
//                                         .answer_score == question.never
//                                         ? true
//                                         : false,
//                             }"
//                         >
//                             <input
//                                 class="mr-1 border-2 border-gray-900 checked:border-white hover:border-white animations_input"
//                                 type="radio"
//                                 :name="'choice_' + [index + 1]"
//                                 @change="calculateScore($event, index, 1)"
//                                 v-model="question.selectedAnswer"
//                                 :value="question.never"
//                             />
//                             <span>ไม่เลย</span>
//                         </label>
//                         <label
//                             class="flex items-center h-10 px-2 mr-4 rounded-md cursor-pointer hover:text-white hover:bg-purple-600"
//                             :class="{
//                                 'text-white bg-purple-600':
//                                     answered[`question${index + 1}`] &&
//                                     answered[`question${index + 1}`]
//                                         .answer_score == question.middle
//                                         ? true
//                                         : false,
//                             }"
//                         >
//                             <input
//                                 class="mr-1 border-2 border-gray-900 checked:border-white hover:border-white animations_input"
//                                 type="radio"
//                                 :name="'choice_' + [index + 1]"
//                                 @change="calculateScore($event, index, 2)"
//                                 v-model="question.selectedAnswer"
//                                 :value="question.middle"
//                             />
//                             <span>เล็กน้อย</span>
//                         </label>
//                         <label
//                             class="flex items-center h-10 px-2 mr-4 rounded-md cursor-pointer hover:text-white hover:bg-purple-600"
//                             :class="{
//                                 'text-white bg-purple-600':
//                                     answered[`question${index + 1}`] &&
//                                     answered[`question${index + 1}`]
//                                         .answer_score == question.big
//                                         ? true
//                                         : false,
//                             }"
//                         >
//                             <input
//                                 class="mr-1 border-2 border-gray-900 checked:border-white hover:border-white animations_input"
//                                 type="radio"
//                                 :name="'choice_' + [index + 1]"
//                                 @change="calculateScore($event, index, 3)"
//                                 v-model="question.selectedAnswer"
//                                 :value="question.big"
//                             />
//                             <span>มาก</span>
//                         </label>
//                         <label
//                             class="flex items-center h-10 px-2 mr-4 rounded-md cursor-pointer hover:text-white hover:bg-purple-600"
//                             :class="{
//                                 'text-white bg-purple-600':
//                                     answered[`question${index + 1}`] &&
//                                     answered[`question${index + 1}`]
//                                         .answer_score == question.biggest
//                                         ? true
//                                         : false,
//                             }"
//                         >
//                             <input
//                                 class="mr-1 border-2 border-gray-900 checked:border-white hover:border-white animations_input"
//                                 type="radio"
//                                 :name="'choice_' + [index + 1]"
//                                 @change="calculateScore($event, index, 4)"
//                                 v-model="question.selectedAnswer"
//                                 :value="question.biggest"
//                             />
//                             <span>มากที่สุด</span>
//                         </label>
//                     </div>
//                 </div>
//             </div>
//             <div class="my-5 text-center">
//                 <button
//                     class="px-4 py-2 text-white bg-indigo-500 rounded"
//                     type="submit"
//                 >
//                     ส่งแบบสอบถาม
//                 </button>
//             </div>
//         </form>
?>
