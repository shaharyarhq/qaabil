<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background:#f8fafd; margin:0; padding:0; }
        .wrap { max-width:560px; margin:40px auto; background:#fff; border-radius:12px; overflow:hidden; border:1px solid #e2e8f0; }
        .header { background:#1b3a6b; padding:28px 32px; }
        .header h1 { color:#f59e0b; margin:0; font-size:18px; }
        .header p { color:#94a3b8; margin:4px 0 0; font-size:13px; }
        .body { padding:32px; }
        .row { margin-bottom:20px; }
        .label { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#94a3b8; margin-bottom:4px; }
        .value { font-size:14px; color:#0f172a; font-weight:500; }
        .message-box { background:#f8fafd; border:1px solid #e2e8f0; border-radius:8px; padding:16px; font-size:14px; color:#0f172a; line-height:1.6; white-space:pre-wrap; }
        .footer { padding:20px 32px; border-top:1px solid #e2e8f0; font-size:12px; color:#94a3b8; text-align:center; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <h1>New Contact Form Submission</h1>
        <p>Someone reached out via qaabil.io</p>
    </div>
    <div class="body">
        <div class="row">
            <div class="label">Name</div>
            <div class="value"><?php echo e($data['name']); ?></div>
        </div>
        <div class="row">
            <div class="label">Email</div>
            <div class="value"><?php echo e($data['email']); ?></div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($data['phone'])): ?>
        <div class="row">
            <div class="label">Phone</div>
            <div class="value"><?php echo e($data['phone']); ?></div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($data['topic'])): ?>
        <div class="row">
            <div class="label">Topic</div>
            <div class="value"><?php echo e($data['topic']); ?></div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <div class="row">
            <div class="label">Message</div>
            <div class="message-box"><?php echo e($data['message']); ?></div>
        </div>
    </div>
    <div class="footer">
        Hit reply to respond directly to <?php echo e($data['name']); ?>.
    </div>
</div>
</body>
</html><?php /**PATH /var/www/html/resources/views/emails/contact.blade.php ENDPATH**/ ?>