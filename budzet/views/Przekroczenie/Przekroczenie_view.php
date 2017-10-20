<h3>Wydatki przekraczające plan w okresie od <?= $this->okres_rozliczeniowy; ?></h3>
<table class="table">
    <tr>
        <th>Podkategoria</th>
        <th>Kwota planu</th>
        <th>Kwota wydatków</th>
        <th>Przekroczone o</th>
    </tr>
<?php
    $suma = 0;
    foreach ($this->pobierzPrzekroczone as &$value) 
    {
        if($value[1] > $value[2]) {
        $roznica = $value[2] - $value[1];
        echo '<tr><td>'.$value[0].'</td><td>'.$value[2].' zł</td><td>'.$value[1].' zł</td><td>'.$roznica.' zł</td></tr>';
        $suma = $suma + $roznica;
        }
     
    }
    echo '<tr><td></td><td></td><td></td><td><b>Łącznie: '.$suma.' zł</b></td><td></td></tr>'
?>
</table>
</body>
</html>