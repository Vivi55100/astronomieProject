<?php

/**
 * @author Steven Halliez 
 * This function allow us to use header(Location:...)
 * with directly GET method message into.
 * @param $message this argument is the string of the message to send
 * @param $status this argument allow us the color of message
 * @param $location this argument is the URL where to send $message and $status
 * @param $hasId this argument check there are an ID before the $message and $status and change the symbol ? by &
 * @return void
 */
function alert(string $message, string $status, string $location, bool $hasId = false) : void{
        $change = $hasId ? "&" : "?";
        $location .= $change . "message=$message&status=$status";
        header("Location:$location");
}