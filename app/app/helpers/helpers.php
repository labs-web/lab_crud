<?php

/**
 * Generate a title string based on the language.
 *
 * @param string $item The item to include in the title.
 * @param string $obje The object to include in the title.
 * @param string $lang The language of the title (default: "fr").
 * @return string The generated title string.
 */
function title($item, $obje, $lang = "fr") {
    if ($lang == "fr") {
        return $item . " " . "des" . " " . $obje;
    } else {
        return $obje . " " . $item;
    }
}
?>
