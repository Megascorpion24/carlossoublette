<?php

if (is_file(__DIR__ . "/backend/chatBot.php")) {
  require_once(__DIR__ . "/backend/chatBot.php");
} else {
  echo "Error backend 404";
}