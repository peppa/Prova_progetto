<br>
Confermi di voler cancellare il paziente selezionato ?
<br>
Non sar&aacute possibile recuperare i dati in futuro
<br>
<br>
<br>

<form method="POST">
    <button type="submit" formaction="index.php?control=manageDB&action=delete&conf=yes&pat={$link}">conferma</button>
    <button type="submit" formaction="index.php?control=manageDB&action=getFullData&show={$link}">annulla</button>
</form>