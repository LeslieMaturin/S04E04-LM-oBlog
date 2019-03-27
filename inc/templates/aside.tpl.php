<aside class="d-none d-lg-block col-lg-3">

<!--
  Champ de recherche
-->
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Rechercher" aria-label="Rechercher" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Allez</button>
  </div>
</div>

<!--
  Catégorie
-->
<div class="card mb-3" style="width: 18rem;">
  <div class="card-header font-weight-bold">
    Catégories
  </div>
  <ul class="list-group list-group-flush">

    <?php foreach ($dataCategoriesList as $oCategory) : ?>
      <li class="list-group-item text-uppercase"><?= $oCategory->name; ?></li>
    <?php endforeach; ?>

  </ul>
</div>

<!--
  Auteurs
-->
<div class="card" style="width: 18rem;">
    <div class="card-header font-weight-bold">
      Auteurs
    </div>
    <ul class="list-group list-group-flush">

      <?php foreach ($dataAuthorsList as $oAuthor) : ?>
        <li class="list-group-item text-lowercase"><?= $oAuthor->name; ?></li>
      <?php endforeach; ?>

    </ul>
  </div>

</aside>