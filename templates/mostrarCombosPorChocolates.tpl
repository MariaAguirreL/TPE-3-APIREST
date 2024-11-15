<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Combos</title>
</head>
<body>
    <header">
        <h1>Listado de combos por chocolate</h1>
    </header>

<main>
        {foreach $combos as $combo} <!-- recorro el arreglo-->
            <h3>{$combo->NOMBRE}</h3>
             <p>Categoria: {$combo->SABOR}</p>
            <a href="index.php?action=detallescombo/{$combo->ID}">Ver Detalles</a>
        {/foreach}

</main>

{include "footer.tpl"}
</body>
</html>