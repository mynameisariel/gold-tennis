<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tennis Lesson Confirmed</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #10b981; color: white; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background-color: #f9fafb; padding: 30px; border-radius: 0 0 8px 8px; }
        .booking-details { background-color: #dbeafe; border: 1px solid #93c5fd; padding: 20px; border-radius: 6px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; color: #6b7280; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎾 Tennis Lesson Confirmed!</h1>
        </div>
        
        <div class="content">
            <h2>Hi {{ $user->name }},</h2>
            
            <p>Great news! Your tennis lesson has been confirmed. We're looking forward to seeing you on the court!</p>
            
            <div class="booking-details">
                <h3>Lesson Details:</h3>
                <p><strong>Lesson:</strong> {{ $lesson->title }}</p>
                <p><strong>Date:</strong> {{ $timeSlot->date->format('F j, Y') }}</p>
                <p><strong>Time:</strong> {{ $timeSlot->start_time->format('g:i A') }} - {{ $timeSlot->end_time->format('g:i A') }}</p>
                <p><strong>Duration:</strong> {{ $lesson->duration_minutes }} minutes</p>
                <p><strong>Price:</strong> ${{ number_format($lesson->price, 2) }}</p>
            </div>
            
            <h3>What to Bring:</h3>
            <ul>
                <li>🎾 Tennis racket (we can provide one if needed)</li>
                <li>👟 Comfortable athletic shoes</li>
                <li>💧 Water bottle</li>
                <li>😊 Positive attitude and enthusiasm!</li>
            </ul>
            
            <h3>Location:</h3>
            <p>Gold Tennis Academy<br>
            123 Tennis Court Drive<br>
            City, State 12345</p>
            
            <p><strong>Please arrive 10 minutes before your scheduled time.</strong></p>
            
            <p>If you need to cancel or reschedule, please contact us at least 24 hours in advance:</p>
            <p><strong>Coach:</strong> <a href="mailto:coach@goldtennis.com">coach@goldtennis.com</a></p>
            
            <p>See you on the court!</p>
            
            <p>Best regards,<br>
            The Gold Tennis Academy Team</p>
        </div>
        
        <div class="footer">
            <p>© {{ date('Y') }} Gold Tennis Academy. All rights reserved.</p>
        </div>
    </div>
</body>
</html> 