<template>
    <div>
        <p>{{this.info['name_product']}}</p>
        <p>{{this.info['price']}}</p>
        <p>{{this.info['discription']}}</p>
        <img :src="this.info['img']" alt="">
    </div>
</template>

<script>
export default {
    data () {
        return {
            info: [],
            id: null
        }
    },
    
    mounted(){        
        this.parseURL()
        this.getProduct()
    },
    
    methods:{
        getProduct(){
            axios.get(`/api/view/${ this.id }`)
            .then(res=> {
                this.info = res.data
                // console.log(this.info)
            })
        },

        parseURL(){
            let url = window.location.pathname
            this.id = url.split('/')[2]
            // console.log(this.id)
        }
    }

}
</script>

<style lang="css" scoped>
    p{
        color: white;
    }
</style>