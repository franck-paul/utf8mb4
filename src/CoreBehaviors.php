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
        $comment_content = is_string($comment_content = $cur->comment_content) ? $comment_content : '';

        $cur->comment_content = Helper::doEncoding($comment_content);

        return '';
    }

    public static function coreBeforeComment(BlogInterface $blog, Cursor $cur): string
    {
        $comment_content = is_string($comment_content = $cur->comment_content) ? $comment_content : '';

        $cur->comment_content = Helper::doEncoding($comment_content);

        return '';
    }

    public static function coreBeforePost(BlogInterface $blog, Cursor $cur): string
    {
        $post_excerpt       = is_string($post_excerpt = $cur->post_excerpt) ? $post_excerpt : '';
        $post_excerpt_xhtml = is_string($post_excerpt_xhtml = $cur->post_excerpt_xhtml) ? $post_excerpt_xhtml : '';
        $post_content       = is_string($post_content = $cur->post_content) ? $post_content : '';
        $post_content_xhtml = is_string($post_content_xhtml = $cur->post_content_xhtml) ? $post_content_xhtml : '';
        $post_notes         = is_string($post_notes = $cur->post_notes) ? $post_notes : '';

        $cur->post_excerpt       = Helper::doEncoding($post_excerpt);
        $cur->post_excerpt_xhtml = Helper::doEncoding($post_excerpt_xhtml);
        $cur->post_content       = Helper::doEncoding($post_content);
        $cur->post_content_xhtml = Helper::doEncoding($post_content_xhtml);
        $cur->post_notes         = Helper::doEncoding($post_notes);

        return '';
    }

    public static function coreBeforeImageMetaCreate(Cursor $cur): string
    {
        $media_meta = is_string($media_meta = $cur->media_meta) ? $media_meta : '';

        $cur->media_meta = Helper::doEncoding($media_meta);

        return '';
    }
}
