<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate inputs
    $selected_package = sanitizeInput($_POST["selected_package"]);
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $organization = sanitizeInput($_POST["organization"]);

    // Validate email format and domain
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/@(gmail|outlook)\./i", $email)) {
        echo "invalid_email"; // Return an invalid email response to the frontend
        exit; // Terminate script execution
    }

    // Email setup
    $to = "cyberspace.consultancy@outlook.com";
    $subject = "New Package Request";
    $message = "Package: $selected_package\nName: $name\nEmail: $email\nOrganization: $organization";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "success"; // Return a success response to the frontend
    } else {
        echo "error"; // Return an error response to the frontend
    }
}

// Function to sanitize user input
function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>
