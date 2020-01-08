<?php 
require '../rip/configuration.php';
require '../rip/init.php';
$type = $_GET['type'];
session_start();
        if ($type == 'updatePassBtn')
        {
            $cpassword = $_POST['cpassword'];
            $npassword = $_POST['npassword'];
            $rpassword = $_POST['rpassword'];

            $shac = hash('sha512',$cpassword);
            $shan = hash('sha512',$npassword);

            if (!empty($cpassword) && !empty($npassword) && !empty($rpassword))
            {
                if ($npassword == $rpassword)
                {
                    $SQLCheckCurrent = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `ID` = ? AND `password` = ?");
                    $SQLCheckCurrent -> execute(array($_SESSION['ID'], $shac));
                    $countCurrent = $SQLCheckCurrent -> fetchColumn(0);
                    if ($countCurrent == 1)
                    {
                        $SQLUpdate = $odb -> prepare("UPDATE `users` SET `password` = ? WHERE `username` = ? AND `ID` = ?");
                        $SQLUpdate -> execute(array($shan, $_SESSION['username'], $_SESSION['ID']));
                                               echo '<div class="alert alert-success"><p><strong>SUCCESS: </strong>Password Has Been Updated</p></div>';
                    }
                    else
                    {
                        echo '<div class="alert alert-danger"><p><strong>FAILURE: </strong>Current Password is incorrect.</p></div>';
                    }
                }
                else
                {
                    echo '<div class="alert alert-danger"><p><strong>FAILURE: </strong>New Passwords Did Not Match.</p></div>';
                }
            }
            else
            {
                echo '<div class="alert alert-danger"><p><strong>FAILURE: </strong>Please fill in all fields</p></div>';
            }
        }

  if ($type == 'updateSMBtn')
        {
            // Change
            $step = $_POST['2step'];
            $apis = $_POST['apis'];
            $email = $_POST['email'];
            // Check
            $ccode = $_POST['currentcode'];
            $currnetpass = $_POST['checkpassword'];
            $shapass = hash('sha512',$currnetpass);
            if (!empty($email) && !empty($ccode) && !empty($currnetpass))
            {
                    $SQLCheckCurrent = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `ID` = ? AND `password` = ?");
                    $SQLCheckCurrent -> execute(array($_SESSION['ID'], $shapass));
                    $countCurrent = $SQLCheckCurrent -> fetchColumn(0);

                   $SQLCheckCode = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `ID` = ? AND `code_account` = ?");
                    $SQLCheckCode -> execute(array($_SESSION['ID'], $ccode));
                    $countCode = $SQLCheckCode -> fetchColumn(0);

                    if ($countCode == 1)
                    {
                    if ($countCurrent == 1)
                    {
                         // Code
                        $SQLUpdate = $odb -> prepare("UPDATE `users` SET `email` = ? WHERE `username` = ? AND `ID` = ?");
                        $SQLUpdate -> execute(array($email, $_SESSION['username'], $_SESSION['ID']));
                         // 2 Step
                          $SQLUpdate = $odb -> prepare("UPDATE `users` SET `ip_address` = ? WHERE `username` = ? AND `ID` = ?");
                        $SQLUpdate -> execute(array($step, $_SESSION['username'], $_SESSION['ID']));
                         // Api
                          $SQLUpdate = $odb -> prepare("UPDATE `users` SET `ip_address_api` = ? WHERE `username` = ? AND `ID` = ?");
                        $SQLUpdate -> execute(array($apis, $_SESSION['username'], $_SESSION['ID']));

                     echo '<div class="alert alert-success"><p><strong>SUCCESS: </strong>Settings Has Been Updated</p></div>';
                    }
                    else
                    {
                        echo '<div class="alert alert-danger"><p><strong>FAILURE: </strong>Current Password is incorrect.</p></div>';
                    }
                }
                else
                {
                    echo '<div class="alert alert-danger"><p><strong>FAILURE: </strong>Current Code is incorrect.</p></div>';
                }
            }
            else
            {
                echo '<div class="alert alert-danger"><p><strong>FAILURE: </strong>Please fill in all fields</p></div>';
            }
        }
        ?>