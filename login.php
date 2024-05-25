<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: /barca-academy/index.php');
}

include './partials/_dbconnect.php';

$errorMsg = false;
$signupSuccess = false;
$emailError = false;
$passwordError = false;
$existEmail = false;

if (isset($_POST['signin'])) {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM USER WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);


        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($password == $row['password']) {
                $_SESSION['loggedin'] = true;
                $_SESSION['userEmail'] = $email;
                header("Location: /barca-academy/index.php");
            } else {
                $errorMsg = true;
            }
        }
    }
}
if (isset($_POST['signup'])) {

    // Function to validate email
    function validateEmail($email)
    {
        // Email validation regex pattern
        $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($emailPattern, $email);
    }

    // Function to validate password
    function validatePassword($password)
    {
        // Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character
        $passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        return preg_match($passwordPattern, $password);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];

        $existSql = "select * from user where email = '$userEmail'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            $existEmail = true;
        } else {
            $isEmailValid = validateEmail($userEmail);
            $isPasswordValid = validatePassword($userPassword);

            if ($isEmailValid && $isPasswordValid) {
                try {
                    $sql = "INSERT INTO `user` (`username`, `email`, `password`) VALUES ('$userEmail', '$userEmail', '$userPassword');
                ";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $signupSuccess = true;
                    } else {
                        $signupSuccess = false;
                    }
                } catch (mysqli_sql_exception $e) {
                    echo $e;
                }
            } else {
                // if (!$isEmailValid) {
                //     echo "Hello from valid";
                // }
                // if (!$isPasswordValid) {
                //     echo "Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.<br>";
                // }
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Barca</title>
    <link rel="stylesheet" href="./login.css">
</head>

<body>
    <h2>Member Access <p>Access a world of Possibilities</p>
    </h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post">
                <h1>Create Account</h1>
                <input type="text" placeholder="Username" name="username" id="username" />
                <input type="email" placeholder="Email" name="userEmail" />
                <input type="password" placeholder="Password" name="userPassword" />
                <input type="submit" name="signup" id="signup" value="Sign Up" />
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post">
                <h1>Sign in</h1>
                <input type="email" id="email" name="email" placeholder="Email" />
                <input type="password" id="password" name="password" placeholder="Password" />
                <?php
                if ($errorMsg) {
                    echo "<span>Invalid Credentials</span>";
                }
                ?>
                <a href="#">Forgot your password?</a>
                <input type="submit" name="signin" id="signin" value="Sign In" />
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Explorer!</h1>
                    <p>Enter your personal details and start journey with us</p>

                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>

        <div id="toasts">
            <!--   <div class="toast">Ola!</div>
  <div class="toast">Que pasa?</div> -->
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById("signUp");
        const signInButton = document.getElementById("signIn");
        const container = document.getElementById("container");

        signUpButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });

        // Toast
        const toasts = document.getElementById('toasts');

        function showNotification(message) {
            const notif = document.createElement('div');
            notif.classList.add('toast');

            notif.innerText = message;
            toasts.appendChild(notif);

            setTimeout(() => {
                notif.remove()
            }, 3000)

        }
        const checkNotification = <?php echo json_encode($signupSuccess); ?>;
        if (checkNotification) {
            showNotification("You've successfully created an account!");
        }

        if (<?php echo json_encode($existEmail); ?>) {
            showNotification("Email already exist!");
        }
    </script>
</body>

</html>