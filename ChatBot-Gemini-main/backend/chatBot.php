<?php

$chatBotFile = realpath(__DIR__ . '../../view/chatBot.php');
if (is_file($chatBotFile)) {
    require_once($chatBotFile);
} else {
    echo "Error: File not found: " . $chatBotFile;
}