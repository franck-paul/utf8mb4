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
    /**
     * Does an encoding.
     *
     * @param      string  $src    The source
     *
     * @return     string
     */
    public static function doEncoding(string $src): string
    {
        // Replace 4 bytes long UTF-8 characters to their HTML entity equivalent
        if ($src === '') {
            return '';
        }

        return (string) preg_replace_callback(
            '/./u',
            static function (array $match) {
                $char = $match[0];
                $len  = strlen($char);
                if ($len >= 4) {
                    // Note: (string) mb_convert_encoding($match[0], 'HTML-ENTITIES', 'UTF-8'); -> Throw error with PHP 8.2:
                    //
                    // mb_convert_encoding(): Handling HTML entities via mbstring is deprecated; use htmlspecialchars, htmlentities, or
                    // mb_encode_numericentity/mb_decode_numericentity instead

                    $char = mb_encode_numericentity($char, [0x80, 0x10FFFF, 0, ~0], 'UTF-8');
                }
                return $char;
            },
            (string) $src
        );
    }
}
