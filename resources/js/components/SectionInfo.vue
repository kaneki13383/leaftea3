<template>
    <section class="where_we">
        <h3><span>—</span> Как найти нас? <span>—</span></h3>
        <div class="where">
            <div class="info_where_we">
                <div class="info_we">
                    <p>Тел: 896733127886</p>
                    <p>Почта: danchik.kun@mail.ru</p>
                    <p>Адрес: ул. Анатолия Сергеева, 5</p>
                </div>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2753.9035457186988!2d48.023682915840894!3d46.35145868182157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41a905808f7047dd%3A0x6794cd466d796a84!2z0YPQuy4g0JDQvdCw0YLQvtC70LjRjyDQodC10YDQs9C10LXQstCwLCA1LCDQkNGB0YLRgNCw0YXQsNC90YwsINCQ0YHRgtGA0LDRhdCw0L3RgdC60LDRjyDQvtCx0LsuLCA0MTQwMDA!5e0!3m2!1sru!2sru!4v1665484295493!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        
    </section>
</template>
<script>
    export default {
    data() {
        return {};
    },
   
  }
</script>
<style lang="css" scoped>
    /*Секция о как найти нас?*/
h3{
    color: white;
    text-align: center;
    font-size: 2.5vw;
    margin: 8vw 0;
    font-family: 'Comfortaa', cursive;
}
h3 span{
    color: #9FC926;
}
.info_where_we{
    color: white;
    font-size: 1.5rem;
    font-family: 'Comfortaa', cursive;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
}
.info_where_we div p{
    border-bottom: #9FC926 2px solid;
    margin-top: 2vw;
}
@media screen and (max-width: 1100px) {
    .info_where_we{
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 4rem;
    }
}
@media screen and (max-width: 700px) {
    h3{
        font-size: 5.5vw;
    }
}
@media screen and (max-width: 768px) {
    iframe{
        width: 90vw;
    }
    .info_we p {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    h3{
        font-size: 5.5vw;
    }
}
@media screen and (max-width: 425px) {
    .info_we p {
        font-size: 5vw;
    }
    iframe{
        height: 90vw;
    }
    .where{
        margin-bottom: -15vw;
    }
    h3{
        margin-top: 20vw;
        font-size: 7.5vw;
    }
}
@media screen and (max-width: 417px) {
    h3{
        padding-top: 10vw;
        font-size: 8vw;
    }
}
</style>