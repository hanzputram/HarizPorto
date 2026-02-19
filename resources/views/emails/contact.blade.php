<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Inter', sans-serif; line-height: 1.6; color: #1a1a1a; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e5e7eb; border-radius: 12px; }
        .header { font-size: 24px; font-weight: 800; text-transform: uppercase; margin-bottom: 20px; color: #D946EF; }
        .info { margin-bottom: 15px; }
        .label { font-weight: 700; text-transform: uppercase; font-size: 12px; color: #6b7280; }
        .content { background: #f9fafb; padding: 15px; border-radius: 8px; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">New Transmission Received.</div>
        
        <div class="info">
            <div class="label">From</div>
            <div class="content">{{ $data['name'] }} ({{ $data['email'] }})</div>
        </div>

        <div class="info">
            <div class="label">Message</div>
            <div class="content">{{ $data['message'] }}</div>
        </div>

        <div style="margin-top: 30px; font-size: 10px; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.1em;">
            Sent via Hariz.Studio Portfolio Contact Form
        </div>
    </div>
</body>
</html>
