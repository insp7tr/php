<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/form.css" type="text/css" />
  <link rel="stylesheet" href="css/verify.css" type="text/css" />
  <title>Verify</title>
</head>

<body>
  <div class="form" style="text-align: center">
    <form action="" autocomplete="off">
      <div class="error-text">Error</div>
      <div class="fields-input">
        <input type="number" name="otp1" class="otp_field" placeholder="0" min="0" max="9" onpaste="false" />
        <input type="number" name="otp2" class="otp_field" placeholder="0" min="0" max="9" onpaste="false" />
        <input type="number" name="otp3" class="otp_field" placeholder="0" min="0" max="9" onpaste="false" />
        <input type="number" name="otp4" class="otp_field" placeholder="0" min="0" max="9" onpaste="false" />
        <input type="number" name="otp5" class="otp_field" placeholder="0" min="0" max="9" onpaste="false" />
        <input type="number" name="otp6" class="otp_field" placeholder="0" min="0" max="9" onpaste="false" />
      </div>
      <div class="submit">
        <input type="submit" value="Verify Now" class="button submitbtn" />
      </div>
      <div class="submit">
        <input type="submit" value="Resend OTP" class="button resendbtn" />
      </div>
    </form>
  </div>

  <script src="js/verify.js"></script>
  <script src="js/resendotp.js"></script>
</body>

</html>