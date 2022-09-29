<nav class="navbar navbar-expand-sm navbar-light bg-warning">
    <a class="navbar-brand" href="#">Biblio</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <?php if($user->role != "Membre"): ?>
                <?php if($user->role == "Admin"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Employe</a>
                    </li>
                <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="?page=<?= strtolower($user->role) ?>&menu=membre">Membres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=<?= strtolower($user->role) ?>&menu=pret">Pret</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="?page=<?= strtolower($user->role) ?>&menu=doc">Document</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="#">Reservation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=logout">Deconnexion</a>
            </li>
        </ul>
    </div>
</nav>