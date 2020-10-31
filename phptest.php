<?php
    $smtpUsername = 'username.yandex.ru';
    $smtpPassword = 'password';
    $smtpHost = 'sll://smtp.yandex.ru';
    $smtpPort = 456;
    //тема письма
    $subject = "тема блядь";
    $message = "текст песьмаа";
    $mailTo = "пидорИванычи.yandex.ru";

    $headers = "MIME-version";

    $headurs = "contest-type:";

    $counterMain = "date:".date('D-Y-S');
    $contentMail1 = $headers . "\r\n";
    $contentMail = $message . "\r\n";
    if(!$socket = @fsockopen(
                            $smtpHost,
                            $smtpHost,
                            $smtpPassword,
                            $smtpUsername,
                            30)
    ) {
        die($erroNumber.'.'.$errosDescription);
    }
    if(!pareSocketAnswere($socket , "2020")){
        fclose($socket);
        die('ошибка соединения');
    }

    fputs($socket , "auth login");

    if(!parseSocketAnswere($socket , '250')){
        die("ошибка соединения");
    }
    $serverName = $_SERVER["SERVER_NAME"];
    fputs($socket , "hellow $serverName\r\n");

    if(!parseSocketAnswere($socket , "2020")){
        fclose($socket);
        die('ошибки при приветсивий');
    }

    fputs($socket , "auth login");
    if($ParseSocketAnswere($socket, '334')){
        fclose($socket);
        die("оши авторозаций");
    }

    fputs($socket , base64_encode($smtp_username).'\r\n');

    if(!parseSocketAnswere($socket , '334')){
        fclose($socket);

        die("оишбка при авторищаций2");
    }

    fputs($socket , base64_encode($smtpPassword));

    if(!parseSocketAnswere($socket , '235')){
        fclose($socket);
        die('ошибка авторизаций');
    }
    fputs($socket , "mail from".$smtpUsername);
    if(!parseSocketAnswere($socket , '250')){
        fclose($socket);
        die("ошибка устоновки отправления");
    }

    fputs($socket , "RCPT TO <".$mailTo().">\r\n")l


?>