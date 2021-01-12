<?php





ob_start() ?>

<table class="table text-center">
  <tr class="table-dark">
    <th>Image</th>
    <th>Titre</th>
    <th colspan="2">Actions</th>
  </tr>
  <!-- modification de l'affichage je n'ai plus l'information $livres;-->



  <?php for ($i = 0; $i < count($livres); $i++) : ?>

    <tr>
      <td class="align-middle"><img src="public/images/<?= $livres[$i]->getImage(); ?>" width="60"></td>
     <!-- ajout d'un lien dans le titre pour ajouter une description-->
      <td class="align-middle"><a href="<?= URL ?>livres/l/<?= $livres[$i]->getId() ?>"><?= $livres[$i]->getTitre() ?></a></td>
      <td class="align-middle"><?= $livres[$i]->getNbPages() ?></td>
      <td class="align-middle"><a href="#" class="btn btn-warning">Modifier</td>
      <td class="align-middle">
      <form method="post" action="<?= URL ?>livres/s/<?= $livres[$i]->getId();?>" onSubmit = "return confirm('Voulez-vous vraiment supprimer le livre')">
      <button class="btn btn-danger" type="submit" >Supprimer</button>
      </form>
     </td>
    </tr>

  <?php endfor ?>


</table>
<a href="<?=URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>
<?php
$content = ob_get_clean();
$titre = "Les livres de la bibliothéques";
require('template.php');
?>
