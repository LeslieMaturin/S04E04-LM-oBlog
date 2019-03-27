
      <div class="row">

        <main class="col-12 col-lg-9">

          <?php foreach ($dataArticlesList as $article_id => $oArticle) : ?>
            <article class="card border-light">
              <div class="card-body">
                <h2 class="card-title"><a href="article.php?id=<?= $article_id; ?>"><?= $oArticle->title; ?></a></h2>
                <p class="card-text"><?= $oArticle->content; ?></p>
                <p>Posté par <a href="#" class="card-link"><?= $oArticle->author; ?></a> le <?= $oArticle->getDateFr(); ?> dans <a href="#" class="card-link ml-0">#<?= $oArticle->category; ?></a></p>
              </div>
            </article>
          <?php endforeach; ?>

          <nav aria-label="Page navigation example" class="mt-3">
            <ul class="pagination justify-content-between">
              <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i> Précédent</a></li>

              <li class="page-item"><a class="page-link" href="#">Suivant <i class="fas fa-long-arrow-alt-right"></i></a></li>
            </ul>
          </nav>

        </main>

        <?php include 'aside.tpl.php'; ?>

      </div>