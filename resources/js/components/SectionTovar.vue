<template>
  <section class="top_tovar">
      <h3><span>—</span> Товары <span>—</span></h3>
      <div class="tovar-2">
        <div class="tea" v-for="inf in info" v-bind:key="inf">
          <div class="info_tea">
            <img :src="inf.img" alt="">
            <h4>{{ inf.name_product }}</h4>
            <p>{{inf.price}} ₽/50гр.</p>
            <router-link :to="{ path: '/product/'+inf.id }">View Product</router-link>
          </div>
        </div>         
      </div>
      <div class="btn">
          <button class="butt_more">Подробнее</button>
      </div>            
  </section>
</template>
<script>
export default {
    data() {
        return {
          info: []
        };
    },

    mounted(){
      axios.get('/api/products')
      .then(res =>(
          this.info = res.data,
          console.log(res.data)
      ))
    },
}
</script>
<style lang="css" scoped>
  h3{
      color: white;
      text-align: center;
      font-size: 2.5vw;
      margin: 8vw 0;
      font-family: 'Comfortaa', cursive;
  }
  h3 span{
      color: #9FC926;
  }
  .btn{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .tovar-2{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 6vw;
  }
  .tea{
      background-color: #191D21;
      box-shadow: black 14px 14px 8px 4px;
      width: 22rem;
      height: 27rem;
      color: white;
  }
  .info_tea{
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0vw;
      font-family: 'Comfortaa', cursive;
      margin-top: -5vw;
  }
  .info_tea img{
        width: 15rem;
        height: 15rem;  
        border-radius: 10vw;
  }
  .info_tea h4{
      font-size: 1.25vw;
  }
  .info_tea p{
      font-size: 1vw;
  }
  .info_tea a{
      width: 180px;
      height: 50px;
      text-decoration: none;
      background-color: transparent;
      border: #9FC926 2px solid;
      color: white;
      font-size: 1.2vw;
      font-family: 'Philosopher', sans-serif;
  }
  .info_tea a:hover{
      background-color: #9FC926;
      color: #191D21;
      transition-duration: 0.5s;
  }
  .butt_more{
      margin-top: 10vh;
      width: 180px;
      height: 50px;
      text-decoration: none;
      background-color: transparent;
      border: #9FC926 2px solid;
      color: white;
      font-size: 1.2vw;
      font-family: 'Philosopher', sans-serif;
      margin-bottom: 5vh;
  }
  .butt_more:hover{
      background-color: #9FC926;
      color: #191D21;
      transition-duration: 0.5s;
  }
  @media screen and (max-width: 1500px){
      
      .info_tea{
          margin-top: -8vw;
      }
      .info_tea h4{
         font-size: 1.5vw; 
         margin: 0vw;
         margin-top: -1vw;
      }
      .info_tea p{
         font-size: 1.5vw; 
      }
      .info_tea button{
         font-size: 2vw; 
      }
      .butt_more{
          font-size: 3vw;
          width: 22vw;
          height: 5vw;

      }
  }
@media screen and (max-width: 1500px) {
 
  h3{
      font-size: 2.5;
  }
}
@media screen and (max-width: 1300px) {
  .tea{
      height: 26vw;
  }
  h3{
      font-size: 3vw;
  }
  .info_tea img{
      width: 22vw;
  }
  .butt_more{
       margin-top: 5vw;
  }
}
@media screen and (max-width: 1200px) {
  .tovar-2{
      flex-wrap: wrap;
  }
}
@media screen and (max-width: 1500px){
      
      .info_tea{
          margin-top: -8vw;
      }
      .info_tea h4{
         font-size: 1.5vw; 
         margin: 0vw;
         margin-top: -1vw;
      }
      .info_tea p{
         font-size: 1.5vw; 
      }
      .info_tea button{
         font-size: 2vw; 
      }
    .butt_more{
        font-size: 3vw;
        width: 22vw;
        height: 5vw;

    }
    .tea{
        width: 20rem;
        height: 22rem;
    }
    .tea img{
        width: 18rem;
        height: 18rem;
    }
    .tovar-2{
        column-gap: 4vw;
        row-gap: 0vw;
    }
  }
  @media screen and (max-width: 1500px){
    .tovar-2{
        column-gap: 2.5vw;
        row-gap: 0vw;
    }
  }
  @media screen and (max-width:1440px) {
    .info_tea button{
        font-size: 1.7vw; 
        width: 150px;
        height: 40px;
    }
    .butt_more{
        margin-top: 6vw;
        width: 250px;
        height: 60px;
        font-size: 2.5vw;
    }
  }
  @media screen and (max-width: 1380px){
    .tovar-2{
        column-gap: 10vw;
        row-gap: 10vw;
    }
    .info_tea button{
        font-size: 1.7vw; 
        width: 125px;
        height: 40px;
    }
    .butt_more{
        margin-top: 8vw;
        width: 225px;
        height: 60px;
        font-size: 2.5vw;
    }
  }
  @media screen and (max-width: 1300px){
    .tovar{
        column-gap: 7vw;
        row-gap: 10vw;
    }
    .info_tea button{
        font-size: 1.9vw; 
        width: 125px;
        height: 40px;
    }
    .butt_more{
        margin-top: 8vw;
        width: 225px;
        height: 60px;
        font-size: 2.7vw;
    }
  }
  @media screen and (max-width: 1220px){
    .tovar-2{
        column-gap: 6vw;
        row-gap: 10vw;
    }
    .info_tea button{
        font-size: 1.9vw; 
        width: 125px;
        height: 40px;
    }
    .butt_more{
        margin-top: 8vw;
        width: 225px;
        height: 60px;
        font-size: 2.7vw;
    }
  }
  @media screen and (max-width: 1120px){
    .tovar-2{
        column-gap: 15vw;
        row-gap: 10vw;
    }
    .info_tea button{
        font-size: 2vw; 
        width: 125px;
        height: 40px;
    }
    .butt_more{
        margin-top: 10vw;
        width: 225px;
        height: 60px;
        font-size: 3vw;
    }
  }
  @media screen and (max-width:1080px){
    .info_tea h4{
        font-size: 2vw; 
    }
      .info_tea p{
        font-size: 2vw; 
    }
    .tea{
        width: 20rem;
        height: 23.5rem;
    }
    .info_tea button{
        font-size: 2.2vw; 
        width: 125px;
        height: 45px;
    }
    .butt_more{
        margin-top: 10vw;
        width: 225px;
        height: 60px;
        font-size: 3.2vw;
    }
  }
  @media screen and (max-width:1040px) {
    .info_tea button{
        font-size: 2.5vw; 
        width: 125px;
        height: 45px;
    }
    .butt_more{
        margin-top: 10vw;
        width: 225px;
        height: 60px;
        font-size: 3.5vw;
    }
    
  }
  @media screen and (max-width:1000px) {
    .info_tea button{
        font-size: 2.5vw; 
        width: 125px;
        height: 45px;
    }
    .butt_more{
        margin-top: 10vw;
        width: 225px;
        height: 60px;
        font-size: 3.5vw;
    }
  }
  @media screen and (max-width:960px){
    .tea img{
        margin-top: -4vw;
        width: 20rem;
        height: 20rem;
    }
    .tea{
        width: 20rem;
        height: 22rem;
    }
    .info_tea h4{
        margin: 0vw;
        margin-top: -3.5vw;
    }
    .tovar-2{
        margin-top: 15vw;
        column-gap: 12vw;
        row-gap: 15vw;
    }
    h3{
        font-size: 4vw;
    }
    .info_tea button{
        font-size: 2.8vw; 
        width: 125px;
        height: 45px;
    }
    .butt_more{
        margin-top: 12.5vw;
        width: 225px;
        height: 60px;
        font-size: 3.7vw;
    }
  }
  @media screen and (max-width:920px) {
    .info_tea button{
        font-size: 2.8vw; 
        width: 125px;
        height: 45px;
    }
    .butt_more{
        margin-top: 12.5vw;
        width: 225px;
        height: 60px;
        font-size: 4vw;
    }
  }
  @media screen and (max-width:860px) {
    .info_tea h4{
        font-size: 2.5vw; 
    }
      .info_tea p{
        font-size: 2.5vw; 
    }
    .tea{
        width: 20rem;
        height: 23.5rem;
    }
    .info_tea button{
        font-size: 3vw; 
        width: 125px;
        height: 45px;
    }
    .butt_more{
        margin-top: 12.5vw;
        width: 225px;
        height: 50px;
        font-size: 4vw;
    }
  }
  @media screen and (max-width:800px) {
    .tovar-2{
        margin-top: 20vw;
        column-gap: 8vw;
        row-gap: 16vw;
    }
    .tea img{
        margin-top: -6vw;
    }
    .tea{
        width: 20rem;
        height: 22.5rem;
    }
    .butt_more{
        width: 250px ;
        height: 60px;
        font-size: 4vw;
    }
    .info_tea button{
        font-size: 3.5vw; 
        width: 125px;
        height: 45px;
    }
    .butt_more{
        margin-top: 12.5vw;
        width: 225px;
        height: 50px;
        font-size: 4vw;
    }
  }
  @media screen and (max-width: 740px) {
    .tovar-2{
        column-gap: 5vw;
        row-gap: 16vw;
    }
    .info_tea h4{
        font-size: 2.7vw; 
    }
      .info_tea p{
        font-size: 2.7vw; 
    }
    .info_tea button{
        font-size: 3.5vw; 
        width: 125px;
        height: 45px;
    }
    .butt_more{
        margin-top: 12.5vw;
        width: 225px;
        height: 50px;
        font-size: 4vw;
    }
  }
  @media screen and (max-width:700px){
    .tovar-2{
        margin-top: 16vw;
        column-gap: 10vw;
        row-gap: 18vw;
    }
    .info_tea h4{
        font-size: 2.8vw; 
    }
      .info_tea p{
        font-size: 2.8vw; 
    }
    .tea{
        width: 20rem;
        height: 23.5rem;
    }
    h3{
        font-size: 5vw;
    }
    .info_tea button{
        font-size: 3.5vw; 
        width: 115px;
        height: 45px;
    }
    .butt_more{
        margin-top: 12.5vw;
        width: 225px;
        height: 50px;
        font-size: 4vw;
    }
  }
  @media screen and (max-width:680px){
    .info_tea h4{
        font-size: 3.5vw; 
    }
      .info_tea p{
        font-size: 3.5vw; 
    }
    .info_tea button{
        font-size: 4vw; 
        width: 130px;
        height: 45px;
    }
    .tea{
        width: 20rem;
        height: 25.5rem;
    }
    .butt_more{
        font-size: 5vw;
        width: 220px;
        height: 55px;
        margin-top: 15vw;
    }
  }
  @media screen and (max-width:640px){
    .info_tea h4{
        font-size: 3.5vw; 
    }
      .info_tea p{
        font-size: 3.5vw; 
    }
    .info_tea button{
        font-size: 4vw; 
        width: 130px;
        height: 45px;
    }
    .tea{
        width: 20rem;
        height: 25.5rem;
    }
    .butt_more{
        font-size: 5vw;
        width: 220px;
        height: 55px;
        margin-top: 15vw;
    }
  }
  @media screen and (max-width:620px) {
    .info_tea button{
        font-size: 4vw; 
        width: 130px;
        height: 45px;
    }
    .butt_more{
        font-size: 5vw;
        width: 220px;
        height: 55px;
        margin-top: 15vw;
    }
  }
  @media screen and (max-width:600px) {
    .info_tea button{
        font-size: 4.5vw; 
        width: 130px;
        height: 45px;
    }
    .butt_more{
        font-size: 5.5vw;
        width: 220px;
        height: 55px;
        margin-top: 15vw;
    }
  }
  @media screen and (max-width:580px) {
    .info_tea button{
        font-size: 5vw; 
        width: 130px;
        height: 45px;
    }
    .butt_more{
        font-size: 6vw;
        width: 220px;
        height: 55px;
        margin-top: 15vw;
    }
  }
  @media screen and (max-width:540px){
    .info_tea h4{
        font-size: 3.8vw; 
    }
      .info_tea p{
        font-size: 3.8vw; 
    }
    .info_tea button{
        font-size: 4.5vw; 
    }
    .butt_more{
        font-size: 5vw;
    }
    .tea img{
        margin-top: -12.5vw;
    }
    .tea{
        width: 20rem;
        height: 23.5rem;
    }
    .tovar-2{
        margin-top: 25vw;
        row-gap: 30vw;
    }
  }
  @media screen and (max-width:540px) {
    .info_tea button{
        font-size: 5vw; 
        width: 120px;
        height: 40px;
    }
    .butt_more{
        font-size: 6vw;
        width: 200px;
        height: 50px;
        margin-top: 15vw;
    }
  }
  @media screen and (max-width:520px) {
    .info_tea button{
        font-size: 5vw; 
        width: 120px;
        height: 40px;
    }
    .butt_more{
        font-size: 6vw;
        width: 200px;
        height: 50px;
        margin-top: 15vw;
    }
  }
  @media screen and (max-width:500px) {
    .info_tea button{
        font-size: 5vw; 
        width: 120px;
        height: 40px;
    }
    .butt_more{
        font-size: 6vw;
        width: 200px;
        height: 50px;
        margin-top: 15vw;
    }
  }
  @media screen and (max-width: 480px) {
    .info_tea h4{
        font-size: 4.5vw; 
    }
      .info_tea p{
        font-size: 5vw; 
    }
    .info_tea button{
        font-size: 5vw; 
        width: 120px;
        height: 40px;
    }
    .tea{
        width: 20rem;
        height: 25.5rem;
    }
    .butt_more{
        font-size: 6vw;
        width: 200px;
        height: 55px;
        margin-top: 15vw;
    }
    h3{
        margin-top: 15vw;
    }
  }
  @media screen and (max-width: 425px) {
    .info_tea button{
        font-size: 5vw;
        width: 125px;
        height: 40px;
    }
    .butt_more{
        font-size: 7vw;
        margin-top: 17vw;
        width: 200px;
        height: 50px;
    }
  }
  @media screen and (max-width: 400px) {
    .info_tea h4{
        font-size: 7.5vw; 
        text-align: center;
    }
      .info_tea p{
        font-size: 7vw; 
    }
    .tea{
        width: 22rem;
        height: 30rem;
    }
    .info_tea button{
        font-size: 8vw;
        width: 180px;
        height: 60px;
    }
    .butt_more{
        font-size: 9vw;
        margin-top: 20vw;
        width: 250px;
        height: 75px;
    }
    .tea img{
        margin-top: -18vw;
    }
  }
  @media screen and (max-width:375px){
    .info_tea h4{
        font-size: 5.5vw; 
        text-align: center;
    }
      .info_tea p{
        font-size: 5.5vw; 
    }
    .tea{
        margin-top: 10vw;
        width: 18rem;
        height: 20rem;
    }
    .info_tea button{
        font-size: 7vw;
        width: 125px;
        height: 40px;
    }
    .butt_more{
        font-size: 7vw;
        margin-top: 20vw;
        width: 200px;
        height: 45px;
    }
    .tea img{
        margin-top: -18vw;
        width: 15rem;
        height: 15rem;
    }
  }
  @media screen and (max-width:320px){
    .tea{
        margin-top: 10vw;
        width: 15.5rem;
        height: 18.5rem;
    }
    .butt_more{
        font-size: 7vw;
        margin-top: 20vw;
        width: 155px;
        height: 45px;
    }
    .info_tea button{
        font-size: 6vw;
        width: 100px;
        height: 35px;
    }
  }
</style>