    <!-- NAV -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">

      <a class="navbar-brand" href="#">A la dérive</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <?php foreach ($dataCategoriesList as $oCategory) : ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><?= $oCategory->name; ?></a>
            </li>
          <?php endforeach; ?>

        </ul>
      </div>
    </nav>
    <!-- /NAV -->