<template>
    <section class="top_tovar">
        <h3><span>—</span> Популярные товары <span>—</span></h3>
        <div class="tovar">
            <div class="tea">
                <div class="info_tea">
                    <img src="products/965b6fc3d4940ad01439aab79750eaca.webp" alt="">
                    <h4>Английский садовник</h4>
                    <p>260 ₽/50гр.</p>
                    <router-link :to="{ path: '/product/1' }">Подробнее</router-link>
                </div>
            </div>
            <div class="tea">
                <div class="info_tea">
                    <img src="products/38831f129d8dc667b575882f9955abd9.webp" alt="">
                    <h4>Вишневый Цитрус</h4>
                    <p>208 ₽/50гр.</p>
                    <router-link :to="{ path: '/product/2' }">Подробнее</router-link>
                    </div>
                </div>
            <div class="tea">
                <div class="info_tea">
                    <img src="products/842209a26a2a4626db66503138f4298f.webp" alt="">
                    <h4>Секрет Императора</h4>
                    <p>280 ₽/50гр.</p>
                    <router-link :to="{ path: '/product/3' }">Подробнее</router-link>
                    </div>
                </div>
            <div class="tea">
                <div class="info_tea">
                    <img src="products/2838cb45e5d7cfcc6a13fffce8e57b0c.webp" alt="">
                    <h4>Секрет Императрицы</h4>
                    <p>280 ₽/50гр.</p>
                    <router-link :to="{ path: '/product/4' }">Подробнее</router-link>
                </div>
            </div>           
        </div>           
    </section>
</template>
<script>
export default {
    data() {
        return {

        };
    }
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
  .tovar{
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
      margin-bottom: 5vw;
  }
  .info_tea{
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0vw;
      font-family: 'Comfortaa', cursive;
      margin-top: -5vw;
  }
  .info_tea a{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .info_tea img{
        width: 13vw;
        height: 13vw;  
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
  .butt_more{
       margin-top: 5vw;
  }
}
@media screen and (max-width: 1200px) {
  .tovar{
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
    .tovar{
        column-gap: 4vw;
        row-gap: 0vw;
    }
    .info_tea img{
        width: 14vw;
        height: 14vw;  
        border-radius: 25vw;
        margin-bottom: 3vw;
        margin-top: 2vw;
    }
  }
  @media screen and (max-width: 1500px){
    .tovar{
        column-gap: 2.5vw;
        row-gap: 0vw;
    }
  }
  @media screen and (max-width:1440px) {

    .info_tea img{
        width: 15vw;
        height: 15vw;  
        border-radius: 25vw;
        margin-bottom: 4vw;
        margin-top: 0vw;
    }
    .info_tea a{
        font-size: 1.7vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 1.6vw; 
      }
      .info_tea p{
         font-size: 1.7vw; 
      }
    h3{
        margin-bottom: 13vw;
    }
    .tea{
        margin-bottom: 5vw;
    }
  }
  @media screen and (max-width: 1380px){
    .tovar{
        column-gap: 10vw;
        row-gap: 10vw;
    }
    .info_tea img{
        width: 16vw;
        height: 16vw;  
        border-radius: 25vw;
        margin-bottom: 4vw;
        margin-top: 0vw;
    }
    .info_tea a{
        font-size: 1.7vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 1.6vw; 
      }
      .info_tea p{
         font-size: 1.7vw; 
      }
    h3{
        margin-bottom: 13vw;
    }
    .tea{
        margin-bottom: 5vw;
    }
  }
  @media screen and (max-width: 1300px){
    .tovar-2{
        column-gap: 7vw;
        row-gap: 10vw;
    }
    .info_tea button{
        font-size: 1.9vw; 
        width: 125px;
        height: 40px;
    }
    .info_tea img{
        width: 17vw;
        height: 17vw;  
        border-radius: 25vw;
        margin-bottom: 5vw;
        margin-top: 0vw;
    }
    .info_tea a{
        font-size: 1.7vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 1.8vw; 
      }
      .info_tea p{
         font-size: 2vw; 
      }
    h3{
        margin-bottom: 13vw;
    }
    .tea{
        margin-bottom: 5vw;
        width: 20rem;
        height: 23.5rem;
    }
  }
  @media screen and (max-width: 1220px){
    .tovar{
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
    .info_tea img{
        width: 17vw;
        height: 17vw;  
        border-radius: 25vw;
        margin-bottom: 5vw;
        margin-top: 0vw;
    }
    .info_tea a{
        font-size: 2vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 1.8vw; 
      }
      .info_tea p{
         font-size: 2vw; 
      }
    h3{
        margin-bottom: 13vw;
    }
    .tea{
        margin-bottom: 5vw;
    }
  }
  @media screen and (max-width: 1120px){
    .tovar{
        column-gap: 15vw;
        row-gap: 10vw;
    }
    .info_tea button{
        font-size: 2vw; 
        width: 125px;
        height: 40px;
    }
    .info_tea img{
        width: 19vw;
        height: 19vw;  
        border-radius: 25vw;
        margin-bottom: 5vw;
        margin-top: 0vw;
    }
    .info_tea a{
        font-size: 2.2vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 2vw; 
      }
      .info_tea p{
         font-size: 2vw; 
      }
      .tea{
        margin-bottom: 5vw;
      }
      h3{
        margin-bottom: 10vw;
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
    .tea{
        margin-bottom: 3vw;
    }
    h3{
        margin-bottom: 13vw;
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
    .info_tea img{
        width: 22vw;
        height: 22vw;  
        border-radius: 25vw;
        margin-bottom: 5vw;
        margin-top: 0vw;
    }
    .info_tea a{
        font-size: 2.5vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 2.2vw; 
      }
      .info_tea p{
         font-size: 2vw; 
      }
  }
  @media screen and (max-width:1000px) {
    .info_tea img{
        width: 22vw;
        height: 22vw;  
        border-radius: 25vw;
        margin-bottom: 5vw;
        margin-top: 0vw;
    }
    .info_tea a{
        font-size: 2.7vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 2.5vw; 
      }
      .info_tea p{
         font-size: 2vw; 
      }
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
    .tea{
        margin-bottom: 5vw;
    }
    h3{
        margin-bottom: 12vw;
    }
  }
  @media screen and (max-width:960px){
    .info_tea img{
        width: 22vw;
        height: 22vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
        margin-top: -3vw;
    }
    .info_tea a{
        font-size: 2.7vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 2.5vw; 
      }
      .info_tea p{
         font-size: 2vw; 
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
    .info_tea img{
        width: 23vw;
        height: 23vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
        margin-top: -3vw;
    }
    .info_tea a{
        font-size: 3.1vw; 
        width: 155px;
        height: 47px;
    }
    .info_tea h4{
         font-size: 2.5vw; 
      }
      .info_tea p{
         font-size: 2vw; 
      }
  }
  @media screen and (max-width:860px) {
    .info_tea img{
        width: 28vw;
        height: 28vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
        margin-top: -4vw;
    }
    .info_tea a{
        font-size: 3.1vw; 
        width: 155px;
        height: 47px;
    }
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
    .tovar{
        margin-top: 20vw;
        column-gap: 8vw;
        row-gap: 16vw;
    }
    .info_tea img{
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
    .info_tea img{
        width: 28vw;
        height: 28vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
        margin-top: -4vw;
    }
    .info_tea a{
        font-size: 3.1vw; 
        width: 155px;
        height: 47px;
    }
  }
  @media screen and (max-width: 768px) {
    .tovar{
        column-gap: 5vw;
        row-gap: 16vw;
    }
    .info_tea h4{
        font-size: 2.7vw; 
    }
      .info_tea p{
        font-size: 3vw; 
    }
    .info_tea a{
        font-size: 3.3vw; 
        width: 155px;
        height: 47px;
    }
    .butt_more{
        margin-top: 12.5vw;
        width: 225px;
        height: 50px;
        font-size: 4vw;
    }
    .info_tea img{
        width: 28vw;
        height: 28vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
        margin-top: -4vw;
    }
  }
  @media screen and (max-width:700px){
    .tovar{
        margin-top: 16vw;
        column-gap: 10vw;
        row-gap: 18vw;
    }
    .info_tea a{
        font-size: 3.5vw;
        width: 160px;
        height: 50px;
    }
    .info_tea h4{
        font-size: 2.8vw; 
    }
      .info_tea p{
        font-size: 2.8vw; 
    }
    .tea{
        width: 20rem;
        height: 21rem;
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
    .info_tea img{
        width: 28vw;
        height: 28vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
        margin-top: -3vw;
    }
  }
  @media screen and (max-width:680px){
    .info_tea h4{
        font-size: 3.5vw; 
    }
    .info_tea a{
        font-size: 4.3vw;
        width: 170px;
        height: 50px;
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
        height: 22rem;
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
    .info_tea a{
        font-size: 4.3vw;
        width: 165px;
        height: 50px;
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
        height: 21rem;
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
    .info_tea a{
        font-size: 4.5vw;
        width: 165px;
        height: 50px;
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
    .info_tea a{
        font-size: 4.5vw;
        width: 165px;
        height: 50px;
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
    .info_tea a{
        font-size: 4.5vw;
        width: 160px;
        height: 45px;
    }
    .info_tea img{
        width: 30vw;
        height: 30vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
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
    .info_tea img{
        width: 30vw;
        height: 30vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
    }
    .info_tea a{
        font-size: 4.5vw;
        width: 160px;
        height: 45px;
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
    .info_tea img{
        margin-top: -4vw;
    }
    .tea{
        width: 20rem;
        height: 20rem;
    }
    .tovar{
        margin-top: 25vw;
        row-gap: 30vw;
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
    .info_tea a{
        font-size: 4.5vw;
        width: 150px;
        height: 40px;
    }
    .butt_more{
        font-size: 6vw;
        width: 200px;
        height: 50px;
        margin-top: 15vw;
    }
    .info_tea img{
        width: 35vw;
        height: 35vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
    }
  }
  @media screen and (max-width: 480px) {
    .info_tea h4{
        font-size: 4.5vw; 
    }
    .info_tea a{
        font-size: 4.5vw;
        width: 150px;
        height: 40px;
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
        height: 21rem;
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
  @media screen and (max-width: 440px) {
    .info_tea img{
        width: 40vw;
        height: 40vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
    }
    .info_tea a{
        font-size: 5vw;
        width: 150px;
        height: 40px;
    }
  }
  @media screen and (max-width: 425px) and (min-width: 376px){
    h3{
        font-size: 6.5vw;
        margin-top: 15vw;
        margin-bottom: 30vw;
    }
    .info_tea a{
        font-size: 4vw;
        width: 150px;
        height: 40px;
    }
    .info_tea img{
        width: 50vw;
        height: 50vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
    }
    .butt_more{
        font-size: 7vw;
        margin-top: 1vw;
        width: 200px;
        height: 50px;
    }
    .tea{
      width: 19rem;
      height: 22.5rem;
      margin-bottom: 5vw;
  }
  }
  @media screen and (max-width:375px){
    h3{
        font-size: 6.5vw;
        margin-top: 15vw;
        margin-bottom: 30vw;
    }
    .info_tea a{
        font-size: 4vw;
        width: 150px;
        height: 40px;
    }
    .info_tea img{
        width: 50vw;
        height: 50vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
    }
    .butt_more{
        font-size: 7vw;
        margin-top: 1vw;
        width: 200px;
        height: 50px;
    }
    .tea{
      width: 18.5rem;
      height: 20.5rem;
      margin-bottom: 5vw;
    }
  }
  @media screen and (max-width:355px){
    h3{
        font-size: 6.5vw;
        margin-top: 15vw;
        margin-bottom: 30vw;
    }
    .info_tea a{
        font-size: 5vw;
        width: 155px;
        height: 45px;
    }
    .info_tea img{
        width: 50vw;
        height: 50vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
    }

    .tea{
      width: 17.5rem;
      height: 20.5rem;
      margin-bottom: 5vw;
    }
    .info_tea h4{
        font-size: 5.5vw; 
    }
      .info_tea p{
        font-size: 5.5vw; 
    }
  }
  @media screen and (max-width:320px){
    h3{
        font-size: 6.5vw;
        margin-top: 15vw;
        margin-bottom: 30vw;
    }
    .info_tea a{
        font-size: 5vw;
        width: 155px;
        height: 45px;
    }
    .info_tea img{
        width: 50vw;
        height: 50vw;  
        border-radius: 25vw;
        margin-bottom: 10vw;
    }

    .tea{
      width: 16rem;
      height: 19rem;
      margin-bottom: 5vw;
    }
    .info_tea h4{
        font-size: 5.5vw; 
    }
      .info_tea p{
        font-size: 5.5vw; 
    }
  }
</style>