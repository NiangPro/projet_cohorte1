<div class="container col-md-8 card mt-5 p-2 ">
    <h1 class="text-center mb-2">Formulaire d'ajout Document</h1>
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                <label for="">Code</label>
                <input type="number" name="code" required class="form-control" placeholder="Entrer le code">
                </div>
                <div class="form-group col-md-6">
                <label for="">Titre</label>
                <input type="text" name="titre" required class="form-control" placeholder="Entrer le titre">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="">Auteur</label>
                <input type="text" name="auteur" required class="form-control" placeholder="Entrer l'auteur">
                </div>
                <div class="form-group col-md-6">
                <label for="">Annee de publication</label>
                <input type="date" name="anPub" required  class="form-control" placeholder="Entrer l'annee de publication">
                </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6">
                <label for="">Categorie</label>
                <select class="form-control" required name="categorie" id="">
                    <option value="Roman">Roman</option>
                    <option value="Bande dessin">Bande dessin</option>
                    <option value="Jeux videos">Jeux videos</option>
                    <option value="DVD">DVD</option>
                    <option value="CD">CD</option>
                    <option value="Blu-ray">Blu-ray</option>
                </select>
            </div>
                <div class="form-group col-md-6">
                    <label for="">Type</label>
                <select class="form-control" required name="type" id="">
                    <option value="Enfant">Enfant</option>
                    <option value="Ado">Ado</option>
                    <option value="Adulte">Adulte</option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Genre</label>
                <select class="form-control" name="genre" required id="">
                    <option value="Comedie">Comedie</option>
                    <option value="Drame">Drame</option>
                    <option value="Horreur">Horreur</option>
                    <option value="Sci-fi">Sci-fi</option>
                    <option value="Documentaire">Documentaire</option>
                </select>
                
            </div>
                <div class="form-group col-md-6">
                <label for="">Description</label>
                <textarea name="description" id="" class="form-control" required></textarea>
                </div>
            </div>
            <div class="form-group">
              <label for="">ISBN</label>
              <input type="number" name="isbn" id="" class="form-control">
            </div>
            
            <a href="?page=<?= strtolower($user->role) ?>&menu=doc" class="btn btn-warning">Retour</a>            
            <button type="submit" name="ajouterDoc" class="btn btn-success">Enregistrer</button>            
        </form>
    </div>