<template>
  <div>
    <HeaderComponent></HeaderComponent>
    <Kostyl></Kostyl>
    <div v-for="inf in info, info2" :key="inf">
        <p>{{inf.summ}}</p>
        <p>{{inf.name_product}}</p>
    </div>
  </div>
  <div>

  </div>
  <div><FooterView></FooterView></div>
</template>

<script>
import HeaderComponent from './HeaderComponent.vue';
import Kostyl from './Kostyl.vue';
import FooterView from './FooterView.vue';


export default {
    data() {
        return {            
          info: [],
          info2: []
        };
    },
    mounted(){    
      document.title = "Корзина";
      this.getProductsCart()
    },
    components: { HeaderComponent, Kostyl, FooterView },

    methods:{
      getProductsCart(){        
        let formData = new FormData();
        formData.append('id_user', localStorage.getItem('id'));
        axios.post('/api/getproductcart', 
          formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            },
          )
          .then(res => {
            this.info = res.data;
            let id_products = [];
            for(let i = 0; i < res.data.length; i++ ){
              // console.log(res.data[i]['id_product']);
              id_products.push(res.data[i]['id_product']);
              // console.log(id_products);
            }
            // console.log(id_products);
            let formData = new FormData();
            formData.append('id_products', id_products);
            axios.post('/api/product', 
                formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            },)
              .then( r => {
                this.info2 = r.data
                // console.log();
              })
          })
      }
    }
};
</script>

<style lang="css" scoped>
  div p{
    color: white;
  }
  div img{
    width: 100px;
    height: 200px;
    border-radius: 25px;
  }
</style>