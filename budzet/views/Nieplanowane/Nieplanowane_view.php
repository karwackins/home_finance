<h3>Wydatki nieplanowane w okresie od <?= $this->okres_rozliczeniowy ?></h3>
<table class="table">
    <tr>
        <th>Podkategoria</th>
        <th>Kwota wydatku</th>
    </tr>
<?php
    $suma = 0;
    foreach ($this->pobierzNieplanowane as $value)
    { 
        echo'<tr><td>'.$value[0].'</td><td>'.$value[1].' zł </td><td> </td></tr>';
        $suma = $suma + $value[1];
    }
    echo '<tr><td></td><td><b>Suma: '.$suma.' zł</b></td><td></td></tr>'
?>
</table>
</body>
</html>