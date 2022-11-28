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
          <button class="add" v-else @click="addCart">Добавить</button>
          
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
            <span><router-link to="/login">Войдите</router-link> в аккаунт чтобы добавить товар в корзину!</span>
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

        addCart(){
          let formData = new FormData();
            formData.append('id_user', localStorage.getItem('id'));
            formData.append('id_product', this.id);
            formData.append('count', this.weight);
            formData.append('summ', this.summ);
            // formData.append('', )
          axios.post('/api/addproduct',
          formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            },
          )
          .then(res =>{
            // console.log(res);
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
        translateY: '150px',
        translateX: '30px',
        opacity: 0
      }, { complete: done })
    },



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
  margin-top: -60vh;
  padding: 0.7vw;
  color: #842029;
  font-size: 1.3rem;
  font-family: 'Comfortaa', sans-serif;
}
/* @media screen and (max-width: 1500px) {
  .modal{
    margin-top: -31vw;
  }
} */
.modal a{
  border-bottom: 2px solid #842029;
}
.close{
  background-image: url('/img/xxx.png');
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
    /* justify-content: center; */
    /* margin: 0 100px 0 50px; */
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
@media screen and (max-width: 1440px) {
  .info_tea img{
    width: 400px;
    height: 400px;
  }
  .foto_block img{
    width: 180px;
    height: 180px;
  }
}
@media screen and (max-width: 1300px) {
  .info_tea img{
    width: 350px;
    height: 350px;
  }
  .foto_block img{
    width: 150px;
    height: 150px;
  }
  .btn_price .add{
    width: 125px;
    height: 35px;
  }
  .btn_price button{
    height: 35px;
    font-size: 1.5vw;
  }
}
@media screen and (max-width: 1200px) {
  .btn_price .add{
    width: 200px;
    height: 45px;
    font-size: 2vw;
  }
  .btn_price button{
    width: 3vw;
    height: 45px;
    font-size: 2vw;
  }
  .info_tovar p{
    font-size: 1.5vw;
    width:90vw;
  }
  h3{
    margin: 5vw 0 3vw;
  }
  .info_text p{
    font-size: 1.3vw;
    width:45vw;
  }
  .compound{
    display: flex;
    align-items: flex-start;
    flex-direction: column;
  }
  .compound li{
    font-size: 1.3vw;
  }
}
@media screen and (max-width: 1024px) {
  .info_tea img{
    width: 300px;
    height: 300px;
  }
  .foto_block img{
    width: 125px;
    height: 125px;
  }
  h4{
    font-size: 1.7vw;
  }
  .info_text p{
    font-size: 1.3vw;
    width:40vw;
  }
  h5{
    font-size: 1.7vw;
  }
  .compound li{
    color: white;
    font-size: 1.2vw;
  }
  .block {
    display: flex;
    justify-content: center;
  }
}
@media screen and (max-width: 1000px) {
  .compound{
    display: none;
  }
  .block {
    display: flex;
    justify-content: center;
  }
  h4{
    font-size: 2vw;
  }
  .info_text p{
    font-size: 1.5vw;
    width:40vw;
  }
  .info_tea img{
    width: 250px;
    height: 250px;
  }
  .foto_block img{
    width: 110px;
    height: 100px;
  }
  .info_tovar p{
  font-size: 1.7vw;
}
}
@media screen and (max-width: 960px) {
  .btn_price .add{
    width: 150px;
    height: 35px;
    font-size: 2vw;
  }
  .block {
    display: flex;
    justify-content: center;
  }
  .btn_price button{
    width: 3vw;
    height: 35px;
    font-size: 2vw;
  }
  .price p{
  font-size: 2.5vw;
}
}
@media screen and (max-width: 740px) {
  .btn_price .add{
    width: 150px;
    height: 35px;
    font-size: 2.5vw;
  }
  .btn_price button{
    width: 3vw;
    height: 35px;
    font-size: 2.5vw;
  }
  .block {
    display: flex;
    justify-content: center;
  }
  .price p{
  font-size: 3.5vw;
}
h4{
    font-size: 3vw;
  }
  .info_text p{
    font-size: 2vw;
    width:40vw;
  }
  h3{
    margin: 5vw 0 3vw;
    font-size: 3vw;
  }
  .info_tovar p{
    font-size: 2.5vw;
  }
}
@media screen and (max-width: 730px) {
  .d-f{
    display: flex;
    margin: 2.5vw 100px 0;
    justify-content: center;
    column-gap: 9vw;
    flex-wrap: wrap;
    flex-direction: column;
    align-content: space-around;
    align-items: center;
  }
  .block {
    display: flex;
    justify-content: center;
  }
  h4{
    font-size: 3vw;
    text-align: center;
  }
  .info_text p{
    font-size: 2.5vw;
    text-align: center;
    width: 600px;
}
.info_text {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 5vw;
    row-gap: 2vw;
}
.info_tea img{
    width: 250px;
    height: 250px;
    margin: 5vw 0;
  }
  .btn_price .add{
    width: 150px;
    height: 40px;
    font-size: 3vw;
  }
  .btn_price button{
    width: 4vw;
    height: 40px;
    font-size: 3vw;
  }
  .price p{
  font-size: 5vw;
}
.block {
    column-gap: 5vw;
}
.info_tovar p{
    font-size: 2.2vw;
  }
}
@media screen and (max-width: 700px) {
  .block {
    column-gap: 2vw;
}
.block {
    display: flex;
    justify-content: center;
  }
.price p{
  font-size: 4vw;
}
.btn_price .add{
    width: 125px;
    height: 40px;
    font-size: 3vw;
  }
  .btn_price button{
    width: 4vw;
    height: 40px;
    font-size: 3vw;
  }
}
@media screen and (max-width: 640px) {
  .info_text p{
    font-size: 2.2vw;
    text-align: center;
    width: 550px;
  }
  .block {
    display: flex;
    justify-content: center;
  }
  .btn_price .add{
    width: 100px;
    height: 40px;
    font-size: 2.7vw;
  }
  .btn_price button{
    width: 4vw;
    height: 40px;
    font-size: 3vw;
  }
}
@media screen and (max-width: 600px) {
  .block {
    flex-direction: column;
  }
  .price {
    flex-direction: row;
    column-gap: 5vw;
    align-items: center;
    margin-top: 5vw;
  } 
  .price p {
    font-size: 5vw;
  }
  .btn_price .add{
    width: 125px;
    height: 40px;
    font-size: 3vw;
  }
  .btn_price button{
    width: 4vw;
    height: 40px;
    font-size: 3vw;
  }
  h4 {
    font-size: 3.5vw;
    text-align: center;
  }
.info_text p {
    font-size: 2.5vw;
    text-align: center;
    width: 500px;
  }
  h3{
    font-size: 3.5vw;
  }
.info_tovar p {
    font-size: 2.2vw;
    width: 500px;
    margin-top: 2.5vw;
  }
}
@media screen and (max-width: 565px) {
  .price p {
    font-size: 4.5vw;
  }
  .block {
    display: flex;
    justify-content: center;
  }
}
@media screen and (max-width: 531px) {
.price{
  flex-direction: column;
  
}
.block {
    display: flex;
    justify-content: center;
  }
.price p{
  font-size: 5vw;
  }
.btn_price .add{
    width: 150px;
    height: 35px;
    font-size: 4vw;
  }
  .btn_price button{
    width: 35px;
    height: 35px;
    font-size: 4vw;
  }
  .block{
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .info_text p {
    font-size: 2.2vw;
    text-align: center;
    width: 450px;
  }
  h4 {
    font-size: 3vw;
    text-align: center;
  }
  h3{
    font-size: 3vw;
  }
.info_tovar p {
    font-size: 2.2vw;
    width: 450px;
    margin-top: 2.5vw;
  }
  .info_tea img {
    border-radius: 50vw;
}
}
@media screen and (max-width: 426px) {
  .info_tea img{
    width: 200px;
    height: 200px;
    margin: 5vw 0;
    border-radius: 75vw;
  }
  .block {
    display: flex;
    justify-content: center;
  }
  h4 {
    font-size: 4.5vw;
    text-align: center;
  }
  .info_text p {
    font-size: 2.5vw;
    text-align: center;
    width: 350px;
  }
  h3{
    font-size: 4.5vw;
  }
.info_tovar p {
    font-size: 2.5vw;
    width: 350px;
    margin-top: 2.5vw;
  }
}
@media screen and (max-width: 425px) and (min-width: 376px) {
  .block {
    display: flex;
    justify-content: center;
  }
  h4 {
    font-size: 4.5vw;
    text-align: center;
  }
  .info_text p {
    font-size: 3.5vw;
    text-align: center;
    width: 350px;
  }
  h3{
    font-size: 4.5vw;
  }
.info_tovar p {
    font-size: 3vw;
    width: 325px;
    margin-top: 2.5vw;
  }
  .price p{
  font-size: 6vw;
  }
.btn_price .add{
    width: 150px;
    height: 35px;
    font-size: 5vw;
  }
  .btn_price button{
    width: 35px;
    height: 35px;
    font-size: 5vw;
  }
  .foto_block img{
    width: 100px;
    height: auto;
  }
}
@media screen and (max-width: 375px) and (min-width: 321px) {
  .block {
    display: flex;
    justify-content: center;
  }
  h4 {
    font-size: 4.5vw;
    text-align: center;
  }
  .info_text p {
    font-size: 3.5vw;
    text-align: center;
    width: 350px;
  }
  h3{
    font-size: 4.5vw;
  }
.info_tovar p {
    font-size: 3.2vw;
    width: 275px;
    margin-top: 2.5vw;
  }
  .price p{
  font-size: 6vw;
  }
.btn_price .add{
    width: 150px;
    height: 35px;
    font-size: 5vw;
  }
  .btn_price button{
    width: 35px;
    height: 35px;
    font-size: 5vw;
  }
  .foto_block img{
    width: 100px;
    height: auto;
  }
}
@media screen and (max-width: 320px) {
  .block {
    display: flex;
    justify-content: center;
  }
  h4 {
    font-size: 4.5vw;
    text-align: center;
  }
  .info_text p {
    font-size: 3.2vw;
    text-align: center;
    width: 300px;
  }
  h3{
    font-size: 4.5vw;
  }
.info_tovar p {
    font-size: 3.4vw;
    width: 250px;
    margin-top: 2.5vw;
  }
  .price p{
  font-size: 6vw;
  }
.btn_price .add{
    width: 150px;
    height: 35px;
    font-size: 5vw;
  }
  .btn_price button{
    width: 35px;
    height: 35px;
    font-size: 5vw;
  }
  .foto_block img{
    width: 100px;
  }
  
}
</style>


