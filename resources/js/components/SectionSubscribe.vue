<template>
     <section class="subscribe">
        <div class="block">
            <div class="tea">
                <img src="img/pngegg.png" alt="">
            </div>            
            <div class="form">
                <div>
                    <h5>Подпишитесь на нас, чтобы ничего не пропустить</h5>
                </div>
                <div>
                    <form action="">
                        <input type="text" placeholder="Имя">
                        <input type="phone" placeholder="Телефон">
                        <input type="email" placeholder="E-mail">
                        <button class="button_sub" type="submit">Подписаться</button>
                    </form>
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
  };
  </script>
  
  <style lang="css" scoped>
  /*Подписаться*/
.subscribe{
    background-image: url('../img/image 21.png');
    background-repeat: no-repeat;
    background-size: contain;
    width: 100%;
}
.block{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-evenly;
}
.form{
    display: flex;
    flex-direction: column;
}
.form h5{
    color: white;
    font-size: 1.6vw;
    font-family: 'Comfortaa', cursive;
    width: 30vw;
    text-align: center;
    /* margin-bottom: 5vh; */
}
input{
    background-color: transparent;
    border: none;
    border-bottom: white 2px solid;
    outline: none;
    width: 25vw;
    height: 50px;
    color: white;
    padding: 5px;
}
form{
    display: flex;
    flex-direction: column;
    align-items: center;
}
form button{
    width: 25vw;
    height: 50px;
    background-color: transparent;
    color: white;
    font-size: 1.2vw;
    font-family: 'Philosopher', sans-serif;
    border: white 2px solid;
    margin-top: 5vh;
}
form button:hover{
    background-color: white;
    color: #191D21;
    transition-duration: 0.5s;
}
/*Подписаться*/
@media screen and (max-width: 1440px){
    .tea img{
        height: 40vw;
        width: 40vw;
    }
    h5{
        margin-top: -10px;
    }
}
@media screen and (max-width:1380px) {
    .subscribe{
        width: 100%;
        height: 625px;
    }
}
@media screen and (max-width: 1300px) {
    .subscribe{
        width: 100%;
        height: 575px;
    }
}
@media screen and (max-width: 1200px) {
    .subscribe{
        width: 100%;
        height: 550px;
    }
}
@media screen and (max-width: 1100px) {
    .subscribe{
        width: 100%;
        height: 475px;
        
    }
    .tea img{
        height: 40vw;
        width: 40vw;
    }
}
@media screen and (max-width: 1024px) {
            h5{
                margin: 1vw;
            }
            .button_sub{
                margin-top: 2vw;
                font-size: 2.5vw;
            }

}
@media screen and ( max-width: 768px) {
        .tea img{
            display: none;
        }
        .subscribe div{
            justify-content: center;
            padding-top: 20px;
        }
        form input, .button_sub{
            height: 5vw;
        }
        .form h5{
            font-size: 2.5vw;
            width: 50vw;
        }
        .subscribe{
            height: 50vw;
            background-size: 140%;
        }
        form input{
            font-size: 16px;
            margin: 5px 0px;
        }
        .button_sub{
            font-size: 25px;
        }    
}
@media screen and (max-width: 425px) {
        .subscribe{
            height: 80vw;
            background-size: 210%;
        }
        .form h5{
            font-size: 5vw;
            width: 80vw;
        }
        form input{
            width: 55vw;
            margin-bottom: 3vw;
        }
        .subscribe div{
            padding-top: 15px;
        }
        .button_sub{
            font-size: 18px;
            width: 40vw;
            height: 40px;
        }
}
@media screen and (max-width: 320px) {
    .subscribe{
            height: 120vw;
            background-size: 260%;
    }
    form input{
            margin-bottom: 5vw;
        }
}

  </style>