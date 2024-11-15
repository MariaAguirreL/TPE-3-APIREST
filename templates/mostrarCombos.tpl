<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Combos</title>
</head>
<body>
    <header">
        <h1>Listado de Combos</h1>
    </header>

<main>
        {foreach $combos as $combo}
            <h3>{$combo->NOMBRE} <a href="combos/{$combo->ID}">Ver mas</a> </h3>
        {/foreach}

</main>

{include "footer.tpl"}
</body>
</html>