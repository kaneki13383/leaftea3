<template>
    <div>
        <h3><span>—</span> Товары <span>—</span></h3>
        <div class="d-f">
            <h4><span>—</span> Добавить новый товар <span>—</span></h4>
            <!-- <label for="img">Выберите фото товара</label> -->
            <input type="file" name="file" id="file" ref="file" v-on:change="handleFileUpload()">
            <input v-model="name_product" type="text" name="name_product" placeholder="Введите название товара">
            <input v-model="price" type="text" name="price" placeholder="Введите стоимость товара">
            <input v-model="discription" type="text" name="discription" placeholder="Введите описание товара">
            <button v-on:click="submitFile()">Добавить</button>
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
        }
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
            })
                .catch(function(){
                    console.log('FAILURE!!');
                });
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
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
    .d-f{        
        display: flex;        
        flex-direction: column;
        gap: 2vw;
    }
</style>