<?php
session_start();
$type = $_GET['type'] ?? 'visiteur';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <div class="form-box box">

      <?php
      include "connection.php";

      if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $pass = $_POST['password'];
        $type = $_POST['type'] ?? 'visiteur';

        // Choisir la bonne table selon le type
        $table = ($type === 'admin') ? 'admins' : 'users';

        $sql = "SELECT * FROM $table WHERE email='$email'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

          $row = mysqli_fetch_assoc($res);
          $password = $row['password'];

          if (password_verify($pass, $password)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['type'] = $type;

            if ($type === 'admin') {
              header("location: admin_dashboard.php");
            } else {
              header("location: home.php");
            }

          } else {
            echo "<div class='message'><p>Wrong Password</p></div><br>";
            echo "<a href='login.php?type=$type'><button class='btn'>Go Back</button></a>";
          }

        } else {
          echo "<div class='message'><p>Wrong Email or Password</p></div><br>";
          echo "<a href='login.php?type=$type'><button class='btn'>Go Back</button></a>";
        }

      } else {
      ?>

        <header>Login <?php echo ($type === 'admin') ? '(Admin)' : '(client)'; ?></header>
        <hr>
        <form action="login.php?type=<?php echo $type; ?>" method="POST">
          <input type="hidden" name="type" value="<?php echo $type; ?>">

          <div class="form-box">
            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder="Email Address" name="email" required>
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="Password" name="password" required>
              <i class="fa fa-eye toggle icon"></i>
            </div>

            <div class="remember">
              <input type="checkbox" class="check" name="remember_me">
              <label for="remember">Remember me</label>
              <span><a href="forgot.php">Forget password</a></span>
            </div>
          </div>

          <input type="submit" name="login" id="submit" value="Login" class="btn">

          <div class="links">
            Don't have an account? <a href="signup.php">Signup Now</a>
          </div>

        </form>
    </div>
  <?php } ?>
  </div>

  <script>
    const toggle = document.querySelector(".toggle"),
      input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
      }
    })
  </script>
</body>

</html>
<?php
include "connection.php";

// Créer un admin avec mot de passe hashé
$email = $_POST['email'];
$password = $_POST['password']; // et hashé ensuite !

// Vérifier si l'email existe déjà
$checkQuery = "SELECT * FROM admins WHERE email = '$email'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    echo "Cet email est déjà utilisé.";
} else {
    // Insérer l'admin si email non utilisé
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = "INSERT INTO admins (email, password) VALUES ('$email', '$hashedPassword')";
    if (mysqli_query($conn, $insertQuery)) {
        echo "Admin ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout.";
    }
}

?>
