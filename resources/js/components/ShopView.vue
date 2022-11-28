<template>
  <div>
    <HeaderComponent></HeaderComponent>
    <Kostyl></Kostyl>
    <div v-for="inf in all" :key="inf">
      <p>{{inf}}</p>
      <!-- <p>{{inf.name_product}}</p> -->
      <!-- <p>{{inf.count}}</p> -->
    </div>
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
            info2: [],
            all: []
        };
    },
    mounted(){    
      document.title = "Корзина"
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
                this.info2 = r.data;
                this.all = this.info;  
                console.log(this.all);
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
    height: 100px;
    border-radius: 25px;
  }
  .d-f{
    display: flex;
    flex-direction: row;
  }
</style>