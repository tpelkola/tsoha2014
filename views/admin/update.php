<h2>Päivitä tuote</h2>
<form action="tuote.php" method="post">
    <label for="nimi">Nimi</label><input type="text" name="nimi" value="<?php echo $data["tuote"]->getNimi(); ?>" /><br />
    <label for="kuvuas">Kuvaus</label><input type="text" name="kuvaus"  value="<?php echo $data["tuote"]->getKuvaus(); ?>" /><br />
    <label for="hinta">Hinta</label><input type="text" name="hinta" value="<?php echo $data["tuote"]->getHinta(); ?>" /><br />
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="tuote" value="<?php echo $data["tuote"]->getId(); ?>" />
    <input type="submit" value="Lähetä" />
</form>