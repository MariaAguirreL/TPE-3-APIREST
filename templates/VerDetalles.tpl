<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Detalles</title>
</head>
<body>
    <header">
        <h1>Todos Los Detalles</h1>
    </header>

<main>
        {foreach $combos as $combo} <!-- recorro el arreglo-->

            <h3>{$combo->NOMBRE}</h3>
                <p>Nombre: {$combo->NOMBRE}</p>
                <p>Cantidad: {$combo->CANTIDAD}</p>
            
            <a href="index.php?action=VerDetalles/{$combo->ID}">Ver Detalles</a>
        {/foreach}

</main>

    <footer>
    
        <p>&copy; 2024 ChocoAras</p>
    </footer>
</body>
</html>