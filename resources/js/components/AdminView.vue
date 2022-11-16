<template>
    <div class="d-f">        
        <div class="navigation">
            <img src="img/logofooter.png" alt="">
            <li v-on:click="show = 'users'">
                <a><img src="img/Vector.svg" alt="">Пользователи</a>
            </li>
            <li v-on:click="show = 'reviews'">
                <a><img src="img/Vector1.svg" alt="">Отзывы</a>
            </li>
            <li>
                <router-link to=""><img src="img/Vector2.svg" alt="">Заказы</router-link>
            </li>
            <li v-on:click="show = 'products'">
                <a><img src="img/- (1) 1.svg" alt="">Товары</a>
            </li>
            <li>
                <router-link to=""><img src="img/Vector3.svg" alt=""><a @click.prevent="logout">Выход</a></router-link>
            </li>
        </div>
        <div class="info">
            <users v-if="show == 'users'"></users>
            <reviews v-else-if="show == 'reviews'"></reviews>
            <products v-else-if="show == 'products'"></products>
        </div>
    </div>
</template>

<script>
import users from './UserComponentAdmin.vue';
import reviews from './Reviews.vue';
import products from './Products.vue';
export default {
    components: { users, reviews, products },
    data () {     
        return {
            show: 'users',
        }
    },
    mounted(){    
        document.title = "Админка"
    },

    methods: {
        logout(){
            axios.post('/logout')
            .then( res => {
                localStorage.removeItem('x_xsrf_token')
                localStorage.removeItem('user')
                localStorage.removeItem('email')
                localStorage.removeItem('id')
                localStorage.removeItem('avatar')
                this.$router.push('/')
                // console.log(res);
            })
        },
    },
}
</script>

<style lang="css" scoped>
    *{
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    .navigation{
        display: flex;
        color: white;
        flex-direction: column;
        gap: 3vw;
        width: 500px;
        /* border-right: 3px solid #9fc926; */
    }
    .navigation li a{
        font-size: 1.5rem;
        font-family: 'Philosopher', sans-serif;
        display: flex;
        flex-direction: row;
        gap: 1vw;
    }
    .navigation li a img{
        width: 40px;
        height: 40px;
    }
    .navigation img{
        width: 250px;
    }
    .info{
        width: 1200px;
        height: auto;
    }
    .d-f{
        display: flex;
        align-items: center;
        /* flex-wrap: wrap; */
        justify-content: center;
        margin-top: 5vh;
    }
</style>