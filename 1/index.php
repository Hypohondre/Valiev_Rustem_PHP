<?php
include "text.html";

if ($_SERVER['REQUEST_URI'] === "/brainfuck") {
	require "BrainFuck2.php";
}