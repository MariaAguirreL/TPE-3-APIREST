{include 'header.tpl'}

<div class="container">

    <h3>Agregar un combo </h3>
    <form action="agregarcombo" method="post">
                
        <label>Nombre</label>
        <input name="nombre" type="text" required>
        <select name="fk_chocolate"> 
            {foreach $chocolates as $chocolate}
                <option  value="{$chocolate->ID}">
                    {$chocolate->SABOR}
                </option>
            {/foreach} 
        </select>
        <button type="submit">Agregar</button>
        <a href="paneldecontrol" type="button">Cancelar</a>         
        </form>  
          
    </div>