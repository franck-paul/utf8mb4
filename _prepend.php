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
// Public, XML/RPC and Admin mode

Clearbricks::lib()->autoload(['utf8mb4Behaviors' => __DIR__ . '/inc/utf8mb4.behaviors.php']);

dcCore::app()->addBehavior('publicBeforeCommentCreate', [utf8mb4Behaviors::class, 'publicBeforeCommentCreate']);

dcCore::app()->addBehavior('coreBeforeCommentCreate', [utf8mb4Behaviors::class, 'coreBeforeComment']);
dcCore::app()->addBehavior('coreBeforeCommentUpdate', [utf8mb4Behaviors::class, 'coreBeforeComment']);

dcCore::app()->addBehavior('coreBeforePostCreate', [utf8mb4Behaviors::class, 'coreBeforePost']);
dcCore::app()->addBehavior('coreBeforePostUpdate', [utf8mb4Behaviors::class, 'coreBeforePost']);

dcCore::app()->addBehavior('coreBeforeImageMetaCreate', [utf8mb4Behaviors::class, 'coreBeforeImageMetaCreate']);

if (!defined('DC_CONTEXT_ADMIN')) {
    return false;
}
// Admin mode only

dcCore::app()->addBehavior('adminPostEditor', [utf8mb4Behaviors::class, 'adminPostEditor']);
