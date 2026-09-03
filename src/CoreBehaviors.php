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
    public static function publicBeforeCommentCreate(Cursor $cursor): string
    {
        $cursor->setStrField('comment_content', Helper::doEncoding($cursor->strField('comment_content')));

        return '';
    }

    public static function coreBeforeComment(BlogInterface $blog, Cursor $cursor): string
    {
        $cursor->setStrField('comment_content', Helper::doEncoding($cursor->strField('comment_content')));

        return '';
    }

    public static function coreBeforePost(BlogInterface $blog, Cursor $cursor): string
    {
        $cursor->setStrField('post_excerpt', Helper::doEncoding($cursor->strField('post_excerpt')));
        $cursor->setStrField('post_excerpt_xhtml', Helper::doEncoding($cursor->strField('post_excerpt_xhtml')));
        $cursor->setStrField('post_content', Helper::doEncoding($cursor->strField('post_content')));
        $cursor->setStrField('post_content_xhtml', Helper::doEncoding($cursor->strField('post_content_xhtml')));
        $cursor->setStrField('post_notes', Helper::doEncoding($cursor->strField('post_notes')));

        return '';
    }

    public static function coreBeforeImageMetaCreate(Cursor $cursor): string
    {
        $cursor->setStrField('media_meta', Helper::doEncoding($cursor->strField('media_meta')));

        return '';
    }
}
