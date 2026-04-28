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

class FrontendBehaviors
{
    public static function publicBeforeCommentCreate(Cursor $cur): string
    {
        $comment_content = is_string($comment_content = $cur->comment_content) ? $comment_content : '';

        $cur->comment_content = Helper::doEncoding($comment_content);

        return '';
    }
}
