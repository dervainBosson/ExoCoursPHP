 </main><!-- /.container -->
 <hr>
 <div class="row">
    <div class="col-md-4">
      <?php 
         require_once dirname(__DIR__) . DIRECTORY_SEPARATOR ."functions" . DIRECTORY_SEPARATOR . "compteur.php";
         ajouter_vue();
         $nbVue = afficher_nombre_vues();
      ?>
      il y a eu <?= $nbVue ;?> visite<?php if($nbVue > 1): ?>s <?php endif; ?> sur le site
    </div>
    <div class="col-md-4">
       <?php if ($_SERVER['PHP_SELF'] !== "/newsletter.php") : ?>
          <form method="post" action="/newsletter.php" class="form-inline">
             <input name="email" class="form-control mr-sm-2" type="email" required>
             <button type="submit" class="btn btn-primary">S'inscrire</button>
          </form>
       <?php endif; ?>
    </div>
    <div class="col -md-4">
       <h5>Navigation</h5>
       <ul class="list-unstyled text -small">
          <?= nav_menu(); ?>
       </ul>
    </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>

 </html>