<template>
    <div>
        <h3><span>—</span> Товары <span>—</span></h3>
        <div class="d-f">
            <div class="form-add-product">
                <h4><span>—</span> Добавить новый товар <span>—</span></h4>
                <!-- <label for="img">Выберите фото товара</label> -->
                <input type="file" name="file" id="file" ref="file" v-on:change="handleFileUpload()">
                <input v-model="name_product" type="text" name="name_product" placeholder="Введите название товара">
                <input v-model="price" type="text" name="price" placeholder="Введите стоимость товара">
                <input v-model="discription" type="text" name="discription" placeholder="Введите описание товара">
                <button v-on:click="submitFile()">Добавить</button>
            </div>
            <div class="all-products">
                <div class="tea" v-for="inf in info" v-bind:key="inf">
                    <div class="info_tea">
                        <img :src="inf.img" alt="">
                        <h5>{{ inf.name_product }}</h5>
                        <p>{{inf.price}} ₽/50гр.</p>
                        <div class="edit_del">
                            <div class="edit"></div>
                            <div v-on:click="id = inf.id" @click.prevent="deleteProduct" class="delete"></div>
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
            file: '',
            name_product: '',
            price: '',
            discription: '',
            info: []
        }
    },

    mounted(){
        this.allProducts()
    },  

    methods:{
        submitFile(){
            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('name_product', this.name_product);
            formData.append('price', this.price);
            formData.append('discription', this.discription);
            axios.post('/api/add_product',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                },
            ).then(r => {
                this.name_product = ''
                this.price = ''
                this.discription = ''
                this.file = '',
                this.allProducts()
            })
                .catch(function(){
                    console.log('FAILURE!!');
                });
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        },
        allProducts(){
            axios.get('/api/products')
                .then(res =>(
                    this.info = res.data
                    // console.log(res.data)
                ))
        },
        deleteProduct(){
            axios.delete(`/api/delete_product/${ this.id }`)
            .then(res=>{
                this.allProducts()
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
    h4{
        color: white;
        font-size: 1.5vw;
        font-family: 'Comfortaa', cursive;
    }
    span{
        color: #9FC926;
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
    input::placeholder{
        color: white;
        font-size: 1vw;
        font-family: 'Comfortaa', cursive;
    }
    label{
        color: white;
        font-family: 'Philosopher', sans-serif;
        font-size: 1.2vw;
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
    button{
        background: transparent;
        width: 25vw;
        height: 50px;
        color: white;
        border: #9FC926 2px solid;
        font-size: 1.2vw;
        font-family: 'Philosopher', sans-serif;
    }
    button:hover{
        background: #9FC926;
        color: #191D21;
        transition-duration: 0.5s;
    }
    .form-add-product{        
        display: flex;        
        flex-direction: column;
        gap: 2vw;
    }
    .tea{
        background-color: #191D21;
        box-shadow: black 14px 14px 8px 4px;
        width: 20rem;
        height: 28rem;
        color: white;
        margin-bottom: 3vw;
    }
    .info_tea{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .info_tea h5{
        font-size: 1.2vw;
        font-family: 'Comfortaa', sans-serif;
    }
    .info_tea img{
        margin-top: -5vw;
        width: 15rem;
        height: 15rem;  
        border-radius: 10vw;      
    }
    .d-f{
        display: flex;
        flex-direction: column;
        gap: 10vw;
    }
    .edit{
        width: 50px;
        height: 50px;
        background-image: url('img/edit_white.png');
        background-size: 100%;
        background-repeat: no-repeat;
        cursor: pointer;
        margin-top: 2vw;
    }
    .edit:hover{
        background-image: url('img/edit_orange.png');
        transition-duration: 0.5s;
    }
    .all-products{
        display: flex;
        flex-wrap: wrap;
        gap: 4vw;
    }
    .delete{
        width: 40px;
        height: 40px;
        background-image: url('img/x.png');
        background-size: 100%;
        background-repeat: no-repeat;
        cursor: pointer;
        margin-top: 2vw;
    }
    .delete:hover{
        background-image: url('img/remove.png');
        transition-duration: 0.5s;
    }
    .edit_del{
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 2vw;
    }
</style>