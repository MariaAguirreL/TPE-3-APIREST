{include 'header.tpl'}

<div class="container">

        <h3>Agregar un chocolate </h3>
    <form action="agregarchocolate" method="post">
                
        <label>Sabor</label>
        <input name="sabor" type="text" required>
        <label>Relleno</label>
        <input name="relleno" type="text" required>
        <label>Empaque</label>
        <input name="empaque" type="text" required>

        <button type="submit">Agregar</button>
        <a href="paneldecontrol" type="button">Cancelar</a>         
        </form>    
    </div>