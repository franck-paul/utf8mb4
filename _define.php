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

$this->registerModule(
    "utf8mb4",                                                   // Name
    "UTF-8 mb4 partial support (posts/pages and comments only)", // Description
    "Franck Paul",                                               // Author
    '0.2',                                                       // Version
    [
        'requires'    => [['core', '2.13']], // Dependencies
        'permissions' => 'contentadmin',     // Permissions
        'type'        => 'plugin',           // Type
        'priority'    => 99999              // Priority
    ]
);
