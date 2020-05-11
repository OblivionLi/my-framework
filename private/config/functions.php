<?php

// links files with the help of the WWW_ROOT global const from initialize.php file
// example <a href="< ? php echo url_for('views/index.php') ? >">Main page</a>
function url_for($string_path) {
    if ($string_path[0] != '/') {
        $string_path = '/' . $string_path;
    }

    return WWW_ROOT . $string_path;
}

// shortcut for htmlspecialchars()
function h($string) {
    return htmlspecialchars($string);
}

// shortcut for strip_tags()
function st($string) {
    return strip_tags($string);
}

// shortcut for header()
function redirect_to($location) {
    header('Location: ' . $location);
}