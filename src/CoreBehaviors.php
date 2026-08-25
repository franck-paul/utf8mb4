<?php

/**
 * @brief utf8mb4, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul
 *
 * @copyright Franck Paul contact@open-time.net
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
        $cur->setStrField('comment_content', Helper::doEncoding($cur->strField('comment_content')));

        return '';
    }

    public static function coreBeforeComment(BlogInterface $blog, Cursor $cur): string
    {
        $cur->setStrField('comment_content', Helper::doEncoding($cur->strField('comment_content')));

        return '';
    }

    public static function coreBeforePost(BlogInterface $blog, Cursor $cur): string
    {
        $cur->setStrField('post_excerpt', Helper::doEncoding($cur->strField('post_excerpt')));
        $cur->setStrField('post_excerpt_xhtml', Helper::doEncoding($cur->strField('post_excerpt_xhtml')));
        $cur->setStrField('post_content', Helper::doEncoding($cur->strField('post_content')));
        $cur->setStrField('post_content_xhtml', Helper::doEncoding($cur->strField('post_content_xhtml')));
        $cur->setStrField('post_notes', Helper::doEncoding($cur->strField('post_notes')));

        return '';
    }

    public static function coreBeforeImageMetaCreate(Cursor $cur): string
    {
        $cur->setStrField('media_meta', Helper::doEncoding($cur->strField('media_meta')));

        return '';
    }
}
