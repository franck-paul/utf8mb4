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

$this->registerModule(
    'utf8mb4',                                                   // Name
    'UTF-8 mb4 partial support (posts/pages and comments only)', // Description
    'Franck Paul',                                               // Author
    '0.4',                                                       // Version
    [
        'requires'    => [['core', '2.19']],                       // Dependencies
        'permissions' => 'usage,contentadmin',                     // Permissions
        'type'        => 'plugin',                                 // Type
        'priority'    => 99999,                                    // Priority

        'details'    => 'https://open-time.net/?q=utf8mb4',       // Details URL
        'support'    => 'https://github.com/franck-paul/utf8mb4', // Support URL
        'repository' => 'https://raw.githubusercontent.com/franck-paul/utf8mb4/master/dcstore.xml'
    ]
);
