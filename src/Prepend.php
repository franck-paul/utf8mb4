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
use Dotclear\Core\Process;

class Prepend extends Process
{
    public static function init(): bool
    {
        return self::status(My::checkContext(My::PREPEND));
    }

    public static function process(): bool
    {
        if (!self::status()) {
            return false;
        }

        dcCore::app()->addBehaviors([
            'coreBeforeCommentCreate' => CoreBehaviors::coreBeforeComment(...),
            'coreBeforeCommentUpdate' => CoreBehaviors::coreBeforeComment(...),

            'coreBeforePostCreate' => CoreBehaviors::coreBeforePost(...),
            'coreBeforePostUpdate' => CoreBehaviors::coreBeforePost(...),

            'coreBeforeImageMetaCreate' => CoreBehaviors::coreBeforeImageMetaCreate(...),
        ]);

        return true;
    }
}
