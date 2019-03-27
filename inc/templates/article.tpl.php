
      <div class="row">

        <main class="col-12">

            <article class="card border-light">
              <div class="card-body">
                <h2 class="card-title"><?= $article->title; ?></h2>
                <p class="card-text"><?= $article->content; ?></p>
                <p>Posté par <a href="#" class="card-link"><?= $article->author; ?></a> le <?= $article->getDateFr(); ?> dans <a href="#" class="card-link ml-0">#<?= $article->category; ?></a></p>
              </div>
            </article>

          <nav aria-label="Page navigation example" class="mt-3">
            <ul class="pagination justify-content-between">
              <li class="page-item"><a class="page-link" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Revenir à l'accueil</a></li>
            </ul>
          </nav>

        </main>

      </div>