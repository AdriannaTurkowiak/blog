<?php

/* 
 * Get the message
 *
 * @param boolean $morning true if morning, false otherwise
 *
 * @return string a message relevant to if it's morning or not
 */
function getMessage($morning) {
    if ($morning) {
        return "Good morning";
    } else {
        return "Good afternoon";
    }
}

$message = getMessage(false);
echo $message;
