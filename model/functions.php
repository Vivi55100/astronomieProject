<?php

function alert(string $message, string $status, string $location) : void{
        header("Location:$location?message=$message&status=$status");
}