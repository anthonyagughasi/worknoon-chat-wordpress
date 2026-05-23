<?php
if (!defined('ABSPATH')) exit;

// 1. Queue Parent and Child Stylesheets efficiently
function worknoon_enqueue_styles() {
    wp_enqueue_style('storefront-parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('worknoon-child-style', get_stylesheet_directory_uri() . '/assets/css/chat-widget.css', array(), '1.0.0');
    wp_enqueue_script('worknoon-chat-core', get_stylesheet_directory_uri() . '/assets/js/chat-core.js', array('jquery'), '1.0.0', true);

    // Pass dynamic runtime environmental parameters safely to the client side
    $chat_context = array(
        'ajax_url'   => admin_url('admin-ajax.php'),
        'nonce'      => wp_create_nonce('worknoon_chat_secure_token'),
        'product_id' => is_product() ? get_the_ID() : null,
        'user_id'    => get_current_user_id()
    );
    wp_localize_script('worknoon-chat-core', 'worknoon_context', $chat_context);
}
add_action('wp_enqueue_scripts', 'worknoon_enqueue_styles');

// 2. Inject Floating Chat Widget directly into footer hooks
function worknoon_render_floating_widget() {
    $current_product_context = '';
    if (is_product()) {
        global $product;
        $current_product_context = esc_attr($product->get_name());
    }
    ?>
    <div id="worknoon-widget-root" class="worknoon-floating-container">
        <button id="worknoon-toggle" class="worknoon-trigger-btn">💬</button>
        <div id="worknoon-chat-box" class="worknoon-chat-wrapper hidden">
            <div class="worknoon-chat-header">
                <h4>Worknoon Assist</h4>
                <?php if (!empty($current_product_context)) : ?>
                    <span class="product-tag">Context: <?php echo esc_html($current_product_context); ?></span>
                <?php endif; ?>
            </div>
            <div id="worknoon-message-stream" class="worknoon-body"></div>
            <form id="worknoon-input-pipeline" class="worknoon-footer">
                <input type="text" id="worknoon-chat-input" placeholder="Ask us a question..." required />
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'worknoon_render_floating_widget');

// 3. High-Performance Non-Blocking AJAX Payload Receiver
function worknoon_process_ajax_message() {
    check_ajax_referer('worknoon_chat_secure_token', 'security');

    $message    = sanitize_text_field($_POST['message']);
    $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    $user_id    = get_current_user_id();
    
    // WooCommerce Order Context Synchronization mapping loop
    $order_history = array();
    if ($user_id > 0 && class_exists('WooCommerce')) {
        $customer_orders = wc_get_orders(array('customer_id' => $user_id, 'limit' => 3));
        foreach ($customer_orders as $order) {
            $order_history[] = array(
                'id'     => $order->get_id(),
                'status' => $order->get_status(),
                'total'  => $order->get_total()
            );
        }
    }

    // Assemble unified transactional payload schema
    $payload = array(
        'status'    => 'success',
        'message'   => $message,
        'timestamp' => current_time('mysql'),
        'context'   => array(
            'product_id' => $product_id,
            'orders'     => $order_history
        )
    );

    wp_send_json_success($payload);
}
add_action('wp_ajax_worknoon_send_msg', 'worknoon_process_ajax_message');
add_action('wp_ajax_nopriv_worknoon_send_msg', 'worknoon_process_ajax_message');
