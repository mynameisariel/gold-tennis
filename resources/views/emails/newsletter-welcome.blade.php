<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Gold Tennis Academy Newsletter</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #10b981; color: white; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background-color: #f9fafb; padding: 30px; border-radius: 0 0 8px 8px; }
        .button { display: inline-block; background-color: #10b981; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; color: #6b7280; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎾 Welcome to Gold Tennis Academy!</h1>
        </div>
        
        <div class="content">
            <h2>Hi {{ $name }},</h2>
            
            <p>Thank you for subscribing to our newsletter! We're excited to have you join our tennis community.</p>
            
            <p>As a subscriber, you'll receive:</p>
            <ul>
                <li>🎯 Pro tennis tips and techniques</li>
                <li>🏆 Tournament updates and results</li>
                <li>💚 Special offers and discounts</li>
                <li>📅 Upcoming events and clinics</li>
            </ul>
            
            <p>Ready to improve your game? Check out our current lesson offerings:</p>
            
            <a href="{{ url('/lessons') }}" class="button">View Tennis Lessons</a>
            
            <p>If you have any questions or want to book a lesson, feel free to reach out to our coaches:</p>
            
            <p><strong>Head Coach:</strong> <a href="mailto:coach@goldtennis.com">coach@goldtennis.com</a></p>
            <p><strong>Assistant Coach:</strong> <a href="mailto:sarah@goldtennis.com">sarah@goldtennis.com</a></p>
            
            <p>See you on the court!</p>
            
            <p>Best regards,<br>
            The Gold Tennis Academy Team</p>
        </div>
        
        <div class="footer">
            <p>© {{ date('Y') }} Gold Tennis Academy. All rights reserved.</p>
            <p>If you no longer wish to receive these emails, you can unsubscribe at any time.</p>
        </div>
    </div>
</body>
</html> 