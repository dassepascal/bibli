<?php
ob_start() ;
?>
<form>
  <div class="form-group">
    <label for="titre">Titre:</label>
    <input type="text" class="form-control" id="titre" >
  </div>
    <div class="form-group">
    <label for="nbPages">Nombre de pages:</label>
    <input type="number" class="form-control" id="nbPages" >
    </div>
  <div class="form-group">
    <label for="image">choix couverture</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
</form>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Ajouter d'un livre";
require('template.php');
?>
