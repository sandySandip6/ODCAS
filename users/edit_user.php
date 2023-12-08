<?php
include('../database_conn.php');
if (isset($_POST['update'])) {

    $email = $_POST["email"];

    $user_id = $_POST['user_id'];

    $password = $_POST['password'];

    $sql = "UPDATE `users` SET `email`='$email',`password`='$password' WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record Updated Succesfully.";
        header("location:users.php");
    } else {
        // echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {

            $email = $row['email'];
            $password = $row['password'];
            $id = $row['id'];

        }
?>
        <div class="container">
            <h2>SignUp Form</h2>
            <form action="edit_user.php?id=<? echo $row['id']  ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br>
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="<?php echo $password; ?>"><br>

                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="cpassword" name="cpassword" value="<?php echo $email; ?>"><br>

                </div>

                <input type="submit" value="update" name="update">
            </form>
        </div>
<?php

    } else {
        header('location:users.php');
    }
}
?>