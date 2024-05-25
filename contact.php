<?php
include "./partials/_dbconnect.php";
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("Location: /barca-academy/login.php");
}

$email = "";

if (isset($_SESSION['userEmail'])) {
    $email = $_SESSION['userEmail'];
}

$userId;
$message = false;

$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);

if ($numRows == 1) {
    $row = mysqli_fetch_assoc($result);
    $userId = $row['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact_us` (`name`, `email`, `message`, `user_id`) VALUES ('$name', '$email', '$message', '$userId')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $message = true;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us | Barca Academy</title>
    <link rel="stylesheet" href="/barca-academy/contact.css">
    <link rel="stylesheet" href="/barca-academy/style.css">
    <script src="https://kit.fontawesome.com/7f1d032bd9.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include './components/navbar.php'; ?>
    <section class="contact">
        <div class="cont container">
            <div class="contact-text">
                <p>Drop your inquiry here and our experts will get back to you.</p>
                <h6>Address</h6>
                <p class="address">
                    Gonggabu, Kathmandu District, Bāgmatī Zone, Madhyamanchal, Nepal
                </p>
                <h6>Email</h6>
                <p class="mail">Govindsaud13@gmail.com</p>
            </div>
            <div class="contact-form">
                <form method="post" action="/barca-academy/contact.php">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="5" required></textarea>
                    <input type="submit" value="submit">
                </form>

                <div id="toasts">
                    <!--   <div class="toast">Ola!</div>
  <div class="toast">Que pasa?</div> -->
                </div>
            </div>
        </div>
    </section>

    <script>
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
        const checkNotification = <?php echo json_encode($message); ?>;
        if (checkNotification) {
            showNotification("Your message has been sent!");
        }
    </script>
</body>

</html>