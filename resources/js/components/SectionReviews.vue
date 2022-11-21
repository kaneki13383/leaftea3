<template>
    <section class="otziv">
        <h3><span>—</span> Øтзывы <span>—</span></h3>
        <div class="orders">
            <div v-for="review in reviews" v-bind:key="review" class="order">                
                <img :src="review.img_user" alt="">
                <div class="comm">
                    <h5>{{review.name_user}}</h5>
                    <p>{{review.review}}</p>
                </div>
            </div>          
        </div>
    </section>
  </template>
  
  <script>
  export default {
    data() {
      return {
        reviews: []
      };
    },
    mounted(){
        this.getAll()
    },
    methods:{
        getAll(){
            axios.get('/api/getreview')
            .then(res=>{
                this.reviews = res.data
                // console.log(this.reviews)

            })
        }
    }
  };
  </script>
  
  <style lang="css" scoped>
  /*Отзывы*/
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
.orders{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
}
.order{
    width: 550px;
    height: 250px;
    margin: 10px;
    background-color: #191D21;
    box-shadow: black 14px 14px 8px 4px;
    color: white;
    display: flex;
}
.order img{
    object-fit: cover;
    translate: -1vw -1vw;
    width: 150px;
    height: 150px;
    border-radius: 10vw;
}
.comm{
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
}
.comm h5{
    font-family: 'Comfortaa', cursive;
    font-size: 1.2vw;
    margin: 0;
}
.comm p{
    font-family: 'Philosopher', sans-serif;
    font-size: 0.9vw;
    margin: 0;
    width: 20vw;
}
/*Отзывы*/
@media screen and (max-width:1600px) {
    .order{
        width: 450px;
        height: 200px;
        margin: 10px;
    }
    .order img{
        object-fit: cover;
        translate: -2vw -2vw;
        width: 120px;
        height: 120px;
    }
    .comm h5{
        font-size: 1.5vw; 
        margin: 0;  
    }
    .comm p{
        font-size: 1vw;
        width: 20vw;
    }
}
@media screen and (max-width:1500px) {
    .orders{
        column-gap:2vw;
        row-gap: 5vw;
    }
    .order{
        width: 615px;
        height: 250px;
        margin: 10px;    
    }
    .comm h5{
        font-size: 1.7vw;   
    }
    .comm p{
        font-size: 1.3vw;
        width: 30vw;
    }
    .order img{
        translate: -2vw -2vw;
        width: 150px;
        height: 150px;
    }
}
@media screen and (max-width: 1360px){
    .orders{
        column-gap:2vw;
        row-gap: 7vw;
    }
    .order{
        width: 500px;
        height: 200px;
        margin: 10px;    
    }
    .comm h5{
        font-size: 1.3vw;   
    }
    .comm p{
        font-size: 1.2vw;
        width: 27vw;
    }
    .order img{
        translate: -2vw -2vw;
        width: 125px;
        height: 125px;
    }
}
@media screen and (max-width: 1300px) {
    .comm h5{
        font-size: 1.5vw;   
    }
    .comm p{
        width: 30vw;
        font-size: 1.3vw;
    }
}
@media screen and (max-width:1160px) {
   
    .comm p{
        width: 31vw;
    }
}
@media screen and (max-width:1100px) {
    h3{
        font-size: 3vw;
    }
    .orders{
        column-gap:10vw;
        row-gap: 7vw;
    }
    .order{
        width: 700px;
        height: 250px;
        margin: 10px;    
    }
    .comm h5{
        font-size: 2vw;   
    }
    .comm p{
        font-size: 2vw;
        width: 48vw;
    }
    .order img{
        translate: -2.5vw -3vw;
        width: 150px;
        height: 150px;
    }
}
@media screen and (max-width: 1040px) {
    .comm p{
        width: 51vw;
    }
    .comm h5{
        font-size: 2.5vw;   
    }
}
@media screen and (max-width: 980px) {
    .comm p{
        width: 53vw;
    }
}
@media screen and (max-width:900px){
    .comm p{
        font-size: 2.3vw;
        width: 57vw;
    }
    .comm h5{
        font-size: 3vw;   
    }
    h3{
        font-size: 4.5vw;
    }
}
@media screen and (max-width: 840px) {
    .comm p{
        width: 63vw;
    }
}
@media screen and (max-width: 800px) {
    .order{
        width: 600px;
        height: 225px;
        margin: 10px;   
    }
    .order img{
        translate: -2.5vw -3vw;
        width: 125px;
        height: 125px;
        
    }
    .comm p{
        width: 57vw;
    }
}
@media screen and (max-width:740px) {
    .comm p{
        width: 62vw;
        font-size: 2.7vw;
        margin: 0;
    }
    .comm h5{
        font-size: 3.5vw;   
    }
}
@media screen and (max-width:680px) {
    .comm p{
        width: 65vw;
    }
    .order{
        width: 580px;
        height: 200px;
        margin: 10px;   
    } 
    h3{
        font-size: 6vw;
    }
}
@media screen and (max-width: 640px) {
    .orders{
        column-gap:10vw;
        row-gap: 7vw;
    }
    .order{
        width: 500px;
        height: 250px;
        margin: 10px;    
    }
    .comm h5{
        font-size: 4vw;   
    }
    .comm p{
        font-size: 2,5vw;
        width: 55vw;
    }
    .order img{
        translate: -2,5vw -3vw;
        width: 125px;
        height: 125px;
    }
}
@media screen and (max-width: 580px) {
    .comm p{
        font-size: 3vw;
        width: 60vw;
    }
}
@media screen  and (max-width:500px){
    .orders{
        column-gap:10vw;
        row-gap: 15vw;
    }
    .order{
        width: 400px;
        height: 350px;
        margin: 10px;    
    }
    .order img{
        translate: -2.5vw -3vw;
        width: 125px;
        height: 125px;
    }
    .comm p{
        font-size: 4vw;
        width: 50vw;
    }
    .comm h5{
        font-size: 5vw;   
    }
}
@media screen and (max-width:440px) {
    .order{
        width: 370px;
        height: 370px;
        margin: 10px;    
    }
    .comm p{
        font-size: 4.3vw;
        width: 50vw;
    }
    .comm h5{
        font-size: 5.8vw;   
    }
    h3{
        font-size: 8vw;
    }
}
@media screen and (max-width:400px) {
    .comm p{
        font-size: 5vw;
        width: 53vw;
    }
    .order{
        width: 350px;
        height: 370px;
        margin: 10px;    
    }
}
</style>