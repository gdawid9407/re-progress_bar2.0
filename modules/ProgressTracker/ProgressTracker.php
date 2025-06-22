<?php
namespace ReProgressBar\ProgressTracker;

// Main class for progress bar injection and shortcode rendering
class ProgressTracker
{
    /**
     * Initialize hooks
     */
    public static function init(): void
    {
        add_action('wp_footer', [__CLASS__, 'injectProgressBar']);
        add_shortcode('progress_bar', [__CLASS__, 'renderShortcode']);
    }

    /**
     * Injects progress bar markup into site footer
     */
    public static function injectProgressBar(): void
    {
        echo '<div id="re-progress-bar"></div>';
        // Additional inline scripts or styles can be added here
    }

    /**
     * Renders progress bar via shortcode
     *
     * @param array $atts Shortcode attributes
     * @return string HTML for progress bar
     */
    public static function renderShortcode(array $atts): string
    {
        $defaults = [
            'height' => '4px',
            'color'  => '#29d',
        ];
        $args = shortcode_atts($defaults, $atts);
        return sprintf(
            '<div class="re-progress-bar-shortcode" style="height:%s; background:%s"></div>',
            esc_attr($args['height']),
            esc_attr($args['color'])
        );
    }
}
