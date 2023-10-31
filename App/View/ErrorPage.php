<?php
// Check if the variable $exception is set (i.e., if an exception has been thrown)
if (isset($exception)) {
    // Begin an HTML paragraph tag
    echo "<p>";

    // Display the message associated with the exception
    echo $exception->getMessage();

    // Close the HTML paragraph tag
    echo "</p>";
}

