<?php
session_start();
?>
<html> <head></head>
<body>

<?php

if (isset($_SESSION['user_id'])): ?>

<?php else: ?>

    <h2>Login Here</h2> <form action="login_submit.php" method="post"> <fieldset> <p> <label for="username">Username</label>
                <input type="text" id="username" name="username" value="" maxlength="20" /> </p> <p> <label
                    for="password">Password</label> <input type="text" id="password" name="password" value="" maxlength="20" /> </p>
            <p> <input type="submit" value="→ Login" /> </p> </fieldset> </form>
<?php endif; ?>
</body> </html>