<template>
    <header id="menu">
    <router-link to="/"><img class="logo_mobile" src="../../../public/img/logofooter.png" alt=""></router-link>
        <ul id="navig" class="navigation">
            <li><router-link to="/about">О нас</router-link></li>
            <li><router-link to="/catalog">Каталог</router-link></li>
            <li class="logo_pc"><router-link to="/"><img src="../../../public/img/logo.png" alt=""></router-link></li>
            <li><router-link to="/shop">Магазин</router-link></li>
            <li class="login"><router-link v-show="!token" to="/login">Войти</router-link><router-link v-show="token" to="/dashboard">{{ name }}</router-link></li>
        </ul>

        <a class="burger-menu_button" id="burger" v-on:click="display()">
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
            width: window.innerWidth
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
        window.addEventListener("resize", function(){
            let width_window = this.innerWidth;
            
            // console.log(width_window);
            if(width_window >= 1025){
                document.getElementById('navig').style.display = 'flex'
                document.getElementById('navig').style.opacity = '1'
            }else{
                document.getElementById('navig').style.display = 'none'
                document.getElementById('navig').style.opacity = '0'
                document.getElementById('burger').style.position = 'absolute'
            }
        }, false);
        
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
        },
        display(){
            if(document.getElementById('navig').style.opacity == '1'){
                document.getElementById('navig').style.opacity = '0'
                document.getElementById('navig').style.display = 'none'
                document.getElementById('burger').style.position = 'absolute'
            }else{
                document.getElementById('navig').style.opacity = '1'
                document.getElementById('navig').style.display = 'flex'
                document.getElementById('burger').style.position = 'fixed'
            }            
        }

    },
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
        transition-duration: 1.5s;
    }
    .navigation a{
        color: white;
    }
    .logo_mobile{
        display: none;
    }
    @media screen and (max-width: 1024px) {   
        .navigation{
            opacity: 0;
        }     
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
@media screen and (max-width: 320px) {
    .logo_mobile{
            width: 150px;
            height: 50px;
            margin-top: 8vw;
        }
}
</style>