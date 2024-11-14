<!DOCTYPE html>
<html>
<head>
    <title>Combo Box Dinámico de Tres Niveles</title>
    <style type="text/css">
        .seleccion {
            border: 3px solid #58ACFA;
            background-color: #2ECCFA;
            color: white;
            font-size: 17px;
            width: 150px;
            height: 35px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <form name="formulario1" action="#">
        <!-- Combo box de Departamentos -->
        <select class="seleccion" name="departamento" id="departamento" onchange="cambiaProvincias()">
            <option value="0">Seleccione Departamento</option>
            <?php
                include('conexion.php');
                $db = new CodeaDB();
                $departamentos = $db->buscar("departamentos", "1=1");
                foreach ($departamentos as $dep) {
                    echo "<option value='{$dep['id_dep']}'>{$dep['nomb_dep']}</option>";
                }
            ?>
        </select>
        
        <!-- Combo box de Provincias -->
        <select class="seleccion" name="provincia" id="provincia" onchange="cambiaMunicipios()">
            <option value="0">Seleccione Provincia</option>
        </select>
        
        <!-- Combo box de Municipios -->
        <select class="seleccion" name="municipio" id="municipio">
            <option value="0">Seleccione Municipio</option>
        </select>
    </form>

    <script type="text/javascript">
        function cambiaProvincias() {
            var departamentoId = document.getElementById("departamento").value;
            fetch(`provincias.php?id_dep=${departamentoId}`)
                .then(response => response.json())
                .then(data => {
                    let provinciaSelect = document.getElementById("provincia");
                    provinciaSelect.innerHTML = '<option value="0">Seleccione Provincia</option>';
                    data.forEach(provincia => {
                        provinciaSelect.innerHTML += `<option value="${provincia.id_pro}">${provincia.nomb_pro}</option>`;
                    });
                    // Reseteamos el combo de municipios
                    document.getElementById("municipio").innerHTML = '<option value="0">Seleccione Municipio</option>';
                });
        }

        function cambiaMunicipios() {
            var provinciaId = document.getElementById("provincia").value;
            fetch(`municipios.php?id_pro=${provinciaId}`)
                .then(response => response.json())
                .then(data => {
                    let municipioSelect = document.getElementById("municipio");
                    municipioSelect.innerHTML = '<option value="0">Seleccione Municipio</option>';
                    data.forEach(municipio => {
                        municipioSelect.innerHTML += `<option value="${municipio.id_mun}">${municipio.nomb_mun}</option>`;
                    });
                });
        }
    </script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("provincia").addEventListener("change", function () {
            let id_pro = this.value;
            fetch(`municipios.php?id_pro=${id_pro}`)
                .then(response => response.json())
                .then(data => {
                    let municipioSelect = document.getElementById("municipio");
                    municipioSelect.innerHTML = "<option value=''>Seleccione Municipio</option>";
                    data.forEach(municipio => {
                        let option = document.createElement("option");
                        option.value = municipio.id_mun;
                        option.textContent = municipio.nomb_mun;
                        municipioSelect.appendChild(option);
                    });
                })
                .catch(error => console.error("Error cargando municipios:", error));
        });
    });
</script>

</body>
</html>
