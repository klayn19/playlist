<?php
include ('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT `tbl_user_id`, `password` FROM `tbl_user` WHERE `username` = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $stored_password = $row['password'];

        $passwordIsValid = password_verify($password, $stored_password);
        if (!$passwordIsValid && hash_equals($stored_password, $password)) {
            $passwordIsValid = true;
            $rehash = $conn->prepare("UPDATE `tbl_user` SET `password` = :password WHERE `tbl_user_id` = :user_id");
            $rehash->execute([
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'user_id' => $row['tbl_user_id'],
            ]);
        }

        if ($passwordIsValid) {
            echo "
            <script>
                alert('Login Successfully!');
                window.location.href = '../klaynplaylist.html';
            </script>
            "; 
        } else {
            echo "
            <script>
                alert('Login Failed, Incorrect Password!');
                window.location.href = '../klaynHCI.php';
            </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Login Failed, User Not Found!');
                window.location.href = '../klaynHCI.php';
            </script>
            ";
    }
}

?>