jQuery(document).ready(function($) {
    const $toggleBtn = $('#worknoon-toggle');
    const $chatBox = $('#worknoon-chat-box');
    const $chatForm = $('#worknoon-input-pipeline');
    const $chatInput = $('#worknoon-chat-input');
    const $stream = $('#worknoon-message-stream');

    // UI Transformation toggle switch
    $toggleBtn.on('click', function() {
        $chatBox.toggleClass('hidden');
    });

    // Asynchronous Request Pipelines Handler
    $chatForm.on('submit', function(e) {
        e.preventDefault();
        const msgText = $chatInput.val().trim();
        if (!msgText) return;

        // Render client message input optimistically 
        $stream.append(`<div class="msg user"><strong>You:</strong> ${msgText}</div>`);
        $chatInput.val('');

        $.ajax({
            url: worknoon_context.ajax_url,
            type: 'POST',
            data: {
                action: 'worknoon_send_msg',
                security: worknoon_context.nonce,
                message: msgText,
                product_id: worknoon_context.product_id
            },
            success: function(response) {
                if (response.success) {
                    const data = response.data;
                    $stream.append(`<div class="msg system"><strong>System:</strong> Message routed securely.</div>`);
                    console.log('Synchronized Meta Context Payload:', data.context);
                }
            },
            error: function() {
                $stream.append(`<div class="msg error">Connection pipeline dropped.</div>`);
            }
        });
    });
});
