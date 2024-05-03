<?php

function alert(string $message, string $status, string $location, bool $hasId = false) : void{
        $change = !$hasId ? "?" : "&";
        header("Location:$location" . $change . "message=$message&status=$status");
}