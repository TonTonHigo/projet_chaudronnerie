<header>
    <div class="navbar">
        <div class="logo">
            <a id="lien_index" href="../Index.php" ><img id="logo" src="../image/Logo.png" alt="Logo"></a>
        </div>
        <div class="centered-links">
            <a id="lien_archive" href="archive.php">Archive</a>
            <a id="lien_tutoriel" href="tutoriel.php">Tutoriel</a>
            <a id="lien_galerie" href="galerie.php">Galerie</a>
        </div>
        <div class="contact">
            <a id="lien_formulaire" href="formulaire.php">Contact</a>
            <!-- Button connexion et inscription -->
        </div>
        <div class="button-user">
            <button type="button" class="btn button-compte" data-bs-toggle="modal" data-bs-target="#conn-modal">
                Connexion
            </button>
            <button type="button" class="btn button-compte" data-bs-toggle="modal" data-bs-target="#inscri-modal">
                Inscription
            </button>
        </div>
    </div>

    <!-- Modal connexion -->
        <div class="modal fade" id="conn-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification de photo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="crud forme-form" method="POST" action="../controller.php">
                            <input class="form" type="hidden" name="form" value="connexion">
                            <div class="validation-error pseudocoError">Pseudonyme manquant</div>
                            <input type="text" id="pseudoco" name="pseudoco" placeholder="Pseudonyme">
                            <div class="validation-error mdpError">Mdp manquant</div>
                            <input type="password" id="mdpco" name="mdpco" placeholder="Mdp">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn enregistrer">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>   
    
        <!-- Modal inscription -->
        <div class="modal fade" id="inscri-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification de photo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="crud forme-form" method="POST" action="../controller.php">
                        <input class="form" type="hidden" name="form" value="inscription">
                            <div class="validation-error pseudoinsError">Pseudonyme manquant</div>
                            <input type="text" id="pseudoins" name="pseudoins" placeholder="Pseudonyme">
                            <div class="validation-error emailError">Email manquant</div>
                            <input type="text" id="email" name="email" placeholder="Email">
                            <div class="validation-error mdpinsError">Mdp manquant</div>
                            <input type="password" id="mdpins" name="mdpins" placeholder="Mdp">
                            <div class="validation-error confirmError">Mdp manquant</div>
                            <input type="password" id="confirm" name="confirm" placeholder="Confirmer Mdp">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn annuler" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn enregistrer">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>    
</header>