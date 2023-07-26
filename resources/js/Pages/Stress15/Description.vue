<script>
export default {
  data() {
    return {
      tab_active: 1,
    };
  },
  methods: {
    updateTab(tab) {
      console.log(tab);
      this.tab_active = tab;
    },
  },
};
</script>
<template>
  <Transition
    enter-from-class="scale-y-0 opacity-0"
    enter-to-class="opacity-100"
    enter-active-class="transition duration-500 origin-top"
    leave-active-class=""
    leave-from-class="opacity-100"
    leave-to-class="scale-y-0 opacity-0"
  >
    <div
      class="max-w-2xl py-2 mx-auto my-6 bg-white rounded-lg shadow font-explanation sm:px-3 lg:px-4"
    >
      <input class="input-none" type="radio" name="tabs" :checked="tab_active === 1" />
      <label class="label-explanation" @click="updateTab(1)" for="tab1">คำชี้แจง</label>

      <input class="input-none" type="radio" name="tabs" :checked="tab_active === 2" />
      <label class="label-explanation" @click="updateTab(2)" for="tab2"
        >คำอธิบายเพิ่มเติม</label
      >

      <Transition
        enter-from-class="scale-y-0 opacity-0"
        enter-to-class="opacity-100"
        enter-active-class="transition duration-500 origin-top"
        leave-active-class=""
        leave-from-class="opacity-100"
        leave-to-class="scale-y-0 opacity-0"
      >
        <section
          v-show="tab_active === 1"
          class="p-4 mt-4 text-base border-t-2 border-gray-200"
        >
          <p>
            <b>ในช่วง 1 เดือนที่ผ่านมา</b>
            ให้ท่านสำรวจตัวท่านเองและประเมินเหตุการณ์
            อาการหรือความคิดเห็นและความรู้สึกของท่านว่าอยู่ในระดับใด
            และตอบลงในช่องคำตอบที่เป็นจริงกับตัวท่านมากที่สุด
          </p>
        </section>
      </Transition>

      <Transition
        enter-from-class="scale-y-0 opacity-0"
        enter-to-class="opacity-100"
        enter-active-class="transition duration-500 origin-top "
        leave-active-class=""
        leave-from-class="opacity-100"
        leave-to-class="scale-y-0 opacity-0"
      >
        <section
          v-show="tab_active === 2"
          class="p-4 mt-4 text-base border-t-2 border-gray-200"
        >
          <p>
            <b>ไม่เลย</b> หมายถึง ไม่เคยมีเหตุการณ์ อาการ ความรู้สึก
            หรือไม่เห็นด้วยกับเรื่องนั้นๆ
          </p>
          <p>
            <b>เล็กน้อย</b> หมายถึง เคยมีเหตุการณ์ อาการ ความรู้สึกในเรื่องนั้น ๆ
            เพียงเล็กน้อยหรือเห็นด้วยกับเรื่องนั้น ๆ เพียงเล็กน้อย
          </p>
          <p>
            <b>มาก</b> หมายถึง เคยมีเหตุการณ์ อาการ ความรู้สึกในเรื่องนั้น ๆ มาก
            หรือเห็นด้วยกับเรื่องนั้น ๆ มาก
          </p>
          <p>
            <b>มากที่สุด</b> หมายถึง เคยมีเหตุการณ์ อาการ ความรู้สึกในเรื่องนั้น ๆ
            มากที่สุด หรือเห็นด้วยกับเรื่องนั้นๆ มากที่สุด
          </p>
        </section>
      </Transition>
    </div>
  </Transition>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
@import url("https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
@import url("https://fonts.googleapis.com/css2?family=Itim&family=Noto+Sans+Thai:wght@400;500;600;700&display=swap");

/* ================================================================ */
.font-explanation {
  font-family: "Noto Sans Thai", sans-serif;
  /* font: 18px/1 'Itim', cursive; */
  font: 400;
  color: #5f5f5f;
}

.section-explanation p {
  margin: 0 0 20px;
  line-height: 1.5;
}

.section-explanation {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

.input-none {
  display: none;
}

.label-explanation {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
  border-radius: 5px;
}

.label-explanation:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 20px;
}

.label-explanation[for*="1"]:before {
  content: "\f1cb";
}

.label-explanation[for*="2"]:before {
  content: "\f0a1";
}

.label-explanation[for*="3"]:before {
  content: "\f16b";
}

.label-explanation[for*="4"]:before {
  content: "\f1a9";
}

.label-explanation:hover {
  color: #888;
  cursor: pointer;
}

.input-none:checked + label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 5px solid rgb(129, 83, 255);
  border-bottom: 1px solid #fff;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
  display: block;
}

@media screen and (max-width: 650px) {
  .label-explanation {
    font-size: 0;
  }

  .label-explanation:before {
    margin: 0;
    font-size: 18px;
  }
}
@media screen and (max-width: 400px) {
  .label-explanation {
    padding: 15px;
  }
}
</style>
