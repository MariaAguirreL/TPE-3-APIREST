{include 'header.tpl'};


<form method="POST" action="?action=eliminarChocolate&id=<?= $chocolate->id ?>">
    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este chocolate?');">Eliminar</button>
</form>


</div>
<?php endforeach; ?>


{include 'footer.tpl'}