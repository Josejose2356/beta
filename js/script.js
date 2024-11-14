
        function redirigir() {
            var seleccionado = document.querySelector('input[name="item_seleccionado"]:checked').value;
            
            if (seleccionado === "registro_usuarios") {
                window.location.href = "../pag2/registro_usuarios.html";  
            } else if (seleccionado === "Orden_matenimiento") {
                window.location.href = "../pag1/orden_matenimiento.html";  
            } else if (seleccionado === "indicadores") {
                window.location.href = "../pag3/indicadores.html";  
            } else if (seleccionado === "repuestos") {
                window.location.href = "../pag4/repuestos.html";  
            }
        }

