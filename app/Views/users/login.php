<script type="text/javascript" src="/mvcbachelor3/web/js/queryVerif.js"></script>
<?php if($errors): ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>
<form method="post">
    <?= $form->input('username', 'Pseudo',null/*['onblur' => 'verifNom(this)']*/); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>
<?= print_r($auth) ?>