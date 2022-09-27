<div class="container col-md-8 card mt-5 p-2 ">
    <h1>Formulaire d'edition Membre</h1>
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                <label for="">Code</label>
                <input type="number" name="code" value="<?= $m->code ?>"  class="form-control" placeholder="Entrer le code">
                </div>
                <div class="form-group col-md-6">
                <label for="">Prenom</label>
                <input type="text" name="prenom"  value="<?= $m->prenom ?>"  class="form-control" placeholder="Entrer le prenom">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="">Nom</label>
                <input type="text" name="nom"  value="<?= $m->nom ?>"  class="form-control" placeholder="Entrer le nom">
                </div>
                <div class="form-group col-md-6">
                <label for="">Adresse</label>
                <input type="text" name="adresse"  value="<?= $m->adresse ?>"  class="form-control" placeholder="Entrer l'adresse">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="">Tel</label>
                <input type="tel" name="tel"  value="<?= $m->tel ?>"  class="form-control" placeholder="Entrer le numero de telephone">
                </div>
                <div class="form-group col-md-6">
                <label for="">Email</label>
                <input type="email" name="email"  value="<?= $m->email ?>"  class="form-control" placeholder="Entrer l'adresse email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="">Mot de passe</label>
                <input type="password" name="mdp"  value="<?= $m->mdp ?>" class="form-control" placeholder="Entrer le mot de passe">
                </div>
            </div>
            
            <a href="?page=<?= strtolower($user->role) ?>&menu=membre" class="btn btn-info">Retour</a>            
            <button type="submit" name="editerMembre" class="btn btn-warning">Modifier</button>            
        </form>
    </div>