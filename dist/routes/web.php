<?php

$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/who-we-are', function ($request, $response) {
    return $this->view->render($response, 'about.twig');
})->setName('about');

$app->get('/what-we-do', function ($request, $response) {
    return $this->view->render($response, 'services.twig');
})->setName('services');

$app->get('/how-to-join', function ($request, $response) {
    return $this->view->render($response, 'careers.twig');
})->setName('careers');

$app->get('/where-we-are', function ($request, $response) {
    return $this->view->render($response, 'contact.twig');
})->setName('contact');

$app->post('/newsletter', function ($request, $response) {

    $mail = new PHPMailer;

    $email = $_POST['email'];

    $mail->setFrom($email);
    $mail->ReturnPath = 'test@email.com';
    $mail->addAddress('joshstobbs@gmail.com');
    $mail->addReplyTo($email);

    $mail->isHTML(true);

    $mail->Subject = 'A new message from' . $email;
    $mail->Body = "Name: $email";
    $mail->AltBody = "Name: $email";

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
})->setName('newsletter');

$app->post('/careers/form', function ($request, $response) {

    $mail = new PHPMailer;

    $params = $request->getParams();

    $name = $params['name'];

    $mail->setFrom($params['name']);
    $mail->ReutrnPath='joshstobbs@gmail.com';
    $mail->addAddress('joshstobbs@gmail.com');
    $mail->addReplyTo($params['name']);

    for($ct=0;$ct<count($_FILES['file']['tmp_name']);$ct++)
    {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name'][$ct]));
        $filename =$_FILES['file']['name'][$ct];
        if (move_uploaded_file($_FILES['file']['tmp_name'][$ct], $uploadfile)) {
         $mail->addAttachment($uploadfile, $filename);
        }
    }

    $mail->isHTML(true);

    $mail->Subject = 'A new Resume from ' . $name;
    $mail->Body = "Name: $name";
    $mail->AltBody = "Name: $name";

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
})->setName('careers.form');

$app->post('/contact/form', function ($request, $response) {

    $mail = new PHPMailer;

    $params = $request->getParams();

    $name = $params['name'];

    $mail->setFrom($params['name']);
    $mail->ReutrnPath='joshstobbs@gmail.com';
    $mail->addAddress('joshstobbs@gmail.com');
    $mail->addReplyTo($params['name']);

    $mail->isHTML(true);

    $mail->Subject = 'A new Message from ' . $name;
    $mail->Body = "Name: $name";
    $mail->AltBody = "Name: $name";

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
})->setName('contact.form');
