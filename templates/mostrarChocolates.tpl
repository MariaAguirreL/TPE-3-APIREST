{include 'header.tpl'}

<main>
        {foreach $chocolates as $choco}
            <h3>{$choco->SABOR}</h3>
            <p>Relleno: {$choco->RELLENO}</p>
            <p>Empaque: {$choco->EMPAQUE}</p>
            <<a href="index.php?action=combosporchocolate/{$choco->ID}">Ver todos los combos por chocolate</a>
        {/foreach}

</main>
{include "footer.tpl"}
</body>
</html>