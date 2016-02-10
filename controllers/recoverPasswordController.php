<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 10. 2. 2016
 * Time: 10:24
 */

include_once ('../API/Mail.php');
include_once ('../API/Database.php');
include_once ('../API/UserHandler.php');

if(isset($_POST['email'])) {
    $dbhandler = new DBHandler();
    $dbhandler->query("SELECT userid FROM users WHERE email=:mail");
    $dbhandler->bind(":mail",$_POST['email']);
    $result = $dbhandler->singleRecord();

    $mail = new Mail();
    $mail->addRecipient($_POST['email']);
    $mail->composeMail("Password recovery",'<p>You can change your password <a href="/?page=passwordRecovery&userid='.$result['userid'].'">here</a></p>',"You can change your password here");
    $mail->sendMail();
    header("Location:/?page=main-page");
}
if(isset($_POST['new-password']) && isset($_POST['repeat-password'])) {
    if($_POST['new-password'] === $_POST['repeat-password']) {
        $user = User::editUser($_GET['userid']);
        $password = password_hash($_POST['new-password'],PASSWORD_DEFAULT,['cost' => 12]);
        $user->saveData("password",$password);
        header("Location:/?page=main-page");
    }
}