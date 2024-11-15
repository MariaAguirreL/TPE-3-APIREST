{include "header.tpl"}

<main>

    <a href="logout"> Cerrar Sesion</a>

<a href="formnuevochocolate">Agregar chocolate</a>
{foreach $chocolates as $choco}
    <h2>{$choco->SABOR}</h2>
    <a href="borrarchocolate/{$choco->ID}">Eliminar</a>
    <a href="formeditarchocolate/{$choco->ID}">Editar</a>
{/foreach}

<div>   
<h1> Listados de combos</h1>
<a href="formnuevocombo">Agregar Combo </a>
{foreach $combos as $combo}
    <h2>{$combo->NOMBRE}</h2>
    <button>
    <a href="borrarcombo/{$combo->ID}">Eliminar</a>
    </button>
    <button>
    <a href="formeditarcombo/{$combo->ID}">Editar</a>
    </button>
{/foreach}
</div>
</main>
{include "footer.tpl"}
</body>
</html>