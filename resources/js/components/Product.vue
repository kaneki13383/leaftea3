<!-- <template>
    <div>
        <p>{{this.info['name_product']}}</p>
        <p>{{this.info['price']}}</p>
        <p>{{this.info['discription']}}</p>
        <img :src="this.info['img']" alt="">
    </div>
</template> -->

<template>
    <div>
      <HeaderComponent></HeaderComponent>
      <Kostyl></Kostyl>
    </div>
    <div class="d-f">
      <div class="info_tea">
        <img :src="this.info['img']" alt="">
      </div>
      <div class="info_block">
        <div class="info_text">
          <h4>{{this.info['name_product']}}</h4>
          <p>{{this.info['discription2']}}</p>
        </div>
        <div class="compound">
          <h5>Состав</h5>
          <ul>
            <li>Ежевика</li>
            <li>Чай черный</li>
            <li>Вереск цветы</li>
            <li>Можжевельник ягоды</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="block">
      <div class="foto_block">
        <img src="img/angliiskiisadovnik1 1.png" alt="">
        <img src="img/angliiskiisadovnik1 1.png" alt="">
        <img src="img/angliiskiisadovnik1 1.png" alt="">
      </div>
      <div class="price">
        <p v-if="this.summ >= this.info['price']">{{this.summ}} ₽/{{this.weight}}гр.</p>
        <p v-else>{{this.info['price']}} ₽/{{this.weight}}гр.</p>
        <div class="btn_price">
          <button @click.prevent="minusProduct">-</button>
          <button @click.prevent="plusProduct">+</button>
          <button>Добавить</button>
        </div>
      </div>
    </div>
    <div class="info_tovar">
      <h3><span>—</span> Описание <span>—</span></h3>
      <p>
        {{this.info['discription']}}
    </p>
    </div>
    <div><FooterView></FooterView></div>
  </template>

<script>

import HeaderComponent from './HeaderComponent.vue';
import Kostyl from './Kostyl.vue';
import FooterView from './FooterView.vue';
export default {
    data () {
        return {
            info: [],
            id: null,
            price: '',
            summ: 0,
            weight: 50
        }
    },
    components: { HeaderComponent, Kostyl, FooterView},
    
    mounted(){                
        this.parseURL()
        this.getProduct()
    },
    
    methods:{
        getProduct(){
            axios.get(`/api/view/${ this.id }`)
            .then(res=> {
                this.info = res.data
                console.log(this.info)
                document.title = this.info['name_product']
                this.summ = this.info['price']
            })
        },

        parseURL(){
            let url = window.location.pathname
            this.id = url.split('/')[2]
            // console.log(this.id)
        },

        plusProduct(){
            if(this.summ < this.price){
                this.summ = this.price
            }            
            else{
                this.price = Number(this.info['price'])
                this.summ = Number(this.summ + this.price)
                this.weight = this.weight + 50
            }
        },
        minusProduct(){
            if(this.summ == this.info['price']){
                this.summ = this.info['price']
            }
            else{
                this.price = Number(this.info['price'])
                this.summ = Number(this.summ - this.price)
                this.weight = this.weight - 50
            }
        }
    }

}
</script>

<style lang="css" scoped>
    .d-f{
  display: flex;
  margin: 2.5vw 100px 0;
  justify-content: space-between;
  column-gap: 9vw;
}
.info_tea img{
  height: 600px;
  width: 600px;
  border-radius: 20vw;
}
.info_block{
  display: flex;
  align-content: center;
  flex-wrap: wrap;
  row-gap: 2vw;
}
.info_text{
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  
}
h4{
  color: white;
  font-size: 1.5vw;
  font-family: 'Comfortaa', sans-serif;
  margin: 0;
}
.info_text p{
  color: white;
  font-family: 'Comfortaa', sans-serif;
  font-size: 1.2vw;
  width:40vw;
  padding-bottom: 1.5vw;
  border-bottom:  #9fc926 2px solid;
}
.compound{
  display: flex;
  align-items: flex-start;
  flex-direction: column;
}
h5{
  color: white;
  font-size: 1.5vw;
  font-family: 'Comfortaa', sans-serif;
  margin: 0;
}
.compound ul{
  margin: 0;
  padding: 0;
  margin-top: 1vw;
}
.compound li{
  color: white;
  font-size: 1.2vw;
  font-family: 'Comfortaa', sans-serif;
  display: inline;
  padding-right: 1.2vw;
  padding-bottom: 1vw;
  border-bottom: #9fc926 2px solid;
}
.block{
    display: flex;
    align-items: center;
    margin: 0 100px 0 50px;
    column-gap: 10vw;
}
.foto_block{
  display: flex;
}
.foto_block img{
  width: 250px;
  height: 250px;
}
.price{
  display: flex;
  flex-direction: column;
}
.price p{
  color: white;
  font-size: 2.5vw;
  font-family: 'Comfortaa', sans-serif;
  margin: 0;
}
.btn_price{
  display: flex;
}
.btn_price button:last-child{
    width: 10vw;
    height: 45px;
    background-color: transparent;
    color:  white ;
    font-size: 1.2vw;
    font-family: 'Philosopher', sans-serif;
    border:  #9fc926 2px solid;
    margin-top: 1.5vh;
    margin-right: 3vw;
}
.btn_price button{
    width: 2vw;
    height: 45px;
    background-color: transparent;
    color:  white ;
    font-size: 1.2vw;
    font-family: 'Philosopher', sans-serif;
    border:  #9fc926 2px solid;
    margin-top: 1.5vh;
    margin-right: 3vw;
}
.btn_price button:hover{
    background-color: #9fc926;
    color: #191D21;
    transition-duration: 0.5s; 
}    
h3{
    color: white;
    text-align: center;
    font-size: 2.5vw;
    margin: 5vw 0;
    font-family: 'Comfortaa', cursive;
}
h3 span{
    color: #9FC926;
}
.info_tovar{
  display: flex;
  flex-wrap: nowrap;
  flex-direction: column;
  align-items: center;
}
.info_tovar p{
  color: white;
  text-align: center;
  font-size: 1.2vw;
  width: 75vw;
  margin: 0;
  font-family: 'Comfortaa', cursive;
}
</style>