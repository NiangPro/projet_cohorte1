<div class="container pt-5">
    <a href="?page=<?= strtolower($user->role) ?>&menu=addMembre" class="btn btn-outline-success">Ajouter</a>

    <h1 class="text-center">Liste des membres</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Telephone</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($membres as $m): ?>
            <tr>
                <td><?= $m->code ?></td>
                <td><?= $m->prenom ?></td>
                <td><?= $m->nom ?></td>
                <td><?= $m->tel ?></td>
                <td><?= $m->adresse ?></td>
                <td><?= $m->email ?></td>
                <td>
                    <a href="" class="btn btn-outline-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="?page=<?= strtolower($user->role) ?>&menu=editMembre&codeMembreEdit=<?= $m->code ?>" class="btn btn-outline-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="?page=<?= strtolower($user->role) ?>&menu=membre&codeMembre=<?= $m->code ?>" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>