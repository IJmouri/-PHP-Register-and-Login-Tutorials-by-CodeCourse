<div class="widget">
    <h2>Hello, <?php echo $user_data['firstname'] . '!'; ?></h2>
    <div class="inner">
        <div class="profile">
            <?php
            if (isset($_FILES['profile']) === true) {

                if (empty($_FILES['profile']['name']) === true) {
                    echo 'Please choose a file';
                } else {
                    $allowed = array('jpeg', 'jpg', 'gif', 'png');
                    $file_name = $_FILES['profile']['name'];
                    $explode = explode('.', $file_name);
                    $file_extension = strtolower(end($explode));
                    $file_temp = $_FILES['profile']['tmp_name'];

                    if (in_array($file_extension, $allowed) === true) {
                        change_profile_image($_SESSION['user_id'], $file_temp, $file_extension);
                        header('Location: '.$current_file);
                    } else {
                        echo 'Incorrect file type.File must be ';
                        echo implode(',', $allowed);
                    }
                }
            }
            if (empty($user_data['profile'])  === false) {
                echo '<img src="',$user_data['profile'],'" alt="',$user_data['username'],'\'s profile image">';
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