<head>
    <?php global $dir, $js, $style, $image; ?>
    <!-- CSS de la page -->
    <link href="<?= $dir . $style['admin'] ?>" rel="stylesheet">
    <link rel="icon" type="image/icon" href="<?= $dir . $image['onglet'] ?>"/>

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?php $this->_t = "gestion des utilisateurs A"; ?>

<main>
    <h2 style="padding-bottom: 2%">Seulement les comptes ayant le rôle 'user' et 'super-user' figurent dans cette
        page.</h2>
    <div class="box">
        <h1>Liste des utilisateurs</h1>
        <table>
            <tr>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Modifier un utilisateur</th>
                <th>Mot de passe</th>
                <th>Supprimer un utilisateur</th>
            </tr>
            <?php foreach ($users as $user) :
                if ($user->getType() != 'super-admin' and $user->getType() != 'admin'):?>
                    <form method="post"
                          onsubmit="return confirm('Voulez-vous vraiment modifier le rôle cet utilisateur ?')">
                        <tr>
                            <td><p><?= $user->getPseudo() ?></p></td>
                            <td><p><?= $user->getMail() ?></p></td>
                            <td><label>
                                    <select name="newType">
                                        <option value="" selected disabled><?= $user->getType() ?></option>
                                        <option value="user">user</option>
                                        <option value="super-user">super-user</option>
                                    </select>
                                </label></td>
                            <input type="hidden" name="txtNom" value="<?= $user->getPseudo() ?>"/>
                            <td>
                                <button type="submit">Modifier</button>
                            </td>
                            <input type="hidden" name="action" value="formChangeRole">
                    </form>
                    <td>
                        <form method="post"
                              onsubmit="return confirm('Voulez-vous vraiment réinitialiser le mot de passe de cet utilisateur ?')">
                            <input type="hidden" name="txtNom" value="<?= $user->getPseudo() ?>"/>
                            <input type="hidden" name="txtMail" value="<?= $user->getMail() ?>"/>
                            <button type="submit">Réinitialiser le mot de passe</button>
                            <input type="hidden" name="action" value="formReinitMdp">
                        </form>
                    </td>
                    <td>
                        <form method="post"
                              onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">
                            <input type="hidden" name="txtNom" value="<?= $user->getPseudo() ?>"/>
                            <input type="hidden" name="txtMail" value="<?= $user->getMail() ?>"/>
                            <button type="submit">Supprimer l'utilisateur</button>
                            <input type="hidden" name="action" value="formSuppUser">
                        </form>
                    </td>
                <?php endif;
            endforeach; ?>
        </table>
    </div>
</main>
