<template>
    <div class="log">
        <div class="background">
        <h3><router-link to="/"><span>—</span> Авторизация <span>—</span></router-link></h3>
        <form>
        <div class="info_email">
            <input v-model="email" type="email" name="email" placeholder="Email">
        </div>
        <div class="info_password">
            <input v-model="password" type="password" name="password" placeholder="Пароль">
        </div>
            <button @click.prevent="login">Войти</button>
        </form>
        <div class="info_link_div">
            <router-link class="info_link_text" to="/register">Нет аккаунта?</router-link>
        </div>
        <div class="info_link_div">
            <a v-if="!error" class="info_link_text">
                Политика конфиденциальности
            </a><a v-else class="info_link_text">
                {{error}}
            </a>
        </div>
        </div> 
    </div>
</template>

<script>
export default {
    name: 'Login',

    data(){
        return{
            email: null,
            password: null,
            error: ''
        }
    },
    mounted(){    
        document.title = "Войти"
    },

    methods: {
        login(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', { email: this.email, password: this.password })
                .then(r => {
                    console.log(r);
                    this.email = '';
                    this.password = '';
                    localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN']);
                    localStorage.setItem('user',r.data['name']);
                    localStorage.setItem('email',r.data['email']);
                    localStorage.setItem('id',r.data['id']);
                    localStorage.setItem('avatar',r.data['avatar']);
                    if(r.data['role'] == 0){
                        this.$router.push('/dashboard');
                    }
                    else{
                        this.$router.push('/admin');
                    }
                })
                .catch( err => {
                    console.log(err)
                    this.error = 'Неправильный e-mail или пароль!'
                })
            }) 
        },
    }
}
</script>

<style lang="css" scoped>
    h3{
        color: white;
        text-align: center;
        font-size: 2vw;
        margin-top: -1.5vw;
        font-family: 'Comfortaa', cursive;
    }
    h3 span{
        color: #9FC926;
    }
    .info_email{
        color: white;
        font-size: 1vw;
        font-family: 'Comfortaa', cursive;
    }
    .info_password{
        color: white;
        font-size: 1vw;
        font-family: 'Comfortaa', cursive;
    }
    .log{
        background-image: url('img/image22.png');
        background-size: 100%;
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .background{
        background-color: #191d21dc;
        display: flex;
        align-items: center;
        flex-direction: column;
        gap: 1vw;
        width: 40%;
        height: 55%;
        padding: 5vw 0;
    }
    input{
        background-color: transparent;
        border: none;
        border-bottom: #9FC926 2px solid;
        outline: none;
        width: 25vw;
        height: 50px;
        color: white;
        padding: 5px;
    }
    
    .log button{
        width: 25vw;
        height: 50px;
        background-color: transparent;
        color: white;
        font-size: 1.2vw;
        font-family: 'Philosopher', sans-serif;
        border: #9FC926 2px solid;
        margin-top: 5vh;
    }
    .log button:hover{
        background-color: #9FC926;
        color: #191D21;
        transition-duration: 0.5s;
    }
    input::placeholder{
        color: white;
        font-size: 1vw;
        font-family: 'Comfortaa', cursive;
    }
    .info_link_text{
        color: white;
        font-size: 1vw;
        font-family: 'Comfortaa', cursive;
    }
    @media screen and (max-width: 1500px) {
        .log{
            background-size: 110%;
        }
    }
    @media screen and (max-width: 1400px) {
        .log{
            background-size: 115%;
        }       
    }
    @media screen and (max-width: 1350px) {
        .log{
            background-size: 120%;
        }       
    }
    @media screen and (max-width: 1300px) {
        .log{
            background-size: 122%;
        }       
    }
    @media screen and (max-width: 1250px) {
        .log{
            background-size: 127%;
        }       
    }
    @media screen and (max-width: 1200px) {
        .log{
            background-size: 132%;
        }       
    }
    @media screen and (max-width: 1150px) {
        .log{
            background-size: 138%;
        }
        .background{
        background-color: #191d21dc;
        display: flex;
        align-items: center;
        flex-direction: column;
        gap: 1vw;
        width: 50%;
        height: 60%;
        padding: 5vw 0;
        }  
        input::placeholder{
            font-size: 1.5vw;
        } 
        input{
            margin-top: 2vw;
            font-size: 1.5vw;
            width: 35vw;
        }
        .log button{
            font-size: 2vw;
            width: 15vw;
            margin-bottom: 2vw;
            height: 60px;
            padding: 10px;
        }
        .info_link_text
        {
            font-size: 1.5vw;
        }
        h3{
            font-size: 2.5vw;
        }
        @media screen and (max-width: 1024px) {
            .log{
            background-size: 150%;
            }
            input::placeholder{
            font-size: 1.5vw;
            } 
            input{
                margin-top: 2vw;
                font-size: 1.5vw;
                width: 35vw;
            }
            .log button{
                font-size: 2vw;
                width: 15vw;
                margin-bottom: 2vw;
                height: 60px;
                padding: 10px;
            }
            .info_link_text
            {
                font-size: 1.5vw;
            }
            h3{
            font-size: 2.5vw;
            }
        }
        @media screen and (max-width: 768px){
            .log{
            background-size: 200%;
            }
            .background{
                width: 70%;
            }
            h3{
            font-size: 32px;
            }
            .info_link_text
            {
                font-size: 2vw;
            }
            .log button{
                font-size: 24px;
                width: 25vw;
                margin-bottom: 2vw;
                height: 60px;
                padding: 10px;
            }
            input::placeholder{
            font-size: 20px;
            } 
            input{
                margin-top: 2vw;
                font-size: 20px;
                width: 45vw;
            }
        }
        @media screen and (max-width: 425px) {
            .log{
            background-size: 420%;
            }
            .background{
                width: 95%;
                gap: 15px;
            }
            h3{
            font-size: 32px;
            }
            .info_link_text
            {
                font-size: 16px;
            }
            .log button{
                font-size: 24px;
                width: 45vw;
                margin-bottom: 15px;
                height: 60px;
                padding: 10px;
            }
            input::placeholder{
            font-size: 20px;
            } 
            input{
                margin-top: 2vw;
                font-size: 20px;
                width: 75vw;
            }
            .info_link_div{
                margin: 10px;
            }
        }
        @media screen and (max-width: 320px) {
            .log{
                background-size: 500%;
            }
            .background{
                width: 95%;
                height: 500px;
                padding: 13vw 0vw;
                gap: 30px;
            }
            h3{
            font-size: 24px;
            margin: 0px;
            }
            .info_link_text
            {
                font-size: 14px;
            }
            .log button{
                font-size: 24px;
                width: 45vw;
                margin: 15px 0px;
                height: 50px;
            }
            input::placeholder{
            font-size: 16px;
            } 
            input{
                margin-top: 2vw;
                font-size: 16px;
                width: 75vw;
            }
            .info_link_div
            {
                margin: 0px;
            }
        }
    }
</style>