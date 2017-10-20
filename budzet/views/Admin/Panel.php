
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Budżet domowy</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
          <?php require_once 'views/AdminNavs.php'; ?>

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h2>Panel</h2>
          <form class="form-inline" method="POST" action="./OkresRozUp">
            <div class="input-group col-lg-4">
                <span class="input-group-addon" id="basic-addon3">Data rozpoczęcia okresu rozliczeniowego</span>
                <input type="text" class="form-control" id="datepicker" name="data_rozp" value="<?= $this->okres_roz_p; ?>" >
            </div>    
               <button type="submit" class="btn btn-primary">Ustaw</button>
          </form>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
