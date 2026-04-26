<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .wrapper { max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { background: #1a6dd4; padding: 24px 32px; }
        .header h2 { color: #fff; margin: 0; font-size: 20px; }
        .header p { color: #cce0ff; margin: 4px 0 0; font-size: 13px; }
        .body { padding: 32px; }
        .field { margin-bottom: 18px; }
        .label { font-size: 12px; font-weight: bold; color: #888; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        .value { font-size: 15px; color: #333; }
        .message-box { background: #f8f9fa; border-left: 4px solid #1a6dd4; padding: 16px; border-radius: 4px; font-size: 15px; color: #333; line-height: 1.6; white-space: pre-wrap; }
        .footer { padding: 20px 32px; background: #f8f9fa; border-top: 1px solid #eee; font-size: 12px; color: #aaa; text-align: center; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 24px; background: #1a6dd4; color: #fff; text-decoration: none; border-radius: 5px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h2>New Customer Enquiry</h2>
            <p>NEXGEN BuildTech — Contact Form Submission</p>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">Name</div>
                <div class="value">{{ $contactMessage->name }}</div>
            </div>
            <div class="field">
                <div class="label">Email</div>
                <div class="value"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></div>
            </div>
            @if($contactMessage->phone)
            <div class="field">
                <div class="label">Phone</div>
                <div class="value">{{ $contactMessage->phone }}</div>
            </div>
            @endif
            @if($contactMessage->subject)
            <div class="field">
                <div class="label">Subject</div>
                <div class="value">{{ $contactMessage->subject }}</div>
            </div>
            @endif
            <div class="field">
                <div class="label">Message</div>
                <div class="message-box">{{ $contactMessage->message }}</div>
            </div>
            <a href="{{ url('/admin/messages') }}" class="btn">View in Admin Panel</a>
        </div>
        <div class="footer">
            This email was sent from the contact form on nexgenbuildtech.com &middot; {{ now()->format('d M Y, h:i A') }}
        </div>
    </div>
</body>
</html>
