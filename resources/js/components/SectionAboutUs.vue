<template>
    <div class="costyl"></div>
    <section class="about">
        <h3><span>—</span> Ø нас <span>—</span></h3>
        <div class="d-f">
            <div class="text_one">
                <div><p>LeafTea был основан на стремлении установить стандарт качества и расширить представление о чае и его богатых, вдохновляющих традициях. Мы предлагаем чай и растительные ингредиенты, импортированные непосредственно из садов по всему миру. </p></div>
                <div><img src="img/1.png" alt=""></div>
            </div>
            <div class="text_two">
                <img src="img/2.png" alt="">
                <p>Мы черпаем вдохновение в древних ремесленных практиках с использованием методов органического выращивания, а также в современных кулинарных инновациях. Наша миссия, начиная со скромного начала и заканчивая признанным лидером на рынке деликатесного чая, никогда не колебалась.</p>
            </div>
        </div>    
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
    h3{
        color: white;
        text-align: center;
        font-size: 2.5vw;
        margin: 3vw 0;
        font-family: 'Comfortaa', cursive;
    }

    h3 span{
        color: #9FC926;
    }
    .text_one{
        width: 30vw;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .text_one p{
        color: white;
        font-size: 2rem;
        font-family: 'Philosopher', sans-serif;
        padding-bottom: 6vh;
    }
    .text_two{
        width: 30vw;
    }
    .text_two p{
        color: white;
        font-size: 2rem;
        font-family: 'Philosopher', sans-serif;
        padding-top: 6vh;
    }
    .d-f{
        display: flex;
        justify-content: space-evenly;
    }
     /*Планшет и ноутбук*/
     @media screen and (max-width: 1500px) {
        .text_one div img{
            width:35vw;
        }
        .text_one p{
            width: 40vw;
        } 
        .text_one {
            padding-top: -20vw;
        }
        .text_two img{
            width: 35vw;
        }
        .text_two p{
            width: 40vw;
        }
    }
    @media screen and (max-width: 1024px) {
        .text_one p {
            font-size: 2.5vw;
        }
        .text_two p {
            font-size: 2.5vw;
        }
    }
    @media screen and (max-width: 768px) {
        .d-f{
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .text_one{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .text_two{
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
            gap: 2rem;
        }
        .text_one p{
            font-size: 3.5vw;
            padding: 0;
            width: 60vw;
            text-align: center;
        }
        .text_one div img{
            width: 55vw;
        }
        .text_two p{
            font-size: 3.5vw;
            width: 60vw;
            text-align: center;
        }
        .text_two img{
            width: 55vw;
        }
        h3{
            font-size: 5.5vw;
        }
    }
    @media screen and (max-width: 750px) {
        .text_one p{
            font-size: 4.5vw;
            padding: 0;
            width: 80vw;
            text-align: center;
        }
        .text_one div img{
            width: 70vw;
        }
        .text_two p{
            font-size: 4.5vw;
            width: 80vw;
            text-align: center;
        }
        .text_two img{
            width: 70vw;
        }
    }
    @media screen and (max-width: 425px) {
        .text_one p {
            font-size: 5.5vw;
        }
        .text_two p {
            font-size: 5.5vw;
            padding-top: 5vw;
        }
        h3{
        font-size: 7.5vw;
        margin-top: 15vw;        
        }
        .d-f{
            gap: 1rem;
        }
    }
    @media screen and (max-width: 417px) {
        .text_one p {
            font-size: 6vw;
        }
        .text_two p {
            font-size: 6vw;
        }
    }
    @media screen and (max-width: 417px) {
        h3{
            padding-top: 10vw;
            font-size: 8vw;
        }
    }
</style>