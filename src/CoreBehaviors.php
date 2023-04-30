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

use dcBlog;
use dcPage;
use Dotclear\Database\Cursor;

class CoreBehaviors
{
    public static function publicBeforeCommentCreate(Cursor $cur)
    {
        $cur->comment_content = Helper::doEncoding($cur->comment_content);
    }

    public static function coreBeforeComment(dcBlog $blog, Cursor $cur)
    {
        $cur->comment_content = Helper::doEncoding($cur->comment_content);
    }

    public static function coreBeforePost(dcBlog $blog, Cursor $cur)
    {
        $cur->post_excerpt       = Helper::doEncoding($cur->post_excerpt);
        $cur->post_excerpt_xhtml = Helper::doEncoding($cur->post_excerpt_xhtml);
        $cur->post_content       = Helper::doEncoding($cur->post_content);
        $cur->post_content_xhtml = Helper::doEncoding($cur->post_content_xhtml);
        $cur->post_notes         = Helper::doEncoding($cur->post_notes);
    }

    public static function coreBeforeImageMetaCreate(Cursor $cur)
    {
        $cur->media_meta = Helper::doEncoding($cur->media_meta);
    }

    public static function adminPostEditor(string $editor = '', string $context = '', array $tags = [], string $syntax = ''): string
    {
        // Cope only with Post and Page editing
        $contexts = ['post', 'page'];
        if (!in_array($context, $contexts)) {
            return '';
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
