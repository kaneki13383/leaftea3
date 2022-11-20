<template>
    <div>
        <h3><span>—</span> Отзывы <span>—</span></h3>
        <div class="orders">
            <div v-for="rew in reviews" v-bind:key="rew" class="order">                
                <img :src="rew.img_user" alt="">
                <div class="comm">
                    <h5>{{rew.name_user}}</h5>
                    <p>{{rew.review}}</p>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    data () {
        return {
            reviews: []
        }
    },

    mounted(){
        this.getAll()
    },

    methods:{
        getAll(){
            axios.get('/api/getreview')
            .then(res=>{
                this.reviews = res.data
                // console.log(res)
            })
        }
    }
}
</script>

<style lang="css" scoped>
    h3{
        color: white;
        text-align: center;
        font-size: 2.5vw;
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
    width: 17.0vw;
}
</style>