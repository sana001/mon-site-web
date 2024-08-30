<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $tel = htmlspecialchars($_POST['tel']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $message_optionnel = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : "";

    // L'adresse e-mail où vous souhaitez recevoir la confirmation
    $to = "othmansana04@gmail.com";
    $subject = "Confirmation de Prise de Rendez-vous";

    // Contenu de l'e-mail
    $message = "Un rendez-vous a été pris avec les informations suivantes :\n\n";
    $message .= "Nom : " . $nom . "\n";
    $message .= "Prénom : " . $prenom . "\n";
    $message .= "Numéro de téléphone : " . $tel . "\n";
    $message .= "Email : " . $email . "\n";
    $message .= "Service : " . $service . "\n";
    $message .= "Date du rendez-vous : " . $date . " à " . $time . "\n";
    if (!empty($message_optionnel)) {
        $message .= "Message : " . $message_optionnel . "\n";
    }

    // En-têtes de l'e-mail
    $headers = "From: Rendez_vous@Elmalika.com" . "\r\n" .
               "Reply-To: noreply@Elmalika.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoyer l'e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "<div style='max-width: 500px; margin: 20px auto; padding: 20px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center;'>
                Votre rendez-vous a été pris avec succès. Un e-mail de confirmation a été envoyé.
              </div>";
    } else {
        echo "<div style='max-width: 500px; margin: 20px auto; padding: 20px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; text-align: center;'>
                Il y a eu une erreur lors de l'envoi de l'e-mail. Veuillez réessayer.
              </div>";
    }
}
?>
