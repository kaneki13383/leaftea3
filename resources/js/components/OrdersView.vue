<template>
    <div>
        <h3><span>—</span> Заказы <span>—</span></h3>
        <div>
            <p v-if="(info == '' || info == null)" class="empty_cart">Заказов нет</p>
            <div v-else style="display: flex; flex-direction: column; align-items: center; gap: 5vw;">
                <div class="d-f2">
                    <div class="info_product">
                        <div v-for="us in users" :key="us">
                            <p>{{us.name}}</p>
                        </div>
                    </div>                    
                    <div class="info_summ">
                        <div v-for="inf in info" :key="inf">
                            <p>{{inf.summ}} ₽ / {{inf.count}} гр. </p>
                            <!-- <p>Итого: {{inf.total}} ₽</p> -->
                            <p>Статус: {{inf.status}}</p>
                            <p>Адрес: {{inf.adress}}</p>
                            <select v-model="status" name="status">
                                <option value=""></option>
                                <option value="Передано курьеру">Передано курьеру</option>
                                <option value="Доставка">Доставка</option>
                                <option value="Забрать в магазине">Забрать в магазине</option>
                                <option value="Доставлено">Доставлено</option>
                                <option value="Отменен">Отменен</option>
                            </select>
                            <button v-on:click="id = inf.id_product" @click.prevent="setStatus">Сохранить</button>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            info: [],
            info2: [],
            users: [],
            status: '',
            id: ''
        }
    },

    mounted(){
        this.getOrder()
    },

    methods:{
        getOrder(){
            let formData = new FormData();
            formData.append('id_user', localStorage.getItem('id'));
            axios.post('/api/output_all_order', 
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
                    this.info2 = r.data;

                    let id_users = [];
                    for(let i = 0; i < this.info.length; i++ ){
                        id_users.push(this.info[i]['id_user']);
                    }
                    let formData = new FormData();
                    formData.append('id_user', id_users);
                    axios.post('/api/find_user', 
                    formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        },
                    )
                    .then( us => {
                        this.users = us.data;
                        // console.log(us);
                    })
                })
            })
        },

        setStatus(){
            let formData = new FormData();
            formData.append('status', this.status);
            formData.append('id_product', this.id);
            axios.post('/api/setStatus', 
                formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    },
                )
            .then(res => {
                console.log(this.id);
                this.getOrder();
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
    select{
        width: 150px;
        height: 50px;
        background-color: transparent;
        text-decoration: none;
        border: #9FC926 2px solid;
        color: white;
        font-size: 1.2vw;
        font-family: 'Philosopher', sans-serif;
        margin-right: 1vw;
    }
    option{
        background: #191D21;
    }
    .empty_cart{
        text-align: center;
        margin: 5vw 0;
    }
    div p{
        color: white;
        font-size: 1.2vw;
    }
    div img{
        width: 120px;
        height: 120px;
        border-radius: 50%;
    }
    .d-f2{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        background: #191D21;
        width: 110%;
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
    .info_summ button{
        width: 150px;
        height: 50px;
        text-decoration: none;
        background-color: transparent;
        border: #9FC926 2px solid;
        color: white;
        font-size: 1.2vw;
        font-family: 'Philosopher', sans-serif;
    }
    .info_summ button:hover{
        background-color: #9FC926;
        color: #191D21;
        transition-duration: 0.5s;
    }
</style>