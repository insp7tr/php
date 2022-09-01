<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OTP PHP ASSESSMENT</title>
  <link rel="stylesheet" href="css/form.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="form">
    <form action="" enctype="multipart/form-data">
      <div class="error-text">Error</div>
      <div class="input">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email address" required />
      </div>
      <div class="submit">
        <input type="submit" value="Submit" class="button submitbtn" />
      </div>
    </form>
    <div class="link">Already Submitted? <a href="verify.php">Resend OTP</a></div>
  </div>

  <script src="js/submit.js"></script>
</body>

</html>