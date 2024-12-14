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

use Dotclear\Database\Cursor;
use Dotclear\Interface\Core\BlogInterface;

class CoreBehaviors
{
    public static function publicBeforeCommentCreate(Cursor $cur): string
    {
        $cur->comment_content = Helper::doEncoding((string) $cur->comment_content);

        return '';
    }

    public static function coreBeforeComment(BlogInterface $blog, Cursor $cur): string
    {
        $cur->comment_content = Helper::doEncoding((string) $cur->comment_content);

        return '';
    }

    public static function coreBeforePost(BlogInterface $blog, Cursor $cur): string
    {
        $cur->post_excerpt       = Helper::doEncoding((string) $cur->post_excerpt);
        $cur->post_excerpt_xhtml = Helper::doEncoding((string) $cur->post_excerpt_xhtml);
        $cur->post_content       = Helper::doEncoding((string) $cur->post_content);
        $cur->post_content_xhtml = Helper::doEncoding((string) $cur->post_content_xhtml);
        $cur->post_notes         = Helper::doEncoding((string) $cur->post_notes);

        return '';
    }

    public static function coreBeforeImageMetaCreate(Cursor $cur): string
    {
        $cur->media_meta = Helper::doEncoding((string) $cur->media_meta);

        return '';
    }
}
