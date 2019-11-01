<?php

if (\models\AuthModel::haveAuthUser()) {
    $user = \models\AuthModel::getAuthUser();
    echo 'Hello, ' . $user->login . '! <a href="' . url('/auth/logout') . '">log out</a>';
} else {
    echo '<a href="' . url('/auth') . '">log in</a>';
}


