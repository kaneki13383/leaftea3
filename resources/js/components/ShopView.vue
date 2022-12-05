<template>
  <div>
    <HeaderComponent></HeaderComponent>
    <Kostyl></Kostyl>
    <p v-if="(info == '' || info == null)" class="empty_cart">Корзина пуста</p>
    <div v-else style="display: flex; flex-direction: column; align-items: center; gap: 5vw;">
      <div class="d-f">
        <div class="info_product">
          <div v-for="inf in info2" :key="inf" >
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
      <div>
        <input v-model="adress" class="adress" type="text" v-if="show == 'on'" placeholder="Введите адрес доставки">
      </div>
    </div>   

    <div class="itog">
      <p>Итого: {{totalMoney}}₽</p>
      <button v-on:click="show = 'on'" v-if="show == ''">Оформить заказ</button>
      <button v-else-if="show == 'on'" @click.prevent="addOrder">Оформить заказ</button>
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
            show: '',
            adress: ''
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
              id_products.push(res.data[i]['id_product']);
              this.totalMoney += res.data[i]['summ'];
            }
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

      addOrder(){
        let id_products = [];
        let count = [];
        let summ = [];
        for( let i = 0; i < this.info.length; i++){
          id_products.push(this.info[i]['id_product'])
          count.push(this.info[i]['count'])
          summ.push(this.info[i]['summ'])
        }
        let formData = new FormData();
        formData.append('id_user', localStorage.getItem('id'));
        formData.append('adress', this.adress);
        formData.append('total', this.totalMoney);
        formData.append('summ', summ);
        formData.append('count', count);
        formData.append('id_products', id_products);
        axios.post('/api/addOrder',
          formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            },
          )
          .then(res => {
            this.getProductsCart()
          })
      }
    }
};
</script>

<style lang="css" scoped>
  .empty_cart{
    text-align: center;
    margin: 5vw 0;
  }
  .adress{
    height: 50px;
    width: 500px;
    background: transparent;
    border: 2px solid #9FC926;
    font-size: 1vw;
    font-family: 'Comfortaa', cursive;
    color: white;
  }
  input::placeholder{
        color: white;
        font-size: 1vw;
        font-family: 'Comfortaa', cursive;
    }
  div p{
    color: white;
    font-size: 1.5vw;
  }
  div img{
    width: 150px;
    height: 150px;
    border-radius: 50%;
  }
  .info_product div, .info_summ div{
      height: 180px;
    }
  .d-f{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    background: #191D21;
    width: 80%;
    margin-top: 5vw;
  }
  .info_product{
    display: flex;
    flex-direction: column;
    gap: 2vw;
    margin-top: 2vw;
    margin-bottom: 2vw;
  }
  .info_product div, .info_summ div{
    border-bottom: 2px #9FC926 solid;
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
    width: 80%;
    justify-content: space-between;
  }
  .itog p{
    color: white;
    font-size: 1.7vw;
    font-family: 'Comfortaa', cursive;
    border-bottom: 2px solid #9FC926;
    
    white-space: nowrap;
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
    
    white-space: nowrap; 
  }
  
  .itog button:hover{
    background-color: #9FC926;
    color: #191D21;
    transition-duration: 0.5s;
  }
  @media screen and (max-width: 1024px) {

    .info_product div, .info_summ div{
      height: 180px;
    }
    .info_product , .info_summ, .info_summ button {
      font-size: 14px;
    }
    .info_summ button{
      width: 190px;
    }
    .info_product img{
      width: 120px;
      height: 120px;
    }
    .itog{
      width: 80%;
      justify-content: space-between;
    }
    .itog button{
      font-size: 20px;
      margin-left: 0px;
      
    }
    .itog p{
      font-size: 20px;
    }
  }
  @media screen and (max-width: 768px) {
    .info_product img{
      width: 100px;
      height: 100px;
    }    
    .info_summ button{
      width: 120px;
      font-size: 14px;
    }
    .info_product p, .info_summ p{
      font-size: 14px;
    }
  }
  @media screen and (max-width: 425px) {
    .info_product div{
      display: flex;
      flex-direction: column;
      flex-wrap: nowrap;
      margin: 0px;
    } 
    .info_product img, .info_product p{
      margin: 0px;
    }
    .info_product div, .info_summ div{
      margin: 0px;
      padding: 0;
    }
    .itog p, .itog button{
      font-size: 14px;
    }
    .itog button{
      width: 150px;
    }
  }
  @media screen and (max-width: 375px) {
    .info_product div{
      display: flex;
      flex-direction: column;
      flex-wrap: nowrap;
      margin: 0px;
    } 
    .info_product img, .info_product p{
      margin: 0px;
      padding-left: 0px;
    }
    .info_product div, .info_summ div{
      margin: 0px;
      padding: 0;
    }
    .info_summ p{
      width: 60px;
    }
    .info_summ button{
      max-width: 80px;
      font-size: 12px;
    }
    .d-f{
      width: 100%;
      margin: 0px;
      padding: 0px;
      justify-content: none;
    }
    .info_product p, .info_summ p{
      font-size: 12px;
    }
    .itog p, .itog button{
      font-size: 14px;
    }
    .itog button{
      width: 150px;
    }
    .itog{
      margin-left: 10vw;
    }
  }
  @media screen and (max-width: 320px) {
    .itog{
      width: 90%;
      margin: 5vw;
    }
    
  }
</style>