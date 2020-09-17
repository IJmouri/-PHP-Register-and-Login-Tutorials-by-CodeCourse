<div class="widget">
    <h2>Hello, <?php echo $user_data['firstname'] . '!'; ?></h2>
    <div class="inner">
        <div class="profile">
            <?php
            if (empty($user_data['profile'])  === false) {
                echo '<img src="', $user_data['profile'], '"/>';
            }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="profile">
                <input type="submit" value="submit">
            </form>
        </div>
        <ul>
            <li>
                <a href="logout.php">Logout</a>
            </li>
            <li>
                <a href="<?php echo $user_data['username']; ?>">Profile</a>
            </li>
            <li>
                <a href="changePassword.php">Change Password</a>
            </li>
            <li>
                <a href="settings.php">Settings</a>
            </li>

        </ul>
    </div>
</div>