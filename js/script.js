// Código para mostrar y ocultar la vista ampliada
function mostrarImagen(imagen) {
    var vistaAmpliada = document.getElementsByClassName("vista-ampliada")[0];
    var imagenAmpliada = vistaAmpliada.getElementsByClassName("imagen-ampliada")[0];
    var cerrar = vistaAmpliada.getElementsByClassName("cerrar")[0];
    imagenAmpliada.src = imagen.src;
    vistaAmpliada.style.display = "block";
    cerrar.onclick = function() {
      vistaAmpliada.style.display = "none";
    }
  }
  
  function cerrarImagen() {
    var vistaAmpliada = document.getElementsByClassName("vista-ampliada")[0];
}  