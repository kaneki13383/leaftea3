<template>
     <div class="sales">
      <div class="sales1">
        <img class="chainik" src="/img/Group60.png" />
        <div class="sales_stuff">
          <p class="sales_text">750₽</p>
          <input type="submit" class="sales_more" value="Подробнее" />
        </div>
      </div>
      <div class="sales__cont">
        <div class="sale">
          <img src="/img/Group61.png" class="sales_goods" alt="" />
          <div class="sales_stuff">
            <p class="stuff_desc">750₽</p>
            <input type="submit" class="sales_more1" value="Подробнее" />
          </div>
        </div>
        <div class="sale">
          <img src="/img/Group62.png" class="sales_goods" alt="" />
          <div class="sales_stuff">
            <p class="stuff_desc">750₽</p>
            <input type="submit" class="sales_more1" value="Подробнее" />
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default {
      data() {
          return {};
      },
  };
</script>
  
<style lang="css" scoped>
   a {
    text-decoration: none;
  }
  
  .logo {
    height: 80px;
  }
  .sales {
    display: flex;
    justify-content: space-evenly; 
    padding-top: 50px;
    padding-bottom: 100px;
    border-bottom: #9fc926 solid 3px;
  }
  .sales1 {
    box-shadow: 14px 14px 8px 0px #00000040;
    position: relative;
  }
  .sales2 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .sales img {
    float: left;
  }
  .sales_text {
    color: white;
    font-size: 32px;
    padding: 0px;
    margin: 0px;
    font-family: "Philosopher";
    margin-right: 10px;
  }
  .sales_more,
  .sales_more1 {
    color: white;
    background: none;
    border: #9fc926 solid 1px;
    font-size: 32px;
    font-family: "Philosopher";
  }
  .sales_more {
    padding: 10px;
    background-color: #191D21bb;
  }
  .sales_more1 {
    font-size: 20px;
    background-color: #191D21bb;
  }
  .sales_goods {
    box-shadow: 14px 14px 8px 0px #00000040;
  }
  
  .sales__cont {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .sale {
    position: relative;
    z-index: 1;
  }
  
  .sales_stuff {
    position: absolute;
    z-index: 2;
    bottom: 0px;
    right: 0px;
    text-align: center;
  }
  .sales_stuff input:hover{
    background-color: #9FC926;
    color: #191D21;
    transition-duration: 0.5s;
  }
  .sales_stuff .stuff_desc {
    color: white;
    padding: 0px;
    margin: 0px;
    font-family: "Philosopher";
  }
  @media screen and (max-width: 1500px) {
    
    .sales{
        flex-wrap: wrap;
        gap: 5vw;
    }
    .sales__cont{
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 7.6vw;
        width: 100%;
    }
    .chainik{
        width: 100%;
    }
    .sales1{
        width: 1123px;
    }
    .sales_more1{
        padding: 5px;
        font-size: 28px;
    }
    .stuff_desc
    {
      font-size: 24px;
    }
    
  }
  @media screen and (max-width:1200px) {
    .sales{
      column-gap:7vw;
      row-gap: 8vw;
    }
    .sales__cont{
      column-gap:7vw;
      row-gap: 5vw;
    }
  }
  @media screen and (max-width:1160px) {
    
    
  }
  @media screen and (max-width: 1110px) {
    .sales1, .sales_goods{
      width: 70vw;
    }    
    .sales_more1, .sales_more{
      font-size: 32px;
      padding: 10px;
    }
    .stuff_desc{
      font-size: 32px;
    }

  }
  @media screen and ( max-width: 768px)
  {
    .sales1{
      width: 518px;
      margin: auto;
    }
    .sales_more {
    font-size: 20px;
  }
  .sales_more{
        padding: 5px;
        font-size: 28px;
    }
    .sales_text{
      font-size: 32px;
    }
  }
  @media screen and (max-width: 425px) {
        .sales_goods{
          width: 80vw;
        }
        .sales1{
          width: 80vw;
        }
        .sales_more {
          font-size: 16px;
        }
        .sales_more, .sales_more1{
          padding: 5px;
          font-size: 24px;
         
        }
        .sales_text{
          font-size: 24px;
        }
        .stuff_desc{
          font-size: 24px;
        }
  }
</style>