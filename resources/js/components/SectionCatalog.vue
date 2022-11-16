<template>
    <section class="catalog">
      <h3><span>—</span> Категории <span>—</span></h3>
      <div class="catalog_img">
        <div class="info_catalog">
          <img src="img/Rectangle 18.png" alt="">
          <div class="catalog_stuff">
            <p class="stuff_text">Листовой чай</p>
          </div>
        </div>
        <div class="info_catalog">
          <img src="img/Rectangle 16.png" alt="">
          <div class="catalog_stuff">
            <p class="stuff_text">Цветущий чай</p>
          </div>
        </div>
        <div class="info_catalog">
          <img src="img/Rectangle 17.png" alt="">
          <div class="catalog_stuff">
            <p class="stuff_text">Bubble tea</p>
          </div>
        </div>
      </div>
    </section>
</template>
 
<script>
 export default {
     data() {
         return {};
     },
 };
</script>
 
<style lang="css" scoped>
  h3{
    color: white;
    text-align: center;
    font-size: 2.5vw;
    margin: 6vw 0;
    font-family: 'Comfortaa', cursive;
}
h3 span{
  color: #9FC926;
}
.catalog{
border-bottom: #9fc926 solid 3px;
}
.catalog_img{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-content: stretch;
  justify-content: space-evenly;
  padding-bottom: 5vw;
  gap: 3vw;
}
.catalog_stuff{
  margin-top: -2vw;
  position: absolute;
  text-align: center;
  margin-left: 1vw;
}
.stuff_text{
  color: white;
  font-size: 1vw;
  padding: 0px;
  margin: 0px;
  font-family: "Comfortaa";
}
.info_catalog img{
  box-shadow: 14px 14px 8px 0px #00000040;
}
@media screen and (max-width: 1500px){
  .stuff_text{
    font-size: 1.5vw;
    margin-top: -1vw;
  }
  h3{
        font-size: 2.5;
    }
}
@media screen and (max-width: 1460px) {
  .catalog_img{
    column-gap: 0vw;
    row-gap: 5vw;
  }
}
@media screen and (max-width: 1420px) {
  .catalog_img{
    column-gap: 2vw;
    row-gap: 8vw;
  }
}
@media screen and (max-width:1100px) {
  .stuff_text{
    font-size: 1.8vw;
    margin-top: -1.5vw;
  } 
}
@media screen and (max-width:960px) {
  .catalog_img{
    column-gap: 5vw;
    row-gap: 6vw;
  }
  .stuff_text{
    font-size: 2vw;
    margin-top: -2vw;
  } 
  h3{
    font-size: 4vw;
  }
}
@media screen and (max-width:880px) {
  .catalog_img{
    column-gap: 5vw;
    row-gap: 8vw;
    margin-bottom: 5vw;
  }
  .stuff_text{
    font-size: 2.5vw;
    margin-top: -3vw;
  } 
}
@media screen and (max-width:700px) {
  h3{
    font-size: 5vw;
  }
  .catalog_img{
    margin-bottom: 7vw;
  }
}
@media screen and (max-width:600px) {
  .catalog_img{
    column-gap: 5vw;
    row-gap: 10vw;
  }
  .stuff_text{
    font-size: 3.5vw;
    margin-top: -5vw;
  } 
}
@media screen and (max-width:500px) {
  .info_catalog img{
    width: 400px;
    height: 100%;
  }
  .catalog_img{
    column-gap: 5vw;
    row-gap: 14vw;
    margin-bottom: 10vw;
  }
}
@media screen and (max-width:440px) {
  .info_catalog img{
    width: 350px;
    height: 100%;
  }
  .catalog_img{
    column-gap: 5vw;
    row-gap: 14vw;
    margin-bottom: 10vw;
  }
}
@media screen and (max-width:375px) {
  .info_catalog img{
    width: 300px;
    height: 100%;
  }
  .stuff_text{
    font-size: 4.5vw;
    margin-top: -6vw;
  } 
}
</style>