<p>[
<a href="<?= BASE_URL . "joke" ?>">All jokes</a> | 
<a href="<?= BASE_URL . "joke/add" ?>">Add joke</a>

<?php if (User::isLoggedIn()): ?>
	| <a href="<?= BASE_URL . "logout" ?>">Logout (<?= User::getUsername() ?>)</a>
<?php else: ?>
	| <a href="<?= BASE_URL . "login-insecure" ?>">Login (insecure)</a>
	| <a href="<?= BASE_URL . "login" ?>">Login (secure)</a>
<?php endif; ?>

]</p>
