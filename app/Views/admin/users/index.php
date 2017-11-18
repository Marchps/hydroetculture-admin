<h1>Administrer les profils</h1>

<p>
    <a href="?p=admin.users.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Code postal</td>
        <td></td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->username; ?></td>
            <td>
                <a class="btn btn-primary" href="users/edit/<?= $user->id; ?>">Editer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
