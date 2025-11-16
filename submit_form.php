<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    $recipient = "Yannik.schuhmacher@icloud.com";
    $subject = "Neue Kontaktanfrage von $name";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Nachricht:\n$message\n";

    $email_headers = "From: $name <$email>";

    if(mail($recipient, $subject, $email_content, $email_headers)){
        echo "<p>Danke! Ihre Nachricht wurde gesendet.</p>";
    } else {
        echo "<p>Entschuldigung, beim Senden der Nachricht ist ein Fehler aufgetreten.</p>";
    }
} else {
    echo "<p>Ungültige Anfrage.</p>";
}
?>
