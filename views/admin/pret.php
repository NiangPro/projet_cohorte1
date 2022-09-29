<div class="card mt-3">
    <div class="card-body">
        <a href="?page=<?= strtolower($user->role) ?>&menu=addPret" class="btn mb-4 btn-outline-success"><i class="fa fa-plus" aria-hidden="true"></i>Ajouter</a>
        <h1 class="text-center">LISTE DES PRETS</h1>
        <table class="table container col-md-10">
            <thead>
                <tr>
                    <th>Membre</th>
                    <th>Code Document</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date Pret</th>
                    <th>Date Retour</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($prets as $p): ?>
                <tr>
                    <td scope="row"><?= $p->prenom ?> <?= $p->nom ?></td>
                    <td><?= $p->codeDoc ?></td>
                    <td><?= $p->titre ?></td>
                    <td><?= $p->auteur ?></td>
                    <td><?= date("d/m/Y",strtotime($p->datePret)) ?></td>
                    <td><?= date("d/m/Y",strtotime($p->dateRetour)) ?></td>
                    <td>
                        <a href="" class="btn btn-outline-info btn-sm btn-rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="" class="btn btn-outline-warning btn-sm btn-rounded"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="" class="btn btn-outline-danger btn-sm btn-rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>