<h2>Lisää tuote</h2>
<form action="tuote.php" method="post">
    <label for="nimi">Nimi</label><input type="text" name="nimi" /><br />
    <label for="kuvuas">Kuvaus</label><input type="text" name="kuvaus" /><br />
    <label for="hinta">Hinta</label><input type="text" name="hinta" /><br />
    <input type="hidden" name="action" value="create" />
    <input type="submit" value="Lähetä" />
</form><br />

<table>
<tr>
<th>Id</th>
<th>Nimi</th>
<th>Kuvaus</th>
<th>Hinta</th>
</tr>
<?php foreach($data["lista"] as $asia) { ?>
<tr>"
<td><?php echo $asia->getId();?></td>
<td><?php echo $asia->getNimi();?></td>
<td><?php echo $asia->getKuvaus();?></td>
<td><?php echo $asia->getHinta();?></td>
<td><a href="tuote.php?view=update&id=<?php echo $asia->getId();?>">Muokkaa</a></td>
<td><a href="tuote.php?action=delete&id=<?php echo $asia->getId();?>">Poista</a></td>
</tr>
<?php } ?>
</table>