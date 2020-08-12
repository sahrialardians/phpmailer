<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPMailer</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css">

    <!-- Custome CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'mail.sahrial.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = 'hi@sahrial.com';
$mail->Password = 'TestDulu12.';
$mail->addAddress('hi@sahrial.com', 'Sahrial');
$mail->setFrom($_POST['from'], $_POST['name']);
if ($mail->addReplyTo($_POST['from'], $_POST['name'])) {
$mail->Subject = $_POST['subject'];
$mail->isHTML(false);
$mail->Body = <<<EOT
{$_POST['message']}
EOT;
if (!$mail->send()) {
// $msg = 'Sorry, something went wrong. Please try again later.';
$msg = 'Mailer Error: ' . $mail->ErrorInfo;
} else {
$msg = 'Message sent! Thanks for contacting us.';
}
} else {
$msg = 'I’m currently available for freelance work.';
}
?>

    <header>
        <section class="hero">
            <h1>Let's say hello for me!</h1>
        </section>
    </header>
    <main class="container">
        <article class="d-flex justify-content-center">
            <section>
                <div class="row">
                    <div class="card d-flex justify-content-center form">
                        <div class="card-body">
                        
                        <?php if (!empty($msg)) {
                        echo "
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                $msg
                            </div>
                        ";
                        } ?>
                            <form method="post">
                                <div class="form-group">
                                    <label for="panjang">From :</label>
                                    <input type="text" name="from" class="form-control" placeholder="Enter your Email address">
                                </div>
                                <div class="form-group">
                                    <label for="panjang">Name :</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your Name">
                                </div>
                                <div class="form-group">
                                    <label for="lebar">Subject :</label>
                                    <input type="text" name="subject" class="form-control" placeholder="Enter your Subject Email">
                                </div>
                                <div class="form-group">
                                    <label for="tinggi">Message :</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="Write your email for me!"></textarea>
                                </div>
                                <input type="submit" name="kirim" value="Send" class="btn btn-block mt-2"/>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>

    <script src="libraries/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>