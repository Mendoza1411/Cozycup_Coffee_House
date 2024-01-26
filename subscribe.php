<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST["email"];

    // Validate the email (you might want to use more robust validation)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save the email to a file (you should use a database in production)
        $file = fopen("subscribers.txt", "a");
        fwrite($file, $email . "\n");
        fclose($file);

        // You can also send a confirmation email to the subscriber if needed

        // Redirect to a thank you page
        header("Location: thank_you.html");
        exit();
    } else {
        // Handle invalid email address
        echo "Invalid email address!";
    }
} else {
    // Handle other request methods
    echo "Invalid request method!";
}
?>
