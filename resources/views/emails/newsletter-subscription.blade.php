<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Newsletter Subscription</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #3b82f6; color: white; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background-color: #f9fafb; padding: 30px; border-radius: 0 0 8px 8px; }
        .info-box { background-color: #dbeafe; border: 1px solid #93c5fd; padding: 20px; border-radius: 6px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; color: #6b7280; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📧 New Newsletter Subscription</h1>
        </div>
        
        <div class="content">
            <h2>Hello Admin,</h2>
            
            <p>A new user has subscribed to your newsletter!</p>
            
            <div class="info-box">
                <h3>Subscriber Details:</h3>
                <p><strong>Name:</strong> {{ $name }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Date:</strong> {{ date('F j, Y \a\t g:i A') }}</p>
            </div>
            
            <p>This subscriber has been added to your mailing list and will receive:</p>
            <ul>
                <li>Welcome email (already sent)</li>
                <li>Future newsletter updates</li>
                <li>Special offers and announcements</li>
            </ul>
            
            <p>You can manage your subscribers and send newsletters through your admin panel.</p>
            
            <p>Best regards,<br>
            Gold Tennis Academy System</p>
        </div>
        
        <div class="footer">
            <p>© {{ date('Y') }} Gold Tennis Academy. All rights reserved.</p>
        </div>
    </div>
</body>
</html> 