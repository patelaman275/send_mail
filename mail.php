<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Send Mail From Localhost</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
               <h2 class="text-center">Send Message</h2>
               <p class="text-center">Send mail to anyone from localhost.</p>
               
               <?php
                  $recipient = "";
                  if (isset($_POST['send'])) {
                      $recipient = $_POST['email'];
                      $subject = $_POST['subject'];
                      $message = $_POST['message'];
                      $sender = "From: patelaman4747@gmail.com";
                  
                      if (empty($recipient) || empty($subject) || empty($message)) {
               ?>
               <div class="alert alert-danger text-center">
                  <?php echo "All inputs are required!"; ?>
               </div>
               <?php
                      } else {
                          if (mail($recipient, $subject, $message, $sender)) {
               ?>
               <div class="alert alert-success text-center">
                  <?php echo "Your mail was successfully sent to $recipient"; ?>
               </div>
               <?php
                              $recipient = ""; 
                          } else {
               ?>
               <div class="alert alert-danger text-center">
                  <?php echo "Failed while sending your mail!"; ?>
               </div>
               <?php
                          }
                      }
                  }
               ?>  
               <form action="mail.php" method="POST">
                  <div class="form-group">
                     <input class="form-control" name="email" type="email" placeholder="Recipient's Email" value="<?php echo htmlspecialchars($recipient); ?>" required>
                  </div>
                  <div class="form-group">
                     <input class="form-control" name="subject" type="text" placeholder="Subject" required>
                  </div>
                  <div class="form-group">
                     <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="form-group">
                     <input class="form-control button btn-primary" type="submit" name="send" value="Send">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>
