<?php
include_once("./includes/header.inc.php");
include_once("./includes/header.bar.inc.php")
?>

<div class="contact-profile" id="userSection">
    <?php
    $userDetails = $chat->getUserDetails($currentSession);
    foreach ($userDetails as $user) {
        echo '<img src="userpics/' . $user['avatar'] . '" alt="" />';
        echo '<p>' . $user['username'] . '</p>';
        echo '<div class="social-media">';
        echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
        echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
        echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
        echo '</div>';
    }
    ?>
</div>
<div class="messages" id="conversation">
    <?php
    echo $chat->getUserChat($_SESSION['id'], $currentSession);
    ?>
</div>