<?php

function title($item, $obje, $lang = "fr") {
    if ($lang == "fr") {
        echo $item . " " . "des" . " " . $obje;
    } else {
        echo $obje;
    }
}