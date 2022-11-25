<template>
     <footer>
        <ul class="navigation_footer">
            <li><img src="/img/logofooter.png" alt=""></li>
            <li>Главная</li>
            <li>О нас</li>
            <li>Каталог</li>            
            <li>Магазин</li>
            <li>Контакты</li>
        </ul>
        <a href="">Политика конфидециальности</a>
        <div class="cop">
            <p>LeafTea  ©  2022 Все права защищены</p>
        </div>
    </footer>
  </template>
  
  <script>
  export default {
    data() {
      return {};
    },
  };
  </script>
  
  <style lang="css" scoped>
  /*Footer*/
  *{
        list-style-type: none;
        margin: 0;
        padding: 0;
  }
.navigation_footer{
    display: flex;
    color: white;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 2vh;
    font-size: 1.5vw;
    font-family: 'Comfortaa', cursive;
}
footer{
    height: 100%;
    background-color: #191D21;
    border-top: #9FC926 2px solid;
    margin-top: 15vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}
footer .navigation_footer{
    padding-top: 5vh;
    width: 100%;
}
footer a{     
    color: #938C8C;
    font-size: 1.2vw;
    font-family: 'Comfortaa', cursive;
    margin-top: 2.5vh;
}
.cop{
    color: rgb(255, 255, 255);
    font-family: 'Comfortaa', cursive;
    font-size: 1.2vw;
    border-top: #ffffff 2px solid;
    width: 100%;
    margin-top: 5vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 2vh;
    padding-bottom: 2vh;
}
/*Footer*/
@media screen and (max-width: 1024px) {
    li{
        font-size: 2.5vw;
    }
    footer a {
        font-size: 2.5vw;
    }
    .cop p {
        font-size: 2.5vw;
    }
    footer img{
        width: 25vw;
    }
}
@media screen and (max-width: 768px) {
    .navigation_footer li img{
        width: 25vw;
        display: none;
    }
    .navigation_footer li{
        font-size: 3vw;
    }  
    .mobile_footer{
        display: block;
        margin-top: 5vw;
    }
    footer a{
        font-size: 3vw;
    }
    .cop p{
        font-size: 3vw;
    }
}
@media screen and (max-width: 425px) {
    footer a {
        font-size: 5vw;
    }
    .cop p {
        font-size: 4.5vw;
    }
}
@media (min-width: 320px) and (max-width: 375px) {
    .logo_mobile{
        width: 220px;
        margin-top: 5vw;
    }
    .navigation_footer li{
        font-size: 3.5vw;
    }
    footer a{
        font-size: 3.5vw;
    }
    .cop p{
        font-size: 3.5vw;
    }
}
</style>