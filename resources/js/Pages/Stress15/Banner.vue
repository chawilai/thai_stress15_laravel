<template>
  <header>
    <div
      class="flex items-center justify-center bg-[url('../assets/imgs/medical_banner.jpg')] h-32 bg-cover bg-center bg-origin-border sm:py-10 md:py-24 lg:py-34 xl:py-32 2xl:py-36"
    >
      <h2
        class="text-sm font-extrabold text-blue-600 sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl 2xl:text-6xl"
      >
        ดัชนีชี้วัดความสุขคนไทยฉบับ 15 ข้อ
      </h2>
    </div>
  </header>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Itim&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Itim&family=Noto+Sans+Thai:wght@400;500;600;700&display=swap");

.sheader {
  text-align: center;
  width: 100%;
  height: auto;
  background-size: cover;
  background-attachment: fixed;
  position: relative;
  overflow: hidden;
  border-radius: 0 0 85% 85% / 30%;
}
.sheader .overlay {
  width: 100%;
  height: 100%;
  padding: 40px;
  color: #6984f8;
  text-shadow: 1px 2px 1px #333;
  /* background-image: linear-gradient( 135deg, #9f05ff69 10%, #fd5e086b 100%); */
  background-image: url("../assets/imgs/medical_banner.jpg");
}

.overlay h2 {
  font-family: "Noto Sans Thai", sans-serif;
  font-size: 40px;
  text-decoration: underline;
  margin-bottom: 30px;
}

@media screen and (min-width: 1536px) {
  header .overlay {
    background-image: url("../assets/imgs/medical_banner.jpg");
    background-position: -20px -160px;
    padding: 100px;
    background-size: cover;
  }

  .overlay h2 {
    font-size: 70px;
  }
}

@media screen and (max-width: 1280px) {
  header .overlay {
    background-image: url("../assets/imgs/medical_banner.jpg");
    background-position: -20px -160px;
    padding: 100px;
    background-size: cover;
  }

  .overlay h2 {
    font-size: 70px;
  }
}

@media screen and (max-width: 1024px) {
  header .overlay {
    background-image: url("../assets/imgs/medical_banner.jpg");
    background-position: -20px -60px;
    background-size: cover;
  }
}

@media screen and (max-width: 640px) {
  header .overlay {
    background-image: url("../assets/imgs/medical_banner.jpg");
    background-position: -20px -60px;
    background-size: cover;
  }
}
</style>
