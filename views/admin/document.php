<div class="container mt-4">
    <?php if($user->role != "Membre"): ?>

    <a href="?page=<?= strtolower($user->role) ?>&menu=addDoc" class="btn btn-success mb-3">Ajouter</a>
    <?php endif; ?>
    <?php if(count($docs) > 0): ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Annee Publication</th>
                <th>Categorie</th>
                <th>Type</th>
                <th>Genre</th>
                <th>Description</th>
                <th>ISBN</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($docs as $doc): ?>
            <tr>
                <td><?= $doc->codeDoc ?></td>
                <td><?= $doc->titre ?></td>
                <td><?= $doc->auteur ?></td>
                <td><?= date("d/m/Y", strtotime($doc->anPub)) ?></td>
                <td><?= $doc->categorie ?></td>
                <td><?= $doc->type ?></td>
                <td><?= $doc->genre ?></td>
                <td><?= $doc->description ?></td>
                <td><?= $doc->isbn ?></td>
                <td>
                    <a href="" class="btn btn-outline-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <?php if($user->role == "Admin"): ?>
                    <a href="?page=<?= strtolower($user->role) ?>&menu=editDoc&code=<?= $doc->codeDoc ?>&type=edit" class="btn btn-outline-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="?page=<?= strtolower($user->role) ?>&menu=doc&code=<?= $doc->codeDoc ?>&type=delete" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php endif; ?>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <h1 class="alert alert-success text-center">Aucun document pour le moment !</h1>
    <?php endif; ?>
</div>