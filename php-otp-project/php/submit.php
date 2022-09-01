<?php

session_start();

include_once 'db.php';
$email = $_POST['email'];
$Role = 'user';
$verification_status = '0';

if (!empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT email, verification_status FROM users WHERE email = '{$email}'");
        $statusRow = mysqli_fetch_assoc($sql);

        $testbool = true;
        $testbool2 = mysqli_num_rows($sql) > 0;

        if (mysqli_num_rows($sql) > 0) {
            if ($statusRow['verification_status'] == 0) {
                $testbool = false;
            } else {
                $testbool = true;
            }
        } else {
            $testbool = true;
        }

        if ($testbool) {
            echo "Email has been verified already.";
        } else {
            if ($statusRow['verification_status'] == 0) {
                $time = time();

                $random_id = rand(time(), 10000000);
                $otp = mt_rand(11111, 999999);

                if ($otp < 100000) {
                    $newotp = 0 . $otp;
                } else {
                    $newotp = $otp;
                }

                if ($testbool2 == false) {
                    $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, email, otp, verification_status, Role, created_at) 
                            VALUES ('{$random_id}', '{$email}', '{$newotp}', '{$verification_status}', '{$Role}', '{$time}')");
                } else {
                    $sql2 = mysqli_query($conn, "UPDATE users SET `otp` = '$newotp' WHERE email = '{$email}'");
                }


                if ($sql2) {
                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if (mysqli_num_rows($sql3) > 0) {
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['unique_id'] = $row['unique_id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['otp'] = $row['otp'];

                        if ($_SESSION['otp_requests']) {
                            $_SESSION['otp_requests'] = $_SESSION['otp_requests'] + 1;
                        } else {
                            $_SESSION['otp_requests'] = 1;
                        }

                        if ($otp) {
                            $receiver = $email;
                            $subject = "From: $fname $lname <$email>";
                            $body = "Name " . " $fname $lname \n Email " . " $email \n " . "$otp";
                            $sender = "From: otptest@gmail.com";

                            if (mail($receiver, $subject, $body, $sender)) {
                                echo "Success";
                            } else {
                                echo "Email failed" . mysqli_error($conn);
                            }
                        }
                    }
                } else {
                    echo "Something went wrong. Please try again";
                }
            } else {
            }
        }
    } else {
        echo "$email is not a valid email address.";
    }
} else {
    echo "Please enter your email.";
}
