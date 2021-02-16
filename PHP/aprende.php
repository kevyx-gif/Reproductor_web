<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/aprende_style.css">
    <link rel="stylesheet" href="../CSS/swiper.css" />
    <title>Document</title>
</head>
<body>
    <a href ="http://localhost:3000/PHP/Principal.php" class="salir"><img src="../FOTOS/salir.png" width="60" height="60"></a>
    <div class="testimonials">
    <div class="sensor" onclick="reproducir();";>
    <img src="../FOTOS/play-button.png" id="play";>
    </div>
    <div class="swiper-container">
    <div class="swiper-wrapper">
    <div class="swiper-slide">
        <div class="card" >
                <div class="layer" ></div>
                    <div class="content">
                        <div class="imgBx" >
                            <video id="audio" controls class="ad">
                            <source src="https://www.youtube.com/watch?v=o_TYVGp9n0s&ab_channel=ShakeMusic" >
                            Tu navegador no soporta audio HTML5.
                            </video>
                        </div>
                        <div class="details">
                            <h2><br><span>Name</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 1,
        slideShadows: true,
        },
        loop:true,
    });
    </script>
    <script>
        function reproducir(){
            var d =document.getElementsByClassName('swiper-slide swiper-slide-active');
            console.log(d[0].childNodes[1].childNodes[3].childNodes[1].childNodes[3]);
            var v = d[0].childNodes[1].childNodes[3].childNodes[1].childNodes[3];
            if(v.paused){
                var b = document.getElementsByClassName('swiper-slide swiper-slide-prev');
                var bb = b[0].childNodes[1].childNodes[3].childNodes[1].childNodes[3];
                bb.load();
                bb.pause();
                var e = document.getElementsByClassName('swiper-slide swiper-slide-next');
                var ee = e[0].childNodes[1].childNodes[3].childNodes[1].childNodes[3];
                ee.load();
                ee.pause();
                v.play();
                var c = document.querySelector('#play');
                c.setAttribute('src','../FOTOS/pause.png');
            }
            else{
                v.pause();
                var c = document.querySelector('#play');
                c.setAttribute('src','../FOTOS/play-button.png');
            }
        }
    </script>

    
