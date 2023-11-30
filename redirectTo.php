<?php

function redirectTo($file) {
	if(isset($file)) {
		header("Location: " . _WEB_ROOT . '/' . $file);
		exit;
	}
};