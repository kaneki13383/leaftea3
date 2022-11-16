<template>
  <div>
    <HeaderComponent></HeaderComponent>
    <SectionOneComponent></SectionOneComponent>
    <SectionAboutUs></SectionAboutUs><!--Сделанный адаптив о нас-->
    <SectionTopTovar></SectionTopTovar><!--Сделанный адаптив популярные товары-->
    <SectionSubscribe></SectionSubscribe>
    <SectionReviews></SectionReviews><!--Сделанный адаптив отзывы-->
    <FooterView></FooterView>
  </div>
</template>
<script>
import HeaderComponent from "./HeaderComponent.vue";
import SectionOneComponent from "./SectionOneComponent.vue";
import SectionAboutUs from "./SectionAboutUs.vue";
import SectionTopTovar from "./SectionTopTovar.vue";
import SectionSubscribe from "./SectionSubscribe.vue";
import SectionReviews from "./SectionReviews.vue";
import FooterView from "./FooterView.vue";
export default {
  data() {
    return {};
  },
  
  mounted(){    
        document.title = "Главная"
    },
    
  components: {
    HeaderComponent,
    SectionOneComponent,
    SectionAboutUs,
    SectionTopTovar,
    SectionSubscribe,
    SectionReviews,
    FooterView,
  },
};
</script>
<style lang="css" scoped>
header {
  position: absolute;
  z-index: 1000;
}
</style>