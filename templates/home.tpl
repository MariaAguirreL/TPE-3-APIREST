{include 'header.tpl'}
            <div class="container mt-2">
                <section>
                    <h4>Lista de chocolates</h4>
                </section>
                <section>
                <form method="post" action="loguerse">
                        <div class="mb-3">
                            <label for="exampleInputdescripcion1" class="form-label">Descripción</label>
                            <input  
                                    type="text" 
                                    class="form-control" 
                                    id="descripcion" name="descripcion" >
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputdescripcion1" class="form-label">Terminada</label>
                                <select class="form-select" name="terminada">
                                    <option value="N" selected>No</option>
                                    <option value="S">Si</option>
                                </select>                    
                            </div>
                            <div class="col">
                                <label for="exampleInputdescripcion1" class="form-label">Prioridad</label>
                                <input type="range" class="form-range" min="0" max="5" id="prioridad" name="prioridad">
                            </div>
                        </div>
                        <div class="row m-2">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>            

                </section>
                <section>
                    <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Terminada</th>
                        <th>Prioridad</th>
                        <th></th>
                    </tr>
                    
                    {foreach from=$tareas item=$tarea}
                        <tr>
                            <td> {$tarea->id} </td>
                            <td> {$tarea->descripcion} </td>
                            <td> {if {$tarea->terminada} == 'N'}
                                        No
                                    {else}
                                        Si
                                {/if}
                            </td>
                            <td> {$tarea->prioridad} </td>
                            <td><a href="editar/{$tarea->id}" type="submit" class="btn btn-success">Editar</a>
                                <a href="eliminar/{$tarea->id}" type="submit" class="btn btn-danger">Borrar</a></td>
                        </tr>
                     {/foreach}
                </table>
                </section>
            </div>
        </body>
        </html>