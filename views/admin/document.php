<div class="container mt-4">
    <a href="?page=<?= strtolower($user->role) ?>&menu=addDoc" class="btn btn-success mb-3">Ajouter</a>
    <?php if(count($docs) > 0): ?>
    <table class="table">
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
            </tr>
        </thead>
        <tbody>
            <?php foreach($docs as $doc): ?>
            <tr>
                <td><?= $doc->code ?></td>
                <td><?= $doc->titre ?></td>
                <td><?= $doc->auteur ?></td>
                <td><?= $doc->anPub ?></td>
                <td><?= $doc->categorie ?></td>
                <td><?= $doc->type ?></td>
                <td><?= $doc->genre ?></td>
                <td><?= $doc->description ?></td>
                <td><?= $doc->isbn ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <h1 class="alert alert-success text-center">Aucun document pour le moment !</h1>
    <?php endif; ?>
</div>