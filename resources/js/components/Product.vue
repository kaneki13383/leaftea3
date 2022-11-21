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
          <button v-if="!token" class="add" id="show-modal" @click="showFunc">Добавить</button>
          <button class="add" v-else>Добавить</button>
          
        </div>
      </div>
    </div>
    <transition
    v-on:before-enter="beforeEnter"
    v-on:enter="enter"
    v-on:leave="leave"
    v-bind:css="false">
          <div class="modal" v-if="showModal">
            <div class="close" @click="showModal = false"></div>
            <span><router-link to="/login"> Войдите </router-link> в аккаунт чтобы добавить товар в корзину!</span>
          </div>
    </transition>
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
            weight: 50,
            showModal: false,
            token: ''
        }
    },
    components: { HeaderComponent, Kostyl, FooterView},
    
    mounted(){                
        this.parseURL()
        this.getProduct()
        this.getToken()
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
        showFalse(){
          this.showModal = false
        },
        showFunc(){
          this.showModal = setTimeout(this.showFalse, 5500)
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
        },
        getToken(){
          this.token = localStorage.getItem('x_xsrf_token')
        },

        beforeEnter: function (el) {
      el.style.opacity = 0
      el.style.transformOrigin = 'left'
    },
    enter: function (el, done) {
      Velocity(el, { opacity: 1, fontSize: '1.2em' }, { duration: 300 })
      Velocity(el, { fontSize: '1em' }, { complete: done })
    },
    leave: function (el, done) {
      Velocity(el, { translateX: '15px', rotateZ: '50deg' }, { duration: 600 })
      Velocity(el, { rotateZ: '100deg' }, { loop: 3 })
      Velocity(el, {
        rotateZ: '45deg',
        translateY: '30px',
        translateX: '30px',
        opacity: 0
      }, { complete: done })
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
.modal{
  width: 400px;
  height: 80px;
  background: #f8d7da;
  border: 2px solid #f5c2c7;
  position: fixed;
  float: right;
  z-index: 5;
  margin-top: -15vw;
  padding: 0.7vw;
  color: #842029;
  font-size: 1.3rem;
  font-family: 'Comfortaa', sans-serif;
}
.close{
  background-image: url('/img/xx.png');
  background-size: 100%;
  background-repeat: no-repeat;
  cursor: pointer;
  float: right;
  width: 25px;
  height: 25px;
  margin: 0.5vw;
  z-index: 3;
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
.price span a{
  border-bottom: 2px solid #9FC926;
}
.btn_price{
  display: flex;
}
.btn_price .add{
    width: 200px;
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