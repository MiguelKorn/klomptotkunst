<?php

class Register extends Model
{
    public function sendActivation($email, $fullName, $subject, $message)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        // 0 = off (for production use)
        // 2 = client and server messages
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        // $mail->Host = gethostbyname('smtp.gmail.com');
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "KTKMAILER@gmail.com";
        $mail->Password = "q1w2e3r4t5y6!";
        //Set who the message is to be sent from
        $mail->setFrom('noreply@klomptotkunst.com', 'NO-REPLY klomptotkunst');
        $mail->addAddress($email, $fullName);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->msgHTML($message);
        //Attach an image file
//            $mail->addAttachment('images/phpmailer_mini.png');
        if (!$mail->send()) {
            $msg = "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $msg = "MEssage send!";
        }
        return $msg;
    }

    public function addUser($fname, $lname, $tel, $email, $website, $key)
    {
        $id = $this->setContact($tel, $email, $website);
        $stmt = $this->db->prepare("UPDATE `users` SET first_name = :fname, last_name = :lname, token = :token WHERE id = :id");
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':token', $key);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function setContact($tel, $email, $website)
    {
        $stmt = $this->db->prepare("INSERT INTO `contacts` (tel, email, website) VALUES (:tel, :mail, :site);");
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':mail', $email);
        $stmt->bindParam(':site', $website);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT id FROM `contacts` WHERE email = :mail;");
        $stmt->bindParam(':mail', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result[0];
    }
}