<?php
// Initialize variables
$email = '';
$password = '';
$error = '';

// Predefined list of valid emails (for demonstration)
$validEmails = ['user@example.com', 'admin@example.com'];
$validPassword = 'password123'; // Example valid password

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simple email verification
    if (in_array($email, $validEmails)) {
        // Check if the password is correct
        if ($password === $validPassword) {
            // Successful login logic (e.g., redirecting to another page)
            header('Location: welcome.php');
            exit();
        } else {
            $error = 'Invalid password. Please try again.';
        }
    } else {
        $error = 'Email not found. Please check your email.';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    <title>Login Form</title>
</head>
<body>
    <div class="container-fluid">
        <form class="mx-auto" method="POST" action="">
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKREgRePvdKTpWeKKMuAQaRmiLKw4X4SmUVA&s" alt="Logo">
            </div>
            <h4 class="text-center">Staff Login</h4>

            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <div class="mb-3 mt-5">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                <div id="emailHelp" class="form-text mt-3"><a href="#">Forget password?</a></div>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Login</button>
        </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>