{include 'header.tpl'}

<div class="container">

    <h3> Editar un combo </h3>
    
    <form action="guardarcomboeditado" method="post">
                
        <label>Nombre</label>
        <input name="id" type="hidden" value="{$combo->ID}">
        <input name="nombre" type="text" required value="{$combo->NOMBRE}">
        
        <select name="fk_chocolate" type="number" required>
                {foreach $chocolates as $chocolate}
                    <option  value="{$chocolate->ID}" {if $chocolate->ID == $combo->FK_CHOCOLATE}selected{/if}>
                        {$chocolate->SABOR}
                    </option>
                {/foreach}
        </select>
       
        <button type="submit">Guardar</button>
        <a href="paneldecontrol">Cancelar</a>         
        </form>    
    </div>