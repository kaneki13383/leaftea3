<template>
  <div>
    <HeaderComponent></HeaderComponent>
    <Kostyl></Kostyl>
    <SectionAboutUs></SectionAboutUs><!--Сделанный адаптив-->
    <sectionInfo></sectionInfo><!--Сделанный адаптив-->
    <FooterView></FooterView>
  </div>
</template>
<script>
import HeaderComponent from './HeaderComponent.vue';
import Kostyl from './Kostyl.vue';
import SectionAboutUs from './SectionAboutUs.vue';
import SectionInfo from './SectionInfo.vue';
import FooterView from './FooterView.vue'
export default {
  data() {
      return {};
  },
  
  mounted(){    
        document.title = "О нас"
  },

  components: { HeaderComponent, Kostyl, SectionAboutUs,SectionInfo,FooterView }
}
</script>
<style lang="css" scoped>

</style>