//funcion del elemento click
document.getElementById("btn_open").addEventListener("click", open_close_menu);

// Cambiar el contenido del main al hacer clic en los enlaces
document.getElementById("link-portafolio").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("main-inicio").style.display = "none";
    document.getElementById("main-portafolio").style.display = "block";
    document.getElementById("main-cursos").style.display = "none";
});

document.getElementById("link-inicio").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("main-portafolio").style.display = "none";
    document.getElementById("main-inicio").style.display = "block";
    document.getElementById("main-cursos").style.display = "none";
});

document.getElementById("link-cursos").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("main-inicio").style.display = "none";
    document.getElementById("main-portafolio").style.display = "none";
    document.getElementById("main-cursos").style.display = "block";
});




//Declaramos variables
var side_menu = document.getElementById("menu_side");
var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");

//Evento para mostrar y ocultar menú
    function open_close_menu(){
        body.classList.toggle("body_move");
        side_menu.classList.toggle("menuSlide_move");
    }

//Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página

if (window.innerWidth < 760){

    body.classList.add("body_move");
    side_menu.classList.add("menuSlide_move");
}

//Haciendo el menú responsive(adaptable)

window.addEventListener("resize", function(){

    if (window.innerWidth > 760){

        body.classList.remove("body_move");
        side_menu.classList.remove("menuSlide_move");
    }

    if (window.innerWidth < 760){

        body.classList.add("body_move");
        side_menu.classList.add("menuSlide_move");
    }

});