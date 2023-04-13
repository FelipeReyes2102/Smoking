<!DOCTYPE html>
<html lang="en">
<title>El Smoking</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>

<style>
            .slide {
                position: relative;
                box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.64);
                margin-top: 0px;
            }

            .slide-inner {
                position: relative;
                overflow: hidden;
                width: 100%;
                height: calc( 500px + 3em);
            }

            .slide-open:checked + .slide-item {
                position: static;
                opacity: 100;
            }

            .slide-item {
                position: absolute;
                opacity: 0;
                -webkit-transition: opacity 0.6s ease-out;
                transition: opacity 0.6s ease-out;
            }

            .slide-item img {
                display: block;
                height: 200%;
                max-width: 100%;
            }

            .slide-control {
                background: rgba(0, 0, 0, 0.28);
                border-radius: 50%;
                color: #fff;
                cursor: pointer;
                display: none;
                font-size: 40px;
                height: 40px;
                line-height: 35px;
                position: absolute;
                top: 50%;
                -webkit-transform: translate(0, -50%);
                cursor: pointer;
                -ms-transform: translate(0, -50%);
                transform: translate(0, -50%);
                text-align: center;
                width: 40px;
                z-index: 10;
            }

            .slide-control.prev {
                left: 2%;
            }

            .slide-control.next {
                right: 2%;
            }

            .slide-control:hover {
                background: rgba(0, 0, 0, 0.8);
                color: #aaaaaa;
            }

            #slide-1:checked ~ .control-1,
            #slide-2:checked ~ .control-2,
            #slide-3:checked ~ .control-3 {
                display: block;
            }

            .slide-indicador {
                list-style: none;
                margin: 0;
                padding: 0;
                position: absolute;
                bottom: 2%;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 10;
            }

            .slide-indicador li {
                display: inline-block;
                margin: 0 5px;
            }

            .slide-circulo {
                color: #828282;
                cursor: pointer;
                display: block;
                font-size: 35px;
            }

            .slide-circulo:hover {
                color: #aaaaaa;
            }

            #slide-1:checked ~ .control-1 ~ .slide-indicador 
                 li:nth-child(1) .slide-circulo,
            #slide-2:checked ~ .control-2 ~ .slide-indicador 
                  li:nth-child(2) .slide-circulo,
            #slide-3:checked ~ .control-3 ~ .slide-indicador 
                  li:nth-child(3) .slide-circulo {
                color: #428bca;
            }

            #titulo {
                width: 100%;
                position: absolute;
                padding: 0px;
                margin: 0px auto;
                text-align: center;
                font-size: 27px;
                color: rgba(255, 255, 255, 1);
                font-family: 'Open Sans', sans-serif;
                z-index: 9999;
                text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.33), 
                     -1px 0px 2px rgba(255, 255, 255, 0);
            }
        </style>
<body>
<div class="cont">
		<link rel="stylesheet" type="text/css" href="css/loader.css">
		<div class="lds-spinner loader" id="loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
		<script src="js/loader.js"></script>
	</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-black w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:inherit;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Renta de vestimenta</b></h3>
  </div>
  <div class="w3-bar-block">
   <!-- <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Inicio</a>  -->
    <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Inicio</a> 
    <a href="#Galeria" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galeria</a> 
    <a href="#designers" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Trajes y Smokings</a> 
    <a href="#Buscador" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Busca tips sobre vestimenta en caballeros</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contacto</a>
  <a href="usuarioD.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Registra un usuario nuevo</a>
  <a href="cerrarsesion.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Cerrar sesion</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span></span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="text-center" style="margin-top:80px" id="showcase">
  <div class="row">
    <div class="col-12 text-center"><center>
    <h1 class="w3-jumbo"><b>El Smoking</b></h1>
    <img src="img/logo.png" alt="" width="250" height="250" style="margin-top:100px">
    </center>
    </div>
 
  </div>
 
  </div>

  <div class="w3-container" style="margin-top:80px"  id="Galeria">
    <h1 class="w3-xxlarge w3-text-red"><b>Galería de trajes.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round" >
  </div>

<!-- Photo grid (modal) -->

<div class="container text-center mt-5">
  <div class="row">
    <div class="col-12">
    <div class="slide">
            <div class="slide-inner">
                <input class="slide-open" type="radio" id="slide-1" 
                      name="slide" aria-hidden="true" hidden="" checked="checked">
                <div class="slide-item">
                    <img src="../Proyecto14_Final/img/Traje1.jpg">
                </div>
                <input class="slide-open" type="radio" id="slide-2" 
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                    <img src="../Proyecto14_Final/img/Traje6.jpg">
                </div>
                <input class="slide-open" type="radio" id="slide-3" 
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                    <img src="https://media.gq.com.mx/photos/627ab19b98ce0267fa610a5d/4:3/w_2664,h_1998,c_limit/trajes-para-hombre-colores-para-demostrar-seguridad-y-exito-gris.jpg">
                </div>
                <label for="slide-3" class="slide-control prev control-1">‹</label>
                <label for="slide-2" class="slide-control next control-1">›</label>
                <label for="slide-1" class="slide-control prev control-2">‹</label>
                <label for="slide-3" class="slide-control next control-2">›</label>
                <label for="slide-2" class="slide-control prev control-3">‹</label>
                <label for="slide-1" class="slide-control next control-3">›</label>
                <ol class="slide-indicador">
                    <li>
                        <label for="slide-1" class="slide-circulo">•</label>
                    </li>
                    <li>
                        <label for="slide-2" class="slide-circulo">•</label>
                    </li>
                    <li>
                        <label for="slide-3" class="slide-circulo">•</label>
                    </li>
                </ol>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="w3-container" id="" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>¿Que somos?</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p style="text-align: center;"></p>
    <p style="text-align: justify;">
       <br>
    </p>
    <p style="text-align: justify;">
      <b>Objetivo de la tienda</b> <br>
      Una tienda de trajes exclusivamente para caballeros es proporcionar ropa elegante y formal para hombres que buscan vestirse para ocasiones especiales, como bodas, entrevistas de trabajo, reuniones de negocios, cenas formales y otros eventos importantes.

    </p>
    <p style="text-align: justify;">
      <b>¿Como logramos esto?</b> <br>
      ofreciendo una amplia gama de trajes, desde los más tradicionales hasta los más modernos y elegantes, con diferentes diseños, colores, tamaños y estilos para satisfacer las necesidades de cada cliente

    </p>
    <p style="text-align: justify;">
      <b>¿Que nos distingue de la competencia?</b> <br>
      la tienda también puede ofrecer servicios de sastrería personalizada para garantizar que los trajes se ajusten perfectamente a la figura y estilo del cliente.

    </p>
  </div>



  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

  <!-- Services -->
  <div class="w3-container" id="designers" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Trajes </b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <div class="collage">
      <img src="https://i.pinimg.com/236x/fe/b3/1c/feb31ced4a8664503d7e6ae59b4db70e.jpg" alt="Imagen 1" onclick="mostrarImagen(this);">
      <img src="https://images.asos-media.com/products/chaqueta-de-traje-muy-ajustada-en-caqui-de-asos-design/202919408-1-khaki?$n_480w$&wid=476&fit=constrain" alt="Imagen 2" onclick="mostrarImagen(this);">
      <img src="../Proyecto14_Final/img/Traje3.jpg" alt="Imagen 3" onclick="mostrarImagen(this);">
      <img src="../Proyecto14_Final/img/Traje4.jpg" alt="Imagen 4" onclick="mostrarImagen(this);">
      <img src="../Proyecto14_Final/img/Traje5.jpg" alt="Imagen 5" onclick="mostrarImagen(this);">
      <img src="../Proyecto14_Final/img/Traje6.jpg" alt="Imagen 6" onclick="mostrarImagen(this);">
      <img src="../Proyecto14_Final/img/Traje7.jpg" alt="Imagen 7" onclick="mostrarImagen(this);">
      <img src="../Proyecto14_Final/img/Traje8.jpg" alt="Imagen 8" onclick="mostrarImagen(this);">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT851xslO_LSLW4gmW5NrvkL4GtbKK7175YinIY0AxYLLadwUvZJcQYLt120vL_8dUVq5M&usqp=CAU" alt="Imagen 9" onclick="mostrarImagen(this);">
    </div>
    <div class="vista-ampliada">
      <span class="cerrar" onclick="cerrarImagen();">&times;</span>
      <img class="imagen-ampliada" src="">
    </div>
  </div>
  
 

<div class="w3-container" id="Buscador" style="margin-top:75px">
<h1 class="w3-xxxlarge w3-text-red"><b>Busca tips de vestimenta en nuestro buscador</b></h1>
<hr style="width:50px;border:5px solid red" class="w3-round">
<script async src="https://cse.google.com/cse.js?cx=3638960178cd54ef3">
</script>
<div class="gcse-search"></div>
</div>  
  <!-- Contact -->
  <div class="w3-container" id="contact" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>¿Donde nos encuentras?</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>Estamos ubicados en Av. Jose Maria Chavez #203 en la zona centro de Aguascalientes</p>
    <img src="https://cdn0.bodas.com.mx/vendor/8523/3_2/960/jpg/41af8bfe-41e6-4c6e-9e29-942026d48c73_5_328523-162793186176263.jpeg" alt="" width="250" height="250" style="margin:20px">
    <img src="https://media.timeout.com/images/105254327/750/562/image.jpg" alt="" width="250" height="250" style="margin:20px">
    <img src="https://thumbs.dreamstime.com/b/trajes-para-hombre-42909419.jpg" alt="" width="250" height="250" style="margin:20px">
  </div>
  <footer>
  <div class="contenedor">
    <div class="logo">
      <p>El Smoking Aguascalientes</p>
    </div>
    <div class="redes-sociales">
      <a href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAeFBMVEULCwv+/v4AAAAWFhb29vbr6+utra309PR/f3/5+fn8/PxKSkoICAihoaFGRkYuLi4nJycfHx+IiIgSEhIgICAwMDBCQkIlJSV4eHiQkJCoqKicnJy0tLTX19fIyMjOzs44ODhsbGxfX19RUVHi4uK+vr6WlpZgYGCVzLeXAAAE6klEQVR4nO3dC1fiOhSG4TYNhsTYtFZuXpkZ5fz/f3iyU3T0DFE43QK7871ruVTKYJ+VNi0Fx8KPusJ3hS9Gna8glB6E8oNQfhDKD0L5QSg/COUHofwglB+E8oNQfhDKD0L5QSg/COUHofwglB+E8oNQfhDKD0L5QXi0vNqRZ1i3sxAmzeVydXVxcXt1t1ldT5c/fv6qZzcdLRj44KcXxsFbTF8m5e70ZDqQeGph9C2fMrq+W9lCpe7Mp76yvJIsVGplv/DJFqr1cxS48QrV9MvxEy306movoFyhut8PKFaobvcEShXuuQ/KFar53kCZQq+eRy5Um/2BIoWq+vIwL114ccAQShSq4oARlClcHQIUKTxgIhUpVPVBQInCu9ELHw4TiruK4dXnM6l+eLndrFbXfavVppYm/HQ3tHfzPy+aDvyBxxd+8qzikS4Cc//A4wvzT+2f+HnFKYQv2U108Aa5s+MLs9d/h06amY4vzB4s5mMR5s7ZzLfsheckfPieITwj4ePohfejEeZeKbyA8H8GIXt/sfCbTmkg5A9C9iBkD0L2IGTvLz7iixTufM9oXri7wSvxjUJfTK+n/22Ze6fe4/KP+1I/z/mKsLrMYA7pZfTCzeiFy9ELL0cvrMYu1Gd9tDj0FftdPY9B6LTOv9t7+HXi0wu1ds5m37A//Fzu5EJr9WRinM4svpYv1NZYayc54Y8zE358qP2EWpuYzeyKw19UZBVWzYfH2k/oDBl15j0ow397jVPoQ3vz/sG+EqYp1Do9MdZktlIz/Ekjo9D7UJHQb7/7Smi1SUQdJ5vc4YLhZVM2oY+6JPRtRY/YtknobDza0RZIR73fRz66NW2c8VhR0gCm+9ntcpdupgY/d+IT+mZRNUkY2lnn29C2oapL2snSUMWV35a2T7p1+33vMub3ctffTncc+ra9gk3omy6iolAFvwi+C74JqqnL7VrTONFKR2xa8zh3GtNPovEWmkn7+/VjusWTcPjhkG0Mm6pRKgqL5qZVftGFm1AEEiaLSULTI/oBtbQsDqAt06fXEaSjo7Fvwn/ORtg1Dc2lJKQvmqIJxUzVLq0oHQviB1FKTcf2OHXqMunjMkdC+rof5bexTPvh+myEcegq2gXbKOySsAk+zjT2VUirrLfKNIZlP4bbkaOt84OQTlSdc93wlePaD4MPzawLNJhR2MZ55mbRXqaNM26m9r3QbbfBtIjGznwUunS7Lu3ETBiuoXIJ6XRGNQufhLS9+q5Tv0oXx8vR7EE7XNzByu0ZjOlnVNPD02xD9+k/nKXi2Oun8xEWcfoMoY1Hw9CfuS1CaOKWOpvV9Xpdz8K8ns3S5/UkTZ79YS+drcUBi0+f9H07r0Oo6/hv1vN6Pg+z+bw9q/9xIP3poXQu8/qdz13zfjsHde/ORnde8+ZYL7xuwR2E7EHIHoTsQcgehOxByB6E7EHIHoTsQcgehOxByB6E7EHIHoTsQcgehOxByB6E7EHIHoTsQcgehOxByB6E7EHIHoTsQcgehOxByB6E7EHIHoTsQcgehOxByB6E7B1fmPvN+/EI68vdMfyq4c5O8Pctcn3Tzzvh3z88UhDKD0L5QSg/COUHofwglB+E8oNQfhDKD0L5QSg/COUHofwglB+E8oNQfhDKD0L5QSg/COUH4Qgi4aiNcQy7aty1/wIHoWRbhVPX2wAAAABJRU5ErkJggg==" width="90" height="60"><i class="fab fa-facebook"></i></a>
      <a href="#"><img src="data:image/png;base64,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" width="50" height="60"><i class="fab fa-facebook"></i></a>
      <a href="#"><img src="https://www.infofueguina.com/u/fotografias/m/2020/12/18/f1280x720-77468_209143_5050.jpg" width="90" height="60"><i class="fab fa-facebook"></i></a>
    </div>
    <div class="contacto">
      <i class="fas fa-phone"></i>
      <span>(123) 456-7890</span>
    </div>
  </div>
</footer>

        <script src="js/script.js"></script>
</body>
</html>
