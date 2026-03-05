<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Message</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f0f4f6; margin: 0; padding: 32px 16px; color: #24353e; }
        .card { max-width: 560px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #289db9, #1e7d94); padding: 28px 32px; }
        .header h1 { margin: 0; color: #fff; font-size: 20px; font-weight: 700; }
        .header p { margin: 4px 0 0; color: rgba(255,255,255,0.8); font-size: 13px; }
        .body { padding: 32px; }
        .field { margin-bottom: 20px; }
        .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #289db9; margin-bottom: 4px; }
        .value { font-size: 15px; color: #24353e; line-height: 1.6; background: #f0f4f6; border-radius: 8px; padding: 10px 14px; }
        .footer { padding: 20px 32px; background: #f0f4f6; border-top: 1px solid #d1e0e5; font-size: 12px; color: #6b8a98; text-align: center; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <h1>📬 New Contact Form Message</h1>
            <p>Received via creativeteamdigital.com</p>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">Name</div>
                <div class="value">{{ $senderName }}</div>
            </div>
            <div class="field">
                <div class="label">Phone</div>
                <div class="value" dir="ltr">{{ $phone }}</div>
            </div>
            @if($service)
            <div class="field">
                <div class="label">Service Requested</div>
                <div class="value">{{ $service }}</div>
            </div>
            @endif
            <div class="field">
                <div class="label">Message</div>
                <div class="value">{{ $userMessage }}</div>
            </div>
        </div>
        <div class="footer">
            Creative Team &mdash; info@creativeteamdigital.com
        </div>
    </div>
</body>
</html>
