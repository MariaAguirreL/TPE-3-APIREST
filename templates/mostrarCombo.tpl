<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver combo</title>
</head>
<body>
    <header">
        <h1>Descripcion de combo</h1>
    </header>

<main>
            <p> Nombre del combo: {$fila->NOMBRE}</p>
            <p> Presentacion del combo {$fila->descripcion}</p>
            <p> Tipo de chocolate: {$fila->SABOR}</p>
            <p> Relleno del chocolate: {$fila->RELLENO}</p>
            <p> Material de empaque: {$fila->EMPAQUE}</p>
            
            

            
       
</main>

{include "footer.tpl"}
</body>
</html>