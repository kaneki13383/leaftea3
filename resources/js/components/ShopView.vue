<template>
  <div>
    <HeaderComponent></HeaderComponent>
    <Kostyl></Kostyl>
    <div class="d-f">
      <div class="info_product">
        <div v-for="inf in info2" :key="inf">
          <img v-if="(inf.img != null)" :src="inf.img" alt="">
          <img v-else src="img/no-avatar.png" alt="">
          <p>{{inf.name_product}}</p>
        </div>
      </div>
      <div class="info_summ">
        <div v-for="inf in info" :key="inf">
          <p>{{inf.summ}} ₽ / {{inf.count}} гр. </p>
          <button v-on:click="id = inf.id" @click.prevent="del_cart">Удалить из корзины</button>
        </div>
      </div>
    </div>
    <div class="itog">
      <p>Итого: {{totalMoney}}₽</p>
      <button>Оформить заказ</button>
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
            id: '',
            totalMoney: 0,
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
            this.totalMoney = 0;
            for(let i = 0; i < res.data.length; i++ ){
              // console.log(res.data[i]['id_product']);
              id_products.push(res.data[i]['id_product']);
              // console.log(id_products);
              // console.log(res.data[i]['summ']);
              this.totalMoney += res.data[i]['summ'];
            }
            // console.log(totalMoney);
            let formData = new FormData();
            formData.append('id_products', id_products);
            axios.post('/api/product', 
                formData,
              {
                  headers: {
                      'Content-Type': 'multipart/form-data'
                  }
              },
            )
              .then( r => {
                this.info2 = r.data;
                if(this.info2 == null || this.info2 == ''){
                  this.info2 = null
                  this.info = null
                }
              })
              
          })
      },

      del_cart(){
        axios.delete(`/api/deletecart/${ this.id }`)
          .then(res => {
            this.getProductsCart();
            this.totalMoney = this.totalMoney - res.data[0]['summ'];
            console.log();
          })
      },
    }
};
</script>

<style lang="css" scoped>
  div p{
    color: white;
    font-size: 1.5vw;
  }
  div img{
    width: 150px;
    height: 150px;
    border-radius: 50%;
  }
  .d-f{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
    background: #191D21;
    width: 80%;
    margin-left: 8vw;
    margin-top: 5vw;
  }
  .info_product{
    display: flex;
    flex-direction: column;
    gap: 2vw;
    margin-top: 2vw;
    margin-bottom: 2vw;
  }
  .info_product div{
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 10px;
  }
  .info_product div p{
    padding: 20px;
  }
  .info_summ{
    display: flex;
    flex-direction: column;
    gap: 2vw;
    margin-top: 2vw;
    margin-bottom: 2vw;
  }
  .info_summ div{
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 30px;
  }
  .info_summ div p{
    padding-right: 20px;
  }
  .info_summ button{
    width: 250px;
    height: 50px;
    text-decoration: none;
    background-color: transparent;
    border: #9FC926 2px solid;
    color: white;
    font-size: 1.2vw;
    font-family: 'Philosopher', sans-serif;
  }
  .info_summ button:hover{
    background-color: #9FC926;
    color: #191D21;
    transition-duration: 0.5s;
  }
  /**/
  .itog{
    display: flex;
    margin-top: 1.2vw;
    margin-left: 8vw;
  }
  .itog p{
    color: white;
    font-size: 1.7vw;
    font-family: 'Comfortaa', cursive;
    border-bottom: 2px solid #9FC926;
  }
  .itog button{
    width: 250px;
    height: 50px;
    text-decoration: none;
    background-color: transparent;
    border: #9FC926 2px solid;
    color: white;
    font-size: 1.2vw;
    font-family: 'Philosopher', sans-serif;
    margin-top: 1.9vw;
    margin-left: 54.5vw; 
  }
  .itog button:hover{
    background-color: #9FC926;
    color: #191D21;
    transition-duration: 0.5s;
  }
</style>