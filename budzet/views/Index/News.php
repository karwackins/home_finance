<script>
 $(document).ready(function(){
        $("button#szukaj").click(function()
        {
            $("#szukaj_data").toggle("normal");
        });
});
    
   $(function(){
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });
  });   
</script> 
<body>
<div class="card">
<div class="container" style="text-align: center;">
    <h1>Budżet domowy</h1>

    <form name="wydatki_form" action="index/insert" method="POST">
         <div class="form-group">
      <select class="form-control" name="podkategorie">
        <option>Kategoria wydatku</option>
        <?php
            foreach ($this->podkategorie as $value) 
            {
                echo '<option value='.$value[0].'>'.$value[2].'</option>';
            }
        ?>
      </select>
         </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 col-form-label"></label>

          <input class="form-control" type="text" name="kwota_wydatku" placeholder="Kwota wydatku">

    </div>
    <div class="form-group">
      <div class="col-sm-20">
          <button type="submit" class="btn btn-primary">Zapisz</button> <button type="button" class="btn btn-primary" id="szukaj">Szukaj</button>
      </div>
    </div>
  </form>
    <div id="szukaj_data" >
        
    </div>
</div>

    
        <ul class="nav justify-content-center">
         <li class="nav-item">
            <a class="nav-link active" href="plan/">Plan miesięczny</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Fundusze oszczędnościowe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="nieplanowane/">Wydatki nieplanowane</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="przekroczenie/">Przekroczenie planu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="admin/">Panel administracyjny</a>
        </li>
        </ul>


    <p>Obecny okres rozliczeniowy od: <?= $this->okres_roz_p; ?></p>
<div id="szczegoly">
<div class="card">
  <div class="card-header">
      <h4>Plan budżetu</h4>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo '<p>Suma planowanych przychodów: <b>'. $this->plan_przychodow[0].' zł </b><br /></p>'; ?></p>
    <p class="card-text"><?php echo '<p>Suma planowanych wydatków: <b>'. $this->plan_wydatkow[0].' zł </b><br /></p>'; ?></p>
    <p class="card-text"><?php echo '<p>Pozostaje do rozdysponowania: <b>'. round($this->do_rozdysponowania,2).' zł </b></p>';?></p>
  </div>
</div>

<div class="card">
  <div class="card-header">
      <h4>Rzeczywista realizacja budżetu</h4>
  </div>
  <div class="card-body">
    <?php
    $suma_wydatkow = 0;
    $suma_przychodow = $this->przychody[0];

    foreach ($this->dane as &$value) 
    {
       $suma_wydatkow = $suma_wydatkow + $value[1];
    }
    
   ?>
      <p class="card-text"><?php echo 'Rzeczywiste przychody: <b>'.$suma_przychodow.'  zł </b>';?> </p>  
      <p class="card-text"><?php echo 'Rzeczywiste wydatki: <b>'.$suma_wydatkow.' zł </b>';?> </p>  
  
  
  </div>
</div>
<div class="card">

        <div class="card-header">
        <h4>Procent wydanego przychodu</h4>
        </div>
        <div class="card-body">
        <?php $procent_wyd_przy = ($suma_wydatkow*100)/$suma_przychodow; 
            echo'<b>'. round($procent_wyd_przy,2).' % </b>';
        ?>
        </div>


      <div class="card-header">
      <h4>Procent wydanego planowanego przychodu</h4>
      </div>
      <div class="card-body">
      <?php $procent_wyd_plan_przy = ($suma_wydatkow*100)/$this->plan_przychodow[0]; 
        echo'<b>'. round($procent_wyd_plan_przy,2).' % </b>';
      ?>
      </div>

</div>

<div class="card">
  <div class="card-header">
      <h4>Stopień realizacji budżetu w kategoriach</h4>
  </div>
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Kategoria</th>
      <th>Podategoria</th>
      <th>Suma wydatków</th>
      <th>Plan</th>
      <th>% realizacji</th>
      <th>% udziału <br />w budżecie</th>
    </tr>
  </thead>
<?php
    $kategorie = $this->kategorie;
    foreach ($kategorie as $value2) {
    echo '<tr><td><b>'.$value2[1].'</b></td><td></td><td><b>'.$value2[2].'</b></td><td></td><td></td></tr>';
     
        foreach ($this->dane as &$value) 
        {
            if($value[3] == $value2[0])
            {    
                if($value[2] != '0') {
                echo '<tr><td></td><td>'.$value[0].'</td><td>'.$value[1].' zł</td><td>'.$value[2].' zł</td><td>'.round($value[1]*100/$value[2],2).'%</td><td>'.round($value[1]*100/$suma_wydatkow,2).'</td></tr>';
                }
                else
                echo '<tr><td></td><td>'.$value[0].'</td><td>'.$value[1].' zł</td><td>'.$value[2].' zł</td><td>0%</td><td>'.round($value[1]*100/$suma_wydatkow,2).'</td></tr>';
            }  
            
        }
        
    }    
?>
    
</table>
</div>
    <div class="card">
  <div class="card-header">
      <h4>Ostatnie 10 wpisów wydatków</h4>
  </div>
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Data</th>
      <th>Kategoria</th>
      <th>Wydatek</th>
    </tr>
  </thead>
<?php
    foreach ($this->ostatniedziesiec as &$value) 
    {
        echo '<tr><td>'.$value[0].'</td><td>'.$value[1].'</td><td>'.$value[2].' zł</td></tr>';
    }
?>
    
</table>
</div>
</div>
</div>

<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
->