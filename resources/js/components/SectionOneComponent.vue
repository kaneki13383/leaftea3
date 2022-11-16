<template>
    <section class="under_header">
        <h1>our leaves will</h1><h2>leave you only joy</h2>
    </section>
</template>
<script>
export default {
    data() {
        return {

        };
    }
}
</script>
<style lang="css" scoped>
    .under_header{
        /* position: relative; */
        padding-top: 10vh;
        background-image: url('../img/image9.png');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        width: 100%;
    }
    .under_header h1{
        color: white;
        font-family: 'Gluten', cursive;
        font-size: 4vw;
        margin-top: 15vh;
        margin-left: 25vw;
    }
    .under_header h2{
        color: white;
        font-family: 'Gluten', cursive;
        font-size: 4vw;
        margin-top: 10vh;
        margin-left: 50vw;
    }
    /*Планшет и ноутбук*/
    @media screen and (max-width: 1500px) {
    }
    @media screen and (max-width: 1200px) {}
    @media screen and (max-width: 768px){
            .under_header h1, .under_header h2{
                font-size: 5vw;
            }    
    }
    @media screen and (max-width: 425px) {
        .under_header h1{
            font-size: 7vw;
                margin-left: 15vw;
        } .under_header h2{
                font-size: 7vw;
                margin-left: 30vw;
            }  
    }
</style>