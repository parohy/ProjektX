<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 27. 1. 2016
 * Time: 7:57
 */

require ('mail/PHPMailerAutoload.php');

class Mail {

    private $mail;
    private $host = 'smtp.gmail.com';
    private $user = 'viatechcassomedia@gmail.com';
    private $password = 'pr0jektX';

    // initialize phpmailer
    function __construct() {
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = $this->host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->user;
        $this->mail->Password = $this->password;
        $this->mail->SMTPSecure = "ssl";
        $this->mail->Port = 465;
        $this->mail->setFrom($this->user);
    }

    // add recipients addresses to mail
    public function addRecipient($recipient) {
        $this->mail->addAddress($recipient);
    }

    // add attachment to mail
    public function attachement($path) {
        $this->mail->addAtachement($path);
    }

    // compose email parameters are subject body od the mail and alternative body
    public function composeMail($subject,$body,$alternativeBody) {
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AltBody = $alternativeBody;
    }

    // send email function returns message depending on if mail is sent or not
    public function sendMail() {
        if(!$this->mail->send()) {
            return $this->mail->ErrorInfo;
        }
        else {
            return 'success';
        }
    }
}