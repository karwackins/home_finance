  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
  } );
  </script>
<body>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
      </div>
    </nav>
    </div>
    <div class="container-fluid">
      <div class="row">
          <?php require_once 'views/AdminNavs.php'; ?>

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
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

  </body>
</html>