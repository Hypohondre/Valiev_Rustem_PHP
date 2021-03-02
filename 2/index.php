<?php
include "text.html";

if ($_SERVER['REQUEST_URI'] === "/generator") {
	require "generator.php";
}