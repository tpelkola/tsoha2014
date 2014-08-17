<?php

function isLogged() {
    if (isset($_SESSION['asiakas'])) {
        return true;
    } else {
        return false;
    }
}
function logout(){
   unset($_SESSION["asiakas"]);
}
