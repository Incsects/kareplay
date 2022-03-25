<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/contact.css">
    <title>Contact form</title>

</head>

<body>
    <div class="container">
        <h2>Write Us</h2>
        <?php if(isset($_GET['success'])    ): ?>
            <div class="alert alert-success">Your message has been successfully delivered.</div>
            <?php endif ?>
            <form method="POST" action="contact-post.php">
        <form action="">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="names" id="names" placeholder=" enter your name">
            <textarea name="messages" id="messages" class="form-control" rows="5" placeholder="Your Messages..."></textarea>            <input type="submit" value="Send">
        </form>
    </div>
</body>

</html>