<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of utf8mb4, a plugin for Dotclear 2.
#
# Copyright (c) Franck Paul and contributors
# carnet.franck.paul@gmail.com
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_RC_PATH')) { return; }
// Public, XML/RPC and Admin mode

$__autoload['utf8mb4Behaviors'] = 	dirname(__FILE__).'/inc/utf8mb4.behaviors.php';

$core->addBehavior('publicBeforeCommentCreate',array('utf8mb4Behaviors','publicBeforeCommentCreate'));

$core->addBehavior('coreBeforeCommentCreate',array('utf8mb4Behaviors','coreBeforeComment'));
$core->addBehavior('coreBeforeCommentUpdate',array('utf8mb4Behaviors','coreBeforeComment'));

$core->addBehavior('coreBeforePostCreate',array('utf8mb4Behaviors','coreBeforePost'));
$core->addBehavior('coreBeforePostUpdate',array('utf8mb4Behaviors','coreBeforePost'));


if (!defined('DC_CONTEXT_ADMIN')) { return false; }
// Admin mode only

$core->addBehavior('adminPostEditor',array('utf8mb4Behaviors','adminPostEditor'));
