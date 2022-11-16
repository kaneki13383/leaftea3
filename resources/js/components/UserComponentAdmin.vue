<template>
    <div>        
        <h3><span>—</span> Пользователи <span>—</span></h3>
        <div v-for="i in info" v-bind:key="i" class="users_output">
            <div class="user">
                <p class="id">{{i.id}}.</p>
                <img src="img/no-avatar.png" v-if="i.avatar == null" alt="">
                <img :src="i.avatar" alt="" v-else>
                <p class="inf">{{i.name}}</p>
                <p class="inf">{{i.email}}</p>
                <p>{{i.created_at.substring(0,10)}}</p>
                <div v-on:click="id = i.id" @click.prevent="deleteUser" class="delete"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            info: '',
            id: ''
        }
    },

    mounted(){
        this.outputUsers()
    },

    methods:{
        deleteUser(){
            axios.delete(`/api/delete/${ this.id }`)
            .then(res=>{
                this.outputUsers()
            })
        },
        outputUsers(){
            axios.get('/api/users')
            .then(res =>(
                this.info = res.data
                // console.log(res.data)
            ))
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
    .users_output{
        background-color: #191D21;     
        box-shadow: black 14px 14px 8px 4px;
        padding: 1.5vw;
    }
    .user{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        color: white;
        font-family: 'Comfortaa', cursive;
        font-size: 1.5rem;
    }
    .user img{
        width: 100px;
        height: 100px;
        border-radius: 100px;
    }
    .inf{
        margin: 0 5vw;
    }
    .id{
        margin-right: 1vw;
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
</style>