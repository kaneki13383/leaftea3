<template>
  <div>
    <HeaderComponent></HeaderComponent>
    <Kostyl></Kostyl>
    <SectionSales></SectionSales>
    <SectionTopTovar></SectionTopTovar><!--Сделанный адаптив-->
    <SectionCatalog></SectionCatalog><!--Сделанный товар-->
    <SectionTovar></SectionTovar><!--Сделанный адаптив-->
    <FooterView></FooterView>
  </div>
</template>

<script>
import HeaderComponent from './HeaderComponent.vue';
import Kostyl from './Kostyl.vue';
import SectionSales from './SectionSales.vue';
import SectionTopTovar from './SectionTopTovar.vue';
import SectionCatalog from './SectionCatalog.vue';
import SectionTovar from './SectionTovar.vue';
import FooterView from './FooterView.vue';


export default {
    data() {
        return {};
    },
    mounted(){    
      document.title = "Каталог"
    },
    components: { HeaderComponent, Kostyl,SectionSales, SectionTopTovar, SectionCatalog, SectionTovar, FooterView }
};
</script>

<style lang="css" scoped>

</style>