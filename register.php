
<?php
require_once 'config/db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users(username,password) VALUES (?,?)");
    $stmt->bind_param("ss", $username, $password);

    if($stmt->execute()){
        $message = "User Created Successfully!";
    } else {
        $message = "Error creating user!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #74ebd5, #9face6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card{
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .register-card h2{
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>

<div class="register-card">

    <h2>Create New User</h2>

    <?php if($message): ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text"
                   name="username"
                   class="form-control"
                   placeholder="Enter Username"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Enter Password"
                   required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Create User
        </button>
           <div class="text-center mt-3">
    <p>Already have an account?</p>

    <a href="login.php" class="btn btn-success w-100">
        Login Here
    </a>
</div>
    </form>
      
</div>

</body>
</html>

