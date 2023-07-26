<template>
    <div class="h-full min-h-screen bg-slate-100">
        <!-- <ScreenIndicator /> -->
        <Banner />
        <main>
            <Description />
            <Questions />
        </main>
    </div>
</template>

<script>
import Questions from "./Questions.vue";
import Description from "./Description.vue";
import Banner from "./Banner.vue";
import ScreenIndicator from "./extra/ScreenIndicator.vue";

export default {
    components: {
        Questions,
        Description,
        ScreenIndicator,
        Banner,
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Itim&family=Noto+Sans+Thai:wght@400;500;600;700&display=swap");

main,
header {
    font-family: "Noto Sans Thai", sans-serif;
    font-size: 20px;
    color: #676a6c;
    font-weight: normal;
}
</style>
