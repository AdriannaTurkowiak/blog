<?php

/**
 * Return the user authentication status
 *
 * @return boolean True if a user is logged in, false otherwise
 */
function is_Logged_In() {
    return (isset($_SESSION['is_logged']) && ($_SESSION['is_logged'])); 
    }
    ?>

