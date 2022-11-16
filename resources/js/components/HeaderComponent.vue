<template>
    <header id="menu">
    <img class="logo_mobile" src="../../../public/img/logofooter.png" alt="">
    <transition name="slide-fade">
        <ul v-if="show" class="navigation">
            <li><router-link to="/about">О нас</router-link></li>
            <li><router-link to="/catalog">Каталог</router-link></li>
            <li class="logo_pc"><router-link to="/"><img src="../../../public/img/logo.png" alt=""></router-link></li>
            <li><router-link to="/shop">Магазин</router-link></li>
            <li class="login"><router-link v-show="!token" to="/login">Войти</router-link><router-link v-show="token" to="/dashboard">{{ name }}</router-link></li>
        </ul>
    </transition>

        <a class="burger-menu_button" @click="show = !show">
             <span class="burger-menu_lines"></span>
        </a>

    </header>
</template>
<script>
export default {
        el: '#menu',
    data(){
        return{
            token: '',
            name: '',
            email: '',
            show: true
        }
    },

    watch: {
        '$route'(){
            this.getToken()
            this.getName()
            this.getEmail()
        }
    },

    mounted(){
        this.getToken()
        this.getName()
    },

    updated(){
        this.getToken();
        this.getName()
    },

    methods:{
        getToken(){
            this.token = localStorage.getItem('x_xsrf_token')
        },
        getName(){
            this.name = localStorage.getItem('user')
        },
        getEmail(){
            this.email = localStorage.getItem('email')
        }
    }
}
</script>
<style lang="css" scoped>
    *{
        list-style-type: none;
        margin: 0;
        padding: 0;

    }
    header{
        height: 10vh;
        width: 100%;
        top: 0px;
        position: absolute;
        z-index: 100;
    }
    .navigation{
        display: flex;
        color: white;
        justify-content: space-around;
        align-items: center;
        margin-top: 2vh;
        font-size: 1.5rem;
        font-family: 'Comfortaa', cursive;
    }
    .navigation a{
        color: white;
    }
    .logo_mobile{
        display: none;
    }
    @media screen and (max-width: 1024px) {        
        .burger-menu_button{
            display: block;
        }
        .logo_mobile{
            display: block;
        }
        .burger-menu_button {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 30;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            -webkit-transition: 0.4s;
            -moz-transition: 0.4s;
            -o-transition: 0.4s;
            transition: 0.4s;
        }
    .burger-menu_lines::before,
    .burger-menu_lines::after,
    .burger-menu_lines {
        position: absolute;
        width: 50px;
        height: 3px;
        background-color: #9FC926;
        -webkit-transition: 0.4s;
        -moz-transition: 0.4s;
        -o-transition: 0.4s;
        transition: 0.4s;
    }
    .burger-menu_lines {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
      .burger-menu_lines::before {
        content: '';
        top: -12px;
    }
      .burger-menu_lines::after {
        content: '';
        top: 12px;
    }
    .navigation{
        flex-direction: column;
        justify-content: space-evenly;
        backdrop-filter: blur(5px);
        background-color: #000000b6;
        height: 101vh;
        width: 100%;
        margin-top: -10vh;
        position: fixed;
    }
    .slide-fade-enter-active {
        transition: all 3s ease;
    }
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active до версии 2.1.8 */ {
  transform: translateX(1000px);
  transition-duration: 2s;
  opacity: 0;
}
    .logo_pc{
        display: none;
    }

}
</style>