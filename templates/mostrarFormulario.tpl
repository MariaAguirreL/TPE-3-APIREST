{include "header.tpl"}

<main>
<form action="Iniciarsesion" method="post"> <!--al ser formulario va con este metodo-->
<div class="mb-3">
  <label for="usuario" class="form-label">usuario</label>
  <input type="text" class="form-control" name="usuario">
</div>
<div class="mb-3">
  <label for="contraseña" class="form-label">Password</label>
  <input type="password" class="form-control" name="contraseña">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</main>
{include "footer.tpl"}
</body>
</html>