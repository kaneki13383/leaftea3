<template>
    <div>
        <h3><span>—</span> Отзывы <span>—</span></h3>
        <div class="orders">
            <div v-for="rew in reviews" v-bind:key="rew" class="order">                
                <img :src="rew.img_user" alt="">
                <div class="comm">
                    <h5>{{rew.name_user}}</h5>
                    <p>{{rew.review}}</p>
                    <div v-on:click="id = rew.id" @click.prevent="deleteReview" class="delete"></div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    data () {
        return {
            reviews: [],
            id: ''
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
        },
        deleteReview(){
            axios.delete(`/api/deletereview/${ this.id }`)
            .then(res=>{
                this.getAll()
            })
        },
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
    .delete{
        width: 40px;
        height: 40px;
        background-image: url('img/x.png');
        background-size: 100%;
        background-repeat: no-repeat;
        cursor: pointer;
    }
    .delete:hover{
        background-image: url('img/remove.png');
        transition-duration: 0.5s;
    }
    .orders{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    gap: 3vw;
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
    border-radius: 25vw;
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