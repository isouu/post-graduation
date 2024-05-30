<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau compte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background: -webkit-linear-gradient(-180deg, #3e3e5f, #3e3e5f, hsl(240, 15%, 51%), #91a9b6);
        }
        .container {
            max-width: 430px;
            margin: 50px auto;
            padding: 60px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px #019477;
        }
        .container h2 {
            text-align: center;
            color: #3e3e5f;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            font-family: sans-serif;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 8px 2px rgba(0, 0, 0, 0.2);
        }
        .form-group button {
            width: 100%;
            padding: 15px;
            background-color: #3e3e5f;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: hsl(169, 44%, 19%);
        }
        .form-group .gender-options label {
            display: inline-block;
            margin-right: 10px;
        }
        .img {
            height: 15vh;
        }
        .gender-options input[type="radio"] {
            background-color: #0eb092;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="img" src="./download__1_-removebg-preview (1).png" alt="">
        <h2>Créer un nouveau compte</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirm_password'];
            $Matricule = $_POST['Matricule'];

            

            $errors = array();

            if (empty($username) || empty($email) || empty($password) || empty($confirmpassword))  {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email not valid");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password !== $confirmpassword) {
                array_push($errors, "Passwords do not match");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                if (isset($_FILES['pp']) && $_FILES['pp']['error'] == 0) {
                    $file_data = file_get_contents($_FILES['pp']['tmp_name']);
                    $file_base64 = base64_encode($file_data);
                }

                require_once 'Database1.php';  // Assurez-vous que ce fichier se connecte correctement à la base de données
                $sql = "INSERT INTO ens (username, email, password, profile_picture,Matricule) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $password, $file_base64,$Matricule);
                    if (mysqli_stmt_execute($stmt)) {
                        header("Location: loo_ens.php");
                        exit();
                    } else {
                        echo "<div class='alert alert-danger'>Something went wrong. Please try again later.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Something went wrong with the database statement preparation.</div>";
                }
            }
        }
        ?>
        <form id="signup-form" action="./registr_ens.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <label for="username">Matricule:</label>
                <input type="text" id="username" name="Matricule" required placeholder="Nom">
            </div>

            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="email">Adresse e-mail :</label>
                <input type="email" id="email" name="email" required placeholder="Email@">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required placeholder="Mot de Passe">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe :</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm mot de passe">
            </div>
            <div class="form-group">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="pp">
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Créer un compte</button>
            </div>
        </form>
    </div>
</body>
</html>
