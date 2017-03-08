<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of typo, a plugin for Dotclear 2.
#
# Copyright (c) Franck Paul and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_RC_PATH')) { return; }

$this->registerModule(
	/* Name */				"utf8mb4",
	/* Description*/		"UTF-8 mb4 partial support (posts/pages and comments only)",
	/* Author */			"Franck Paul",
	/* Version */			'0.1',
	array(
		/* Permissions */	'permissions' =>	'contentadmin',
		/* Type */			'type' =>			'plugin',
		/* Priority */		'priority' =>		99999
	)
);
