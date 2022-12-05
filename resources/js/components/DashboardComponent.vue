<template>
    <HeaderComponent></HeaderComponent>
    <Kostyl></Kostyl>
    <div class="d-f">
        <div class="logout">
            <img src="img/no-avatar.png" v-if="avatar == 'NULL' || avatar == 'undefined'" alt="">
            <img :src="avatar" alt="" v-else> 
            <div v-if="avatar != 'NULL'" title="Удалить аватар" v-on:click="delAvatar()" class="del_avatar"></div>
            <label for="file">Выберите аватар</label>
            <p v-show="file.name">{{file.name}}</p>
            <input type="file" id="file" ref="file" required v-on:change="handleFileUpload()">
            <button v-on:click="submitFile()">Загрузить</button>
            <button @click.prevent="logout" type="submit">Выход</button>
        </div>
        <div class="info">
            <p>Ваше имя: {{name}}</p>
            <p>Ваша почта: {{email}}</p>
        </div>        
    </div>
    <div>
        <h3><span>—</span> Оставьте свой отзыв <span>—</span></h3>
        <div class="review-df"> 
            <div class="counter">{{counter}}/255</div>
            <textarea v-model="review" class="review" name="review" id="" maxlength="255" placeholder="Оставите отзыв о нашей компании"></textarea>
            <button v-on:click="Review1()" class="button_sub">Отправить</button>
        </div>   
    </div>

    <div>
        <h3><span>—</span> Ваши заказы <span>—</span></h3>
        <p v-if="(info == '' || info == null)" class="empty_cart">Вы еще не сделали заказ</p>
        <div v-else style="display: flex; flex-direction: column; align-items: center; gap: 5vw;">
            <div class="d-f2">
                <div class="info_product">
                    <div v-for="inf in info2" :key="inf" >
                        <img v-if="(inf.img != null)" :src="inf.img" alt="">
                        <img v-else src="img/no-avatar.png" alt="">
                        <p>{{inf.name_product}}</p>
                    </div>
                </div>
                <div class="info_summ">
                    <div v-for="inf in info" :key="inf">
                        <p>{{inf.summ}} ₽ / {{inf.count}} гр. </p>
                    </div>
                </div>      
            </div>
        </div>
        <div v-if="(info == '' || info == null)"></div>
        <div v-else class="itog">
            <p>Итого к оплате: {{total}}₽</p>
            <p>Статус заказа: {{status}}</p>
        </div>
    </div>
    <div><FooterView></FooterView></div>
</template>

<script>
import HeaderComponent from './HeaderComponent.vue';
import Kostyl from './Kostyl.vue';
import FooterView from './FooterView.vue';
export default {
  components: { Kostyl, HeaderComponent, FooterView },
    data(){
        return{
            name: '',
            email: '',
            file: '',
            id: '',
            avatar: '',
            review: '',
            info: [],
            info2: [],
            status: '',
            total: 0
        }
    },

    mounted(){
        if(localStorage.getItem('x_xsrf_token')){
            HeaderComponent.data.token = localStorage.getItem('x_xsrf_token')
        }
        this.getName()
        this.getEmail()
        this.getAvatar()
        this.getId()
        this.getOrder()
        document.title = this.name;
    },

    computed:{
        counter(){
            return this.review.length;
        }
    },

    methods:{
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
        delAvatar(){
            let formData = new FormData();
            this.getId()
            formData.append('id', this.id);
            axios.post('/api/delavatar',
            formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
            .then( r => {
                console.log(r);
                localStorage.setItem('avatar', 'NULL');
                this.avatar = 'NULL'
            })
        },
        submitFile(){
            let formData = new FormData();
            formData.append('file', this.file);
            this.getId()
            formData.append('id', this.id);
            axios.post('/load-avatar',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(r => {
                let fileName = '../uploads/' + this.file.name;
                localStorage.setItem('avatar', fileName);
                this.avatar = fileName
                this.file = '';
            })
                .catch(function(){
                    console.log('FAILURE!!');
                });
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        },
        getName(){
            this.name = localStorage.getItem('user')
        },
        getEmail(){
            this.email = localStorage.getItem('email')
        },
        getId(){
            this.id = localStorage.getItem('id')
        },
        getAvatar(){
            this.avatar = localStorage.getItem('avatar')
        },
        Review1(){
            let formData = new FormData();
            formData.append('review', this.review);
            formData.append('name_user', this.name);
            formData.append('avatar', this.avatar)
            axios.post('/api/review', 
            formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                },
                )
            
            .then(res =>{
                console.log()
                this.review = ''
            })
        },

        getOrder(){
            let formData = new FormData();
            formData.append('id_user', localStorage.getItem('id'));
            axios.post('/api/output_order', 
            formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                },
            )
            .then(res => {
                this.info = res.data;
                this.status = res.data[0]['status'];
                this.total = res.data[0]['total']


                let id_products = [];
                for(let i = 0; i < res.data.length; i++ ){
                    id_products.push(res.data[i]['id_product']);
                }
                let formData = new FormData();
                formData.append('id_products', id_products);
                axios.post('/api/product', 
                formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    },
                )
                .then(r => {
                    this.info2 = r.data
                })
            })
        }
    }
}
</script>

<style lang="css" scoped>
    .itog{
        display: flex;
        justify-content: space-between;
        width: 70%;
        margin-top: 1.2vw;
        margin-left: 13vw;
    }
    .itog p{
        color: white;
        font-size: 1.7vw;
        font-family: 'Comfortaa', cursive;
        border-bottom: 2px solid #9FC926;
    }
    .empty_cart{
        text-align: center;
        margin: 5vw 0;
    }
    div p{
        color: white;
        font-size: 1.5vw;
    }
    div img{
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    .d-f2{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        background: #191D21;
        width: 80%;
        margin-top: 5vw;
    }
    .info_product{
        display: flex;
        flex-direction: column;
        gap: 2vw;
        margin-top: 2vw;
        margin-bottom: 2vw;
    }
    .info_product div{
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 10px;
    }
    .info_product div p{
        padding: 20px;
    }
    .info_summ{
        display: flex;
        flex-direction: column;
        gap: 2vw;
        margin-top: 2vw;
        margin-bottom: 2vw;
    }
    .info_summ div{
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 30px;
    }
    .info_summ div p{
        padding-right: 20px;
    }
    .del_avatar{
        background-image: url('img/xx.png');
        background-size: 100%;
        background-repeat: no-repeat;
        width: 30px;
        height: 30px;
        cursor: pointer;
        margin-top: -2.2vw;
        margin-left: 8vw;
    }
    .logout{
        display: flex;
        margin-top: 10vh;
        flex-wrap: wrap;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: baseline;
        align-content: space-around;
        align-items: center;
    }
    .counter{
        color: white;
        font-size: 1.2vw;
        font-family: 'Comfortaa', sans-serif;
        position: absolute;
        margin: 8vw 0;
        margin-left: 17vw;
    }
    .logout p{
        color: white;
        font-size: 1.2vw;
        font-family: 'Comfortaa', sans-serif;
        margin-bottom: -1vw;
    }
    .logout button{
        width: 20vw;
        height: 50px;
        background-color: transparent;
        color:  white ;
        font-size: 1.2vw;
        font-family: 'Philosopher', sans-serif;
        border:  #9fc926 2px solid;
        margin-top: 5vh;
    }
    .logout button:hover{
        background-color: #9fc926;
        color: #191D21;
        transition-duration: 0.5s;
    }
    .logout input{
        width: 20vw;
        height: 50px;
        background-color: transparent;
        color: white;
        font-size: 1.2vw;
        font-family: 'Philosopher', sans-serif;
        border:  #9fc926 2px solid;
        margin-top: 5vh;
        /* opacity: 0; */
        display: none;
    }
    label{
        background-color: transparent;
        font-family: 'Philosopher', sans-serif;
        color: white;
        font-size: 1.2vw;
        border: 2px #9fc926 solid;
        width: 20vw;
        height: 50px;
        margin-top: 3vw;
        padding-top: 0.5vh;
        text-align: center;
    }
    .logout input, label:hover{
        background-color: #9fc926;
        color: #191D21;
        transition-duration: 0.5s;
    }
    .logout img{
        width: 250px;
        height: 250px;
        border-radius: 200px;
    }
    .d-f{
        display: flex;        
        align-items: baseline;
        justify-content: space-around;
    }
    .info{
        background-color: #191D21;
        width: 700px;
        height: 400px;
        color: white;
        font-size: 1.5vw;
        font-family: 'Comfortaa', cursive;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-left: 3vw;
    }
    h3{
      color: white;
      text-align: center;
      font-size: 2vw;
      margin: 8vw 0;
      font-family: 'Comfortaa', cursive;
    }
    h3 span{
      color: #9FC926;
    }
    .review-df{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .review{
        color: white;
        resize: none;
        background: transparent;
        width: 500px;
        height: 200px;
        border: #9FC926 2px solid;
        font-size: 1.2vw;
        font-family: 'Comfortaa', sans-serif;
    }
    button{
    width: 10vw;
    height: 50px;
    background-color: transparent;
    color: white;
    font-size: 1.2vw;
    font-family: 'Philosopher', sans-serif;
    border: #9FC926 2px solid;
    margin-top: 5vh;
    }
    form button:hover{
    background-color: #9FC926;
    color: #191D21;
    transition-duration: 0.5s;
    }
    
    input::placeholder, textarea::placeholder{
        color: white;
        font-size: 1vw;
        padding: 1vw;
        font-family: 'Comfortaa', cursive;
    }

    @media screen and (max-width: 1024px) {
        .d-f{
            flex-direction: column;
            align-items: center;
            gap: 10vw;
        }
        .info{
            width: 80vw;
            height: auto;
            font-size: 1.2rem;
        }
        .logout input, .logout button, .logout label{
            width: 40vw;
            font-size: 28px;
        }
        div h3{
            font-size: 40px;
        }
        .review-df textarea::placeholder{
            font-size: 20px;
        }
        .review-df button{
            width: 30vw;
            font-size: 28px;
            height: 60px;
        }
        .counter{
            margin-left: 44vw;
            margin-top: 17vw;;
        }
        
    }
    @media screen and (max-width: 768px) {
        .counter{
            font-size: 16px;
            margin-left: 57vw;
            margin-top: 22vw;
        }   
        .del_avatar
        {
            margin-left: 20vw;
            margin-top: -4vw;
        } 
        .logout input, .logout button, .logout label{
            width: 40vw;
            font-size: 28px;
            margin-top: 40px;
        }    
    }
    @media screen and (max-width: 425px) {
        .info, .review{
            max-width: 380px;
        }
        .logout input, .logout button, .logout label{
            width: 60vw;
            font-size: 28px;
            margin-top: 40px;
        }
        div h3{
            font-size: 24px;
        }
        .counter{
            font-size: 16px;
            margin-left: 76vw;
            margin-top: 40vw;
        }
        .review-df button{
            width: 50vw;
        }
        .del_avatar
        {
            margin-left: 35vw;
            margin-top: -7vw;
        }
    }
    @media screen and (max-width: 375px) {
        .info, .review{
            max-width: 350px;
        }
    }
    @media screen and (max-width: 320px) {
        .info, .review{
            max-width: 280px;
        }
        .logout input, .logout button, .logout label{
            width: 80vw;
            font-size: 28px;
            margin-top: 40px;
        }
        div h3{
            font-size: 20px;
        }
        .counter{
            font-size: 16px;
            margin-left: 80vw;
            margin-top: 40vw;
        }
        .review-df button{
            width: 50vw;
        }
        .del_avatar
        {
            margin-left: 40vw;
            margin-top: -7vw;
        }
        .counter
        {
            width: 84px;
            margin-top: 54vw;
        }
    }
</style>
