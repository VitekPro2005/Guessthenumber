<?php
session_start();
if (!isset($_SESSION['botNumber'])) {
    $_SESSION['botNumber'] = rand(1,100);
}
$botNumber = $_SESSION['botNumber'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userNumber = ($_POST['user_number']);
    if ($userNumber < 1 || $userNumber > 100) {
        $message = "Please, choose a number from 1 to 100";
    } else {
        if ($userNumber < $botNumber) {
            $message = "Too low";
        } elseif ($userNumber > $botNumber) {
            $message = "Too high";
        } else {
            $message = "You got it ;)";
            $_SESSION['botNumber'] = rand(1, 100);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the number</title>
</head>
<body>
    <h1>Guess the number from 1 to 100</h1>
    <form method="POST">
        <label for="user_number">Write you number:</label>
        <input type="number" name="user_number" id="user_number" min="1" max="100" required>
        <button type="submit">Guess</button>
    </form>

    <?php if (!empty($message)): ?>
        <h2><?php echo $message; ?></h2>
    <?php endif; ?>
</body>
</html>