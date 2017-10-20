<body>

    <div class="container-fluid">
      <div class="row">
         <?php require_once 'views/AdminNavs.php'; ?>
          <div class="col-sm-9">
          <h3>Ustawienie planu w okresie rozliczeniowym od <?= $this->okresRoz; ?> </h3>
          <hr>
          <div class="row">
            <div class="col">
                <h4>Ustawienie planu przychodów</h4>   
            </div>
             <div class="col">
                <h4>Ustawienie planu wydatków</h4>    
                <form name="wydatki_form" action="../zapiszPlan" method="POST">
                    <table>
                    <?php
                         foreach ($this->ustawPlan as $value) { 
                             if(isset($value[2])){
                                 $kwota = $value[2];
                             }else
                             {
                                 $kwota = '0.00';
                             }
                            //echo '<tr><td>'.$value[1].'</td><td><input name=podkategoria'.$value[0].' style="visibility: hidden" value='.$value[0].' /></td><td><input name=plan'.$value[0].' type="text" /></td></tr>';
                            echo '<tr><td>'.$value[1].'</td><td><input name=podkategoria'.$value[0].' style="visibility: hidden" value='.$value[0].' /></td><td><input name=plan'.$value[0].' type="text" value='.$kwota.' /></td></tr>';
                        }  
                    ?>
                    </table>
                    <input type="submit" value="Zapisz" /> 
                </form>
             </div>
          </div>
          </div>
      </div>
    </div>
  </body>
</html>