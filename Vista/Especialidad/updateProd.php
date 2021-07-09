<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type='text/javascript' src="../js/jquery-1.7.1.min.js" > </script>
	<script type='text/javascript'>
	$(function(){
		$("#codigo").focusout(function(){ 
			$.post("../../Controlador/ProductoController.php",
				{'opcion':'consultaxcodigo','codigo':$("#codigo").val()},respuesta1,'json');
		});
		
		$("#guardar").click(function(){ 
			$.post("../../Controlador/ProductoController.php",
				$("#datos").serialize(),respuesta2);
			window.location.href = "productos_tabla.php";
		});
	});

    function getParameterByName(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}

    function cargardatos()
	{
		$.post("../../Controlador/ProductoController.php",
				{'opcion':'consultaxcodigo','codigo':getParameterByName('id')},respuesta1,'json');
		$.post("../../Controlador/CategoriaController.php",
				{'opcion':'combo'},respuestaCombo);	
	}
    
    function respuesta1(arg)
	{	
        $("#codigo").val(arg[0].id_producto);
        $("#nombre").val(arg[0].nombre);
		$("#descripcion").val(arg[0].descripcion);
		$("#categoria").val(arg[0].id_categoria);
		$("#precio").val(arg[0].precio);
		$("#stock").val(arg[0].stock);
		$("#marca").val(arg[0].marca);
		$("#imagen").val(arg[0].img);
	}

    function respuestaCombo(arg)
	{
		$("#categoria").append(arg);
	}

    function respuesta2(arg)
	{
		alert(arg);
	}
	window.onload=cargardatos;

    </script>
</head>
<body>
<h1>Modifique el producto</h1>
<form id="datos">
        <input type="text" class="form-control" name="opcion" value="actualizar" hidden />

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="codigo">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="categoria">Categoria:</label>
                <select class="form-control" name="categoria" id="categoria"></select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="precio">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="stock">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="marca">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="imagen">Nombre de imagen:</label>
                <input type="text" class="form-control" id="imagen" name="imagen" placeholder="lapiz.jpg">
            </div>
        </div>

        <button type="button" class="btn btn-dark" id="guardar" >Guardar</button>

    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>