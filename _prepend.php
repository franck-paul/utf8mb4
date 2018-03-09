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

if (!defined('DC_RC_PATH')) {return;}
// Public, XML/RPC and Admin mode

$__autoload['utf8mb4Behaviors'] = dirname(__FILE__) . '/inc/utf8mb4.behaviors.php';

$core->addBehavior('publicBeforeCommentCreate', array('utf8mb4Behaviors', 'publicBeforeCommentCreate'));

$core->addBehavior('coreBeforeCommentCreate', array('utf8mb4Behaviors', 'coreBeforeComment'));
$core->addBehavior('coreBeforeCommentUpdate', array('utf8mb4Behaviors', 'coreBeforeComment'));

$core->addBehavior('coreBeforePostCreate', array('utf8mb4Behaviors', 'coreBeforePost'));
$core->addBehavior('coreBeforePostUpdate', array('utf8mb4Behaviors', 'coreBeforePost'));

if (!defined('DC_CONTEXT_ADMIN')) {return false;}
// Admin mode only

$core->addBehavior('adminPostEditor', array('utf8mb4Behaviors', 'adminPostEditor'));
