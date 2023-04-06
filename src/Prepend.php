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

use dcCore;
use dcNsProcess;

class Prepend extends dcNsProcess
{
    public static function init(): bool
    {
        static::$init = defined('DC_RC_PATH');

        return static::$init;
    }

    public static function process(): bool
    {
        if (!static::$init) {
            return false;
        }

        dcCore::app()->addBehaviors([
            'coreBeforeCommentCreate' => [CoreBehaviors::class, 'coreBeforeComment'],
            'coreBeforeCommentUpdate' => [CoreBehaviors::class, 'coreBeforeComment'],

            'coreBeforePostCreate' => [CoreBehaviors::class, 'coreBeforePost'],
            'coreBeforePostUpdate' => [CoreBehaviors::class, 'coreBeforePost'],

            'coreBeforeImageMetaCreate' => [CoreBehaviors::class, 'coreBeforeImageMetaCreate'],
        ]);

        return true;
    }
}
