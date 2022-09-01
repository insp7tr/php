<?php

include_once 'db.php';

session_start();
$otp1 = $_POST['otp1'];
$otp2 = $_POST['otp2'];
$otp3 = $_POST['otp3'];
$otp4 = $_POST['otp4'];
$otp5 = $_POST['otp5'];
$otp6 = $_POST['otp6'];
$unique_id = $_SESSION['unique_id'];
$session_otp = $_SESSION['otp'];
$otp_requests = $_SESSION['otp_requests'];
$otp = $otp1 . $otp2 . $otp3 . $otp4 . $otp5 . $otp6;

// config variables
$hour_limit = 3;
$seconds_expires = 30;

if (!empty($otp)) {
    if ($otp == $session_otp) {
        $sql = mysqli_query($conn, "SELECT created_at FROM users WHERE unique_id = '{$unique_id}' AND otp = '{$otp}'");
        $createdAtRow = mysqli_fetch_assoc($sql);
        $time_difference = time() - $createdAtRow['created_at'];

        if ($time_difference < 86400) {
            $hourtest = false;

            if ($time_difference < 3600 && $otp_requests <= 3) {
                $hourtest = true;
            } else if ($time_difference < 7200 && $time_difference >= 3600 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 10800 && $time_difference >= 7200 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 14400 && $time_difference >= 10800 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 18000 && $time_difference >= 14400 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 21600 && $time_difference >= 18000 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 25200 && $time_difference >= 21600 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 28800 && $time_difference >= 25200 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 32400 && $time_difference >= 28800 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 36000 && $time_difference >= 32400 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 39600 && $time_difference >= 36000 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 43200 && $time_difference >= 39600 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 46800 && $time_difference >= 43200 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 50400 && $time_difference >= 46800 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 54000 && $time_difference >= 50400 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 57600 && $time_difference >= 54000 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 61200 && $time_difference >= 57600 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 64800 && $time_difference >= 61200 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 68400 && $time_difference >= 64800 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 72000 && $time_difference >= 68400 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 75600 && $time_difference >= 72000 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 79200 && $time_difference >= 75600 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 82800 && $time_difference >= 79200 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else if ($time_difference < 86400 && $time_difference >= 82800 && $otp_requests <= $hour_limit) {
                $hourtest = true;
            } else {
                $hourtest = false;
            }

            if ($hourtest) {
                if ($time_difference < $seconds_expires) {
                    $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$unique_id}' AND otp = '{$otp}'");
                    if (mysqli_num_rows($sql2) > 0) {
                        $null_otp = 0;
                        $sql3 = mysqli_query($conn, "UPDATE users SET `verification_status` = 'Verified', `otp` = '$null_otp' WHERE unique_id = '{$unique_id}'");
                        if ($sql3) {
                            $row = mysqli_fetch_assoc($sql2);
                            if ($row) {
                                $_SESSION['unique_id'] = $row['unique_id'];
                                $_SESSION['verification_status'] = $row['verification_status'];
                                echo "Success";
                            }
                        }
                    }
                } else {
                    echo "Your OTP has expired. Please request a new one.";
                }
            } else {
                echo "You have requested too many times. Please try again after an hour.";
            }
        } else {
            $otp = mt_rand(11111, 999999);

            if ($otp < 100000) {
                $newotp = 0 . $otp;
            } else {
                $newotp = $otp;
            }

            $sql4 = mysqli_query($conn, "UPDATE users SET `otp` = '$newotp' WHERE unique_id = '{$unique_id}'");

            if ($sql4) {
                echo "Your OTP has expired, a new one was generated and sent";
            }
        }
    } else {
        echo "Wrong OTP!";
    }
} else {
    echo "Enter OTP!";
}
