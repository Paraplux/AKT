<?php 

/**
 * Remove the special characters of a string
 *
 * @param  string $string
 *
 * @return string
 */
function specialCarRemove($string)
{
    $utf8 = array(
        '/[áàâãªä]/u' => 'a',
        '/[ÁÀÂÃÄ]/u' => 'A',
        '/[ÍÌÎÏ]/u' => 'I',
        '/[íìîï]/u' => 'i',
        '/[éèêë]/u' => 'e',
        '/[ÉÈÊË]/u' => 'E',
        '/[óòôõºö]/u' => 'o',
        '/[ÓÒÔÕÖ]/u' => 'O',
        '/[úùûü]/u' => 'u',
        '/[ÚÙÛÜ]/u' => 'U',
        '/ç/' => 'c',
        '/Ç/' => 'C',
        '/ñ/' => 'n',
        '/Ñ/' => 'N',
        "/[']/u" => ' ', // guillemet simple
        '/[«»]/u' => ' ', // guillemet double
        '/ /' => ' ', // espace insécable (équiv. à 0x160)
    );
    return preg_replace(array_keys($utf8), array_values($utf8), $string);
}

/**
 * Clean a string and replace space by underscore
 *
 * @param  string $string
 *
 * @return string
 */

function cleanString($string)
{
    $string = trim($string);
    $string = specialCarRemove($string);
    $string = strtr($string, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz");
    $string = preg_replace('#([^.a-z0-9]+)#i', '_', $string);
    $string = preg_replace('#-{2,}#', '_', $string);
    $string = preg_replace('#-$#', '', $string);
    $string = preg_replace('#^-#', '', $string);
    return $string;
}
    
/**
 * Capitalize a string aka uppercase
 *
 * @param  string $string
 *
 * @return string
 */
function capitalize($string)
{
    $string = trim($string);
    $string = specialCarRemove($string);
    $string = strtr($string, "abcdefghijklmnopqrstuvwxyz", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $string = preg_replace('#([^.a-z0-9]+)#i', '', $string);
    $string = preg_replace('#-{2,}#', '', $string);
    $string = preg_replace('#-$#', '', $string);
    $string = preg_replace('#^-#', '', $string);
    return $string;
}

/**
 * Minimize a string aka lowercase
 *
 * @param  string $string
 *
 * @return string
 */
function minimize($string) {
    $string = trim($string);
    $string = specialCarRemove($string);
    $string = strtr($string, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz");
    $string = preg_replace('#([^.a-z0-9]+)#i', '', $string);
    $string = preg_replace('#-{2,}#', '', $string);
    $string = preg_replace('#-$#', '', $string);
    $string = preg_replace('#^-#', '', $string);
    return $string;
}

