<?php

function alert($state, $alert) {
    if ($state === 'error') {
        echo "<h1 style='color: red; text-align: center;'>" . $alert . "</h1>";
    } else {
        echo "<h1 style='color: green; text-align: center;'>" . $alert . "</h1>";
    }
}