<div class="container col-md-8 card mt-5 p-2 ">
    <h1 class="text-center mb-2">Formulaire d'ajout Document</h1>
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                <label for="">Code</label>
                <input type="number"  name="code"  value="<?= $doc->codeDoc ?>" required class="form-control" placeholder="Entrer le code">
                </div>
                <div class="form-group col-md-6">
                <label for="">Titre</label>
                <input type="text" value="<?= $doc->titre ?>"  name="titre" required class="form-control" placeholder="Entrer le titre">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="">Auteur</label>
                <input type="text" value="<?= $doc->auteur ?>" name="auteur" required class="form-control" placeholder="Entrer l'auteur">
                </div>
                <div class="form-group col-md-6">
                <label for="">Annee de publication</label>
                <input type="date"  value="<?= $doc->anPub ?>" name="anPub" required  class="form-control" placeholder="Entrer l'annee de publication">
                </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6">
                <label for="">Categorie</label>
                <select class="form-control" required name="categorie" id="">
                    <option value="Roman" <?php if($doc->categorie == "Roman"){echo "selected";} ?>>Roman</option>
                    <option value="Bande dessin" <?php if($doc->categorie == "Bande dessin"){echo "selected";} ?>>Bande dessin</option>
                    <option value="Jeux videos" <?php if($doc->categorie == "Jeux videos"){echo "selected";} ?>>Jeux videos</option>
                    <option value="DVD" <?php if($doc->categorie == "DVD"){echo "selected";} ?>>DVD</option>
                    <option value="CD" <?php if($doc->categorie == "CD"){echo "selected";} ?>>CD</option>
                    <option value="Blu-ray" <?php if($doc->categorie == "Blu-ray"){echo "selected";} ?>>Blu-ray</option>
                </select>
            </div>
                <div class="form-group col-md-6">
                    <label for="">Type</label>
                <select class="form-control" required name="type" id="">
                    <option value="Enfant" <?php if($doc->type == "Enfant"){echo "selected";} ?>>Enfant</option>
                    <option value="Ado" <?php if($doc->type == "Ado"){echo "selected";} ?>>Ado</option>
                    <option value="Adulte" <?php if($doc->type == "Adulte"){echo "selected";} ?>>Adulte</option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Genre</label>
                <select class="form-control" name="genre" required id="">
                    <option value="Comedie" <?php if($doc->genre == "Comedie"){echo "selected";} ?> >Comedie</option>
                    <option value="Drame" <?php if($doc->genre == "Drame"){echo "selected";} ?>>Drame</option>
                    <option value="Horreur" <?php if($doc->genre == "Horreur"){echo "selected";} ?>>Horreur</option>
                    <option value="Sci-fi" <?php if($doc->genre == "Sci-fi"){echo "selected";} ?>>Sci-fi</option>
                    <option value="Documentaire" <?php if($doc->genre == "Documentaire"){echo "selected";} ?>>Documentaire</option>
                </select>
                
            </div>
                <div class="form-group col-md-6">
                <label for="">Description</label>
                <textarea name="description" id="" class="form-control" required> <?= $doc->description ?></textarea>
                </div>
            </div>
            <div class="form-group">
              <label for="">ISBN</label>
              <input type="number" name="isbn" id="" class="form-control">
            </div>
            
            <a href="?page=<?= strtolower($user->role) ?>&menu=doc" class="btn btn-warning">Retour</a>            
            <button type="submit" name="editionDoc" class="btn btn-success">Modifier</button>            
        </form>
    </div>