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
$this->registerModule(
    'utf8mb4',
    'UTF-8 mb4 partial support (posts/pages and comments only)',
    'Franck Paul',
    '2.2',
    [
        'requires'    => [['core', '2.26']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_USAGE,
            dcAuth::PERMISSION_CONTENT_ADMIN,
        ]),
        'type'     => 'plugin',
        'priority' => 99999,

        'details'    => 'https://open-time.net/?q=utf8mb4',
        'support'    => 'https://github.com/franck-paul/utf8mb4',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/utf8mb4/master/dcstore.xml',
    ]
);
