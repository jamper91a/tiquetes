<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Crear Persona'); ?></legend>
        <?php
        echo $this->Form->input('pistola', array(
            'label' => 'Lector de cédulas',
            'type' => 'password'
        ));

        echo $this->Form->input('document_type_id', array(
            "div" => array(
                "class" => "input text"
            ),
            "label" => "Tipo de Documento",
            "options" => $documentTypes,
//            "empty" => "Seleccione un tipo de documento",
            "required" => "true",
        ));
        ?>
        <div class="input text required">
            <label for="PersonPersDocumento">Número de Documento</label>
            <input id="PersonPersDocumento" type="text" required="required" maxlength="50" name="data[Person][pers_documento]"/>
            <input id="buscar" type="button"  name="buscar" value='Buscar'/>
        </div>
        <?php
        echo $this->Form->input('pers_primNombre', array(
            'label' => 'Nombres',
        ));
        echo $this->Form->input('pers_primApellido', array(
            'label' => 'Apellidos',
        ));
        echo $this->Form->input('pers_empresa', array(
            'label' => 'Empresa',
        ));
        echo $this->Form->input('cargo', array(
            'label' => 'Cargo',
        ));
        echo $this->Form->input('pers_telefono', array(
            'label' => 'Telefono',
        ));
        echo $this->Form->input('pers_celular', array(
            'label' => 'Celular',
        ));
        echo $this->Form->input('pers_mail', array(
            'label' => 'E-mail',
            'type' => 'email'
        ));
        echo $this->Form->input('ciudad', array(
            'label' => 'Ciudad',
            'value' => 'MEDELLIN',
        ));
        echo $this->Form->input('pais', array(
            'label' => 'País',
            'value' => 'COLOMBIA',
        ));
        ?>

        <div class="input select">
            <label for="PersonSector">Sector</label>
            <select id="PersonSector"  name="data[Person][sector]">
                <option value="">Seleccione un sector</option>
                <option value="Academia">Academia</option>
                <option value="Alimentos y bebidas">Alimentos y bebidas</option>
                <option value="Caficultor">Caficultor</option>
                <option value="Comercializador">Comercializador</option>
                <option value="Comite">Comité</option>                
                <option value="Cooperativa">Cooperativa</option>
                <option value="Especialista en cafe">Especialista en cafe</option>
                <option value="Estudiante">Estudiante</option>
                <option value="Exportador">Exportador</option>
                <option value="Fabricante / distribuidor equipos">Fabricante / distribuidor equipos</option>
                <option value="Fabricante / distribuidor Insumos">Fabricante / distribuidor Insumos</option>
                <option value="Ferias">Ferias</option>
                <option value="Mercadeo y publicidad">Mercadeo y publicidad</option>
                <option value="Montaje">Montaje</option>
                <option value="Tostador">Tostador</option>              
                <option value="otro">otro</option>                
            </select>
        </div><?php
        echo $this->Form->input('categoria_id', array(
            'label' => 'Categoría',
            'required' => 'true',
            "options" => $categorias, 
            "empty" => "Seleccione una categoria"
        ));
        echo $this->Form->input('stan', array(
            'label' => 'No. Stand',
        ));
        ?>       
        <div id="adicionales" name="adicionales" style="display: none;" >
            <?php
//            echo $this->form->input('producto', array(
////                "name" => $mnus['Product']['product_id'],
//                "label" => "Por favor seleccione los productos",
//                "type" => "select",
//                "multiple" => "checkbox",
//                'options' => $products,
//            ));
//            echo $this->Form->input('stand', array(
//                'label' => 'Número de Stand'
//            ));
            ?>
            <input type="hidden" name="data[people][pers_id]" id="PeoplePers_id">
        </div>
        <?php
//        echo $this->Form->input('pers_tipoSangre', array(
//            'label' => 'Tipo de Sangre',
//        ));
//        echo $this->form->input('input_identificador', array(
//            'label' => 'Identificador de Escarapela',
//            'required' => 'true'
//        ));
//        echo $this->form->input('input_codigo', array(
//            'label' => 'Codigo RFID',
//            'required' => 'true',
//            'type' => 'password'
//        ));
        ?>

    </fieldset>
    <input value="Crear" id="crear" name="crear" type="submit">
</div>

<script>

    $("#PersonCategoriaId").change(function() {
        if ($("#PersonCategoriaId").val() === "2") {
            $("#adicionales").css("display", "block");
        } else {
            $("#adicionales").css("display", "none");
        }

    });

</script>
<script>
    $("#buscar").click(function() {
//            alert("aasd");
        var url = urlbase + "companies/search.xml";
        var datos = {
            documento: $("#PersonPersDocumento").val()
        };
        ajax(url, datos, function(xml) {
            $("datos", xml).each(function() {
                var obj = $(this).find("Person");
                var nombre, td, apellido,cat, ciudad, direccion, telefono, exp, ciu, sec, mail, ins, st, car, pai, emp, cel;
                id = $("id", obj).text();
                td = $("document_type_id", obj).text();
                cat = $("categoria_id", obj).text(); 
                nombre = $("pers_primNombre", obj).text();
                apellido = $("pers_primApellido", obj).text();
                ciudad = $("city_id", obj).text();
                direccion = $("pers_direccion", obj).text();
                telefono = $("pers_telefono", obj).text();
                cel = $("pers_celular", obj).text();
                mail = $("pers_mail", obj).text();
                ciu = $("ciudad", obj).text();
                ins = $("pers_institucion", obj).text();
                car = $("cargo", obj).text();
                exp = $("pers_expedicion", obj).text();
                emp = $("pers_empresa", obj).text();
                pai = $("pais", obj).text();
                st = $("stan", obj).text();
                sec = $("sector", obj).text();
//                alert(sec);
                if (nombre !== "") {
                    $("#PeoplePers_id").val(id);
                    $("#PersonPersPrimNombre").val(nombre);
                    $("#PersonPersPrimApellido").val(apellido);
                    $("#PersonPersDireccion").val(direccion);
                    $("#PersonPersTelefono").val(telefono);
                    $("#PersonPersExpedicion").val(exp);
                    $("#PersonCiudad").val(ciu);
                    $("#PersonPersMail").val(mail);
                    $("#PersonPersInstitucion").val(ins);
                    $("#PersonCargo").val(car);
                    $("#PersonPersEmpresa").val(emp);
                    $("#PersonPersCelular").val(cel);
                    $("#PersonPais").val(pai);
                    $("#PersonStan").val(st);
                    $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
                    $('#PersonSector option[value="' + sec + '"]').attr("selected", true);
                    $('#PersonCategoriaId option[value="' + cat + '"]').attr("selected", true);
                    $('#PersonDocumentTypeId option[value="' + td + '"]').attr("selected", true);
                } else {
//                    console.log("asdasd");
                    $("#PersonPersPrimNombre").val("");
                    $("#PersonPersPrimApellido").val("");
                    $("#PersonPersDireccion").val("");
                    $("#PersonPersTelefono").val("");
                    $("#PersonPersExpedicion").val("");
                    $("#PersonCiudad").val("");
                    $("#PersonPersMail").val("");
                    $("#PersonPersInstitucion").val("");
                    $("#PersonCargo").val("");
                    $("#PersonPersEmpresa").val("");
                    $("#PersonPersCelular").val("");
                    $("#PersonPais").val("");
                    $("#PersonStan").val("");
                    $('#PersonDocumentTypeId').val($('#PersonDocumentTypeId > option:first').val());
                    $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
                    $('#PersonSector').val($('#PersonSector > option:first').val());
                    alert("No se encuentra una persona registrada con ese número de documento");
                }
            });
        });
    });

    $("#PersonCargo").on('keyup', function() {
        $("#PersonCargo").val(conMayusculas($(this).val()));
    });
    $("#PersonPersEmpresa").on('keyup', function() {
        $("#PersonPersEmpresa").val(conMayusculas($(this).val()));
    });

    $("#PersonPais").on('keyup', function() {
        $("#PersonPais").val(conMayusculas($(this).val()));
    });
    $("#PersonPersPrimNombre").on('keyup', function() {
        $("#PersonPersPrimNombre").val(conMayusculas($(this).val()));
    });
    $("#PersonPersPrimApellido").on('keyup', function() {
        $("#PersonPersPrimApellido").val(conMayusculas($(this).val()));
    });
    $("#PersonPersDireccion").on('keyup', function() {
        $("#PersonPersDireccion").val(conMayusculas($(this).val()));
    });
    $("#PersonPersExpedicion").on('keyup', function() {
        $("#PersonPersExpedicion").val(conMayusculas($(this).val()));
    });
    $("#PersonCiudad").on('keyup', function() {
        $("#PersonCiudad").val(conMayusculas($(this).val()));
    });
    $("#PersonPersMail").on('keyup', function() {
        $("#PersonPersMail").val(conMayusculas($(this).val()));
    });
    $("#PersonPersInstitucion").on('keyup', function() {
        $("#PersonPersInstitucion").val(conMayusculas($(this).val()));
    });
    $("#PersonPersCargo").on('keyup', function() {
        $("#PersonPersCargo").val(conMayusculas($(this).val()));
    });

    $("#crear").click(function() {
        setTimeout('limpiar()', 3000);

    });
    function limpiar() {
        $("#PersonPistola").val("");
        $("#PersonPersDocumento").val("");
        $("#PersonPersPrimNombre").val("");
        $("#PersonPersPrimApellido").val("");
        $("#PersonPersEmpresa").val("");
        $("#PersonCargo").val("");
        $("#PersonPersTelefono").val("");
        $("#PersonPersCelular").val("");
        $("#PersonPersMail").val("");
        $("#PersonCiudad").val("");
        $("#PersonPais").val("");
        $("#PersonStan").val("");
        $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
        $('#PersonSector').val($('#PersonSector > option:first').val());
        $('#PersonDocumentTypeId').val($('#PersonDocumentTypeId > option:first').val());
        location.reload();
    }



</script>
<script>
    $(document).ready(function() {//Esta funcion se activa cuando se este ingresando texto en el cuadro
        $("input[type='password']").on('input', function(e) {
            if ($('#PersonPistola').val().length === 170)
            {
                var documento = "";
                var apellido1 = "";
                var apellido2 = "";
                var nombre = "";
                var nombre2 = "";
                var sangre = "";
                // alert($('#PersonPistola').val().length);
                var sw = 0;
                for (var i = 0; i < $('#PersonPistola').val().length; i++) {
                    if (i >= 48 && i < 58) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != "0" || sw == 1) {
                            sw = 1;
                            documento = documento + letra;
                        }
                    }
                    if (i >= 58 && i < 81) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            apellido1 = apellido1 + letra;
                        }
                    }
                    if (i >= 81 && i < 104) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            apellido2 = apellido2 + letra;
                        }
                    }
                    if (i >= 104 && i < 127) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            nombre = nombre + letra;
                        }
                    }
                    if (i >= 127 && i < 150) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            nombre2 = nombre2 + letra;
                        }
                    }
                    if (i >= 166 && i < 169) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            sangre = sangre + letra;
                        }
                    }
//                            $('#documento').val(documento);
                }
                $('#PersonPersDocumento').val(documento);
                $('#PersonPersPrimNombre').val(nombre + " " + nombre2);
                $('#PersonPersPrimApellido').val(apellido1 + " " + apellido2);
//                $('#PersonPersTipoSangre').val(sangre);
                $('#PersonPistola').val("");
//                $('#UserCategoriaId').focus();
//                        var url = "validar_admin.jsp"; // the script where you handle the form input. 

            }
        });
    });

</script>

