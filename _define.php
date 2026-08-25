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

if (isset($this) && is_object($this) && method_exists($this, 'registerModule') && isset($this->id) && is_string($this->id)) {
    $this->registerModule(
        'utf8mb4',
        'UTF-8 mb4 partial support (posts/pages and comments only)',
        'Franck Paul',
        '5.3',
        [
            'date'        => '2026-08-03T10:15:57+0200',
            'requires'    => [['core', '2.40']],
            'permissions' => 'My',
            'type'        => 'plugin',
            'priority'    => 99999,

            'details'    => 'https://open-time.net/?q=utf8mb4',
            'support'    => 'https://github.com/franck-paul/utf8mb4',
            'repository' => 'https://raw.githubusercontent.com/franck-paul/utf8mb4/main/dcstore.xml',
            'license'    => 'gpl2',
        ]
    );
}
