<?php foreach($users as $user){ ?>
    <div class="user">
        <div class="firstname"><?= $user->firstname; ?></div>
        <div class="lastname"><?= $user->lastname; ?></div>
        <div class="birthday"><?= $user->birthday; ?></div>
    </div>
<?php } ?>