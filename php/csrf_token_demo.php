<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    $message = hash_equals($_SESSION['csrf_token'], $token)
        ? 'Form accepted safely.'
        : 'Invalid token.';
}
?>
<!doctype html>
<html><body>
<h1>CSRF Token Demo</h1>
<p><?= e($message) ?></p>
<form method="post">
    <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>">
    <button type="submit">Submit</button>
</form>
</body></html>
