<?php
/**
 * @brief utf8mb4, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\utf8mb4;

class Helper
{
    public static function doEncoding($src)
    {
        // Replace 4 bytes long UTF-8 characters to their HTML entity equivalent
        return empty($src) ? $src : preg_replace_callback('/./u', fn (array $match) => strlen($match[0]) >= 4 ? (string) mb_convert_encoding($match[0], 'HTML-ENTITIES', 'UTF-8') : $match[0], (string) $src);
    }

    /* Unused
    private static function doDecoding($src)
    {
        // Replace HTML entity (Unicode chars only) to their UTF-8 characters
        return empty($src) ? $src : preg_replace_callback('/(&#[0-9]+;)/', fn (array $match) => mb_convert_encoding($match[1], 'UTF-8', 'HTML-ENTITIES'), (string) $src);
    }
    */
}
