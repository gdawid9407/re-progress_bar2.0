<?php
/**
 * Plugin Name:       Re Progress Bar
 * Plugin URI:        https://example.com/re-progress-bar/docs
 * Description:       Dynamic front‑end progress tracking plugin for WordPress.
 * Version:           0.1.0
 * Author:            Dawid Gołis 
 * License:           GPL‑2.0‑or‑later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       re-progress_bar
 * Domain Path:       /languages
 *
 * Actions:
 *   re_progress_bar_loaded     — fired after plugin bootstrap completes.
 *   re_progress_bar_activate   — fired on activation (inside Activator::activate()).
 *   re_progress_bar_deactivate — fired on deactivation (inside Deactivator::deactivate()).
 *
 * Filters:
 *   re_progress_bar_assets_url       — string $url | Override base URL for assets.
 *   re_progress_bar_settings_defaults — array  $defaults | Modify default settings.
 *
 * @package ReProgressBar
 */

declare(strict_types=1);

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/*
Global Constants
*/

define('RE_PROGRESS_BAR_PATH', plugin_dir_path(__FILE__));

define('RE_PROGRESS_BAR_URL', plugin_dir_url(__FILE__) . 'assets/');

define('RE_PROGRESS_BAR_TD', 're-progress_bar');

/*
Autoloaders
 Prefer autoloader z Composera; jeśli brak, użyj fallbacku z includes/autoload.php.
*/

$composerAutoloader = RE_PROGRESS_BAR_PATH . 'vendor/autoload.php';
if (file_exists($composerAutoloader)) {
    require_once $composerAutoloader;
} else {
    require_once RE_PROGRESS_BAR_PATH . 'includes/autoload.php';
}

/*
 Lifecycle hooks
*/

register_activation_hook(__FILE__, [\ReProgressBar\Setup\Activator::class, 'activate']);
register_deactivation_hook(__FILE__, [\ReProgressBar\Setup\Deactivator::class, 'deactivate']);
register_uninstall_hook(__FILE__, [\ReProgressBar\Setup\Uninstaller::class, 'uninstall']);


/* Bootstrap */


add_action('plugins_loaded', static function (): void {
    \ReProgressBar\Bootstrap::run();
    do_action('re_progress_bar_loaded');
});
