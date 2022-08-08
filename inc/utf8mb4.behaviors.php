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
if (!defined('DC_RC_PATH')) {
    return;
}

class utf8mb4Behaviors
{
    private static function doEncoding($src)
    {
        // Replace 4 bytes long UTF-8 characters to their HTML entity equivalent
        return empty($src) ? $src : preg_replace_callback('/./u', fn (array $match) => strlen($match[0]) >= 4 ? mb_convert_encoding($match[0], 'HTML-ENTITIES', 'UTF-8') : $match[0], $src);
    }

    /* Unused
    private static function doDecoding($src)
    {
        // Replace HTML entity (Unicode chars only) to their UTF-8 characters
        return empty($src) ? $src : preg_replace_callback('/(&#[0-9]+;)/', fn (array $match) => mb_convert_encoding($match[1], 'UTF-8', 'HTML-ENTITIES'), $src);
    }
    */

    public static function publicBeforeCommentCreate($cur)
    {
        $cur->comment_content = self::doEncoding($cur->comment_content);
    }

    public static function coreBeforeComment($blog, $cur)
    {
        $cur->comment_content = self::doEncoding($cur->comment_content);
    }

    public static function coreBeforePost($blog, $cur)
    {
        $cur->post_excerpt       = self::doEncoding($cur->post_excerpt);
        $cur->post_excerpt_xhtml = self::doEncoding($cur->post_excerpt_xhtml);
        $cur->post_content       = self::doEncoding($cur->post_content);
        $cur->post_content_xhtml = self::doEncoding($cur->post_content_xhtml);
        $cur->post_notes         = self::doEncoding($cur->post_notes);
    }

    public static function coreBeforeImageMetaCreate($cur)
    {
        $cur->media_meta = self::doEncoding($cur->media_meta);
    }

    public static function adminPostEditor($editor = '', $context = '', array $tags = [], $syntax = '')
    {
        // Cope only with Post and Page editing
        $contexts = ['post', 'page'];
        if (!in_array($context, $contexts)) {
            return;
        }

        // dcLegacyEditor (wiki/markdown syntax) use original textarea (others known editors use iframe)
        $syntaxes = ['wiki', 'markdown'];

        return
        dcPage::jsJson('utf8mb4', [
            'utf8mb4n_notes_only' => $editor == 'dcLegacyEditor' && in_array($syntax, $syntaxes) ? 0 : 1,
        ]) .
        dcPage::jsModuleLoad('utf8mb4/js/he.js') .
        dcPage::jsModuleLoad('utf8mb4/js/post.js');
    }
}
