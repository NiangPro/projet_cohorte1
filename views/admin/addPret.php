<h1 class="text-center mt-2 mb-5">Formulaire d'ajout pret  <a href="?page=<?= strtolower($user->role) ?>&menu=pret" class="btn btn-outline-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a></h1>
<form action="" class="container p-3 col-md-4 card" method="post">
    <div class="form-group">
      <label for="">Code Membre</label>
      <select class="form-control" required name="codeMembre" id="">
        <?php foreach($membres as $m): ?>
            <option value="<?= $m->code ?>"><?= $m->prenom ?> <?= $m->nom ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">Code Document</label>
      <select class="form-control" required name="codeDoc" id="">
        <?php foreach($docs as $d): ?>
            <option value="<?= $d->codeDoc ?>"><?= $d->titre ?> <?= $m->nom ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">Date Pret</label>
      <input type="date" required class="form-control" name="datePret" id="" aria-describedby="emailHelpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="">Date Rettour</label>
      <input type="date" class="form-control" required name="dateRetour" id="" aria-describedby="emailHelpId" placeholder="">
    </div>
    <button type="submit" name="ajouterPret" class="btn btn-sm btn-outline-success">Enregistrer</button>
</form>