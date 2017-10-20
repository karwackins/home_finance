<h3>Plan budżetu w okresie od <?= $this->okres_rozliczeniowy; ?></h3>
<table class="table">
    <tr>
        <th>Podkategoria</th>
        <th>Kwota planu</th>
        <th>Kwota wykonania</th>
    </tr>
<?php

    foreach ($this->pobierzPlan as $value)
    { 
        echo'<tr><td>'.$value[1].'</td><td>'.$value[2].'</td><td> </td></tr>';  
    }
?>
</table>
</body>
</html>