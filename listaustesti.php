<?php
require_once "libs/tuote-vanha.php";
require_once "libs/tietokantayhteys.php";
$lista = Tuote::etsiKaikkiTuotteet();
?>
<table>
<tr>
<th>Id</th>
<th>Nimi</th>
<th>Kuvaus</th>
<th>Hinta</th>
</tr>
<?php foreach($lista as $asia) { ?>
<tr>
<td><?php echo $asia->getId();?></td>
<td><?php echo $asia->getNimi();?></td>
<td><?php echo $asia->getKuvaus();?></td>
<td><?php echo $asia->getHinta();?></td>
</tr>
<?php } ?>
</table>