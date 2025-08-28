# Mail Setup Instructions for Gold Tennis Academy

## Overview
This application includes a complete mailing system for:
- Newsletter subscription confirmations
- Admin notifications for new subscribers
- Booking confirmations (when admins confirm bookings)

## Recommended Mail Providers

### 1. Mailgun (Recommended for Production)
- **Pros**: Reliable, good deliverability, generous free tier (5,000 emails/month)
- **Setup**: 
  1. Sign up at [mailgun.com](https://mailgun.com)
  2. Verify your domain
  3. Get your API key and domain

**Environment Variables:**
```env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=your-domain.mailgun.org
MAILGUN_SECRET=your-mailgun-secret-key
MAIL_FROM_ADDRESS=noreply@goldtennis.com
MAIL_FROM_NAME="Gold Tennis Academy"
MAIL_ADMIN_EMAIL=admin@goldtennis.com
```

### 2. Postmark (Alternative Production Option)
- **Pros**: Excellent deliverability, great for transactional emails
- **Setup**: 
  1. Sign up at [postmarkapp.com](https://postmarkapp.com)
  2. Verify your domain
  3. Get your API token

**Environment Variables:**
```env
MAIL_MAILER=postmark
POSTMARK_TOKEN=your-postmark-token
MAIL_FROM_ADDRESS=noreply@goldtennis.com
MAIL_FROM_NAME="Gold Tennis Academy"
MAIL_ADMIN_EMAIL=admin@goldtennis.com
```

### 3. SMTP (Custom SMTP Server)
- **Pros**: Full control, can use existing email infrastructure
- **Setup**: Use your existing email provider's SMTP settings

**Environment Variables:**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@goldtennis.com
MAIL_FROM_NAME="Gold Tennis Academy"
MAIL_ADMIN_EMAIL=admin@goldtennis.com
```

### 4. Log Driver (Development/Testing)
- **Pros**: No external dependencies, emails are logged to files
- **Setup**: Perfect for local development

**Environment Variables:**
```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS=noreply@goldtennis.com
MAIL_FROM_NAME="Gold Tennis Academy"
MAIL_ADMIN_EMAIL=admin@goldtennis.com
```

## Installation Steps

### 1. Install Required Packages
```bash
# For Mailgun
composer require guzzlehttp/guzzle

# For Postmark
composer require wildbit/swiftmailer-postmark
```

### 2. Update .env File
Copy the appropriate configuration from above to your `.env` file.

### 3. Run Migration
```bash
php artisan migrate
```
This creates the `newsletter_subscribers` table.

### 4. Test the System
1. Visit `/contact` page
2. Subscribe to the newsletter
3. Check your email for the welcome message
4. Check admin email for the subscription notification

## Features

### Newsletter System
- **Contact Page**: `/contact` with subscription form
- **Welcome Email**: Sent to new subscribers
- **Admin Notification**: Sent to admin when someone subscribes
- **Database Storage**: Subscribers stored in `newsletter_subscribers` table

### Booking Confirmation System
- **Admin Trigger**: When admin confirms a booking
- **User Email**: Detailed confirmation with lesson details
- **Professional Template**: Branded email with all necessary information

## Customization

### Email Templates
- **Location**: `resources/views/emails/`
- **Files**: 
  - `newsletter-welcome.blade.php`
  - `newsletter-subscription.blade.php`
  - `booking-confirmation.blade.php`

### Styling
- All emails use inline CSS for maximum compatibility
- Colors match your brand (green theme)
- Responsive design for mobile devices

### Content
- Update coach names and emails in `resources/views/contact.blade.php`
- Modify email content in the respective `.blade.php` files
- Update business address and contact information

## Troubleshooting

### Common Issues
1. **Emails not sending**: Check your mail configuration and API keys
2. **Emails going to spam**: Ensure proper domain verification and SPF records
3. **Template errors**: Check that all email templates exist and are properly formatted

### Testing
- Use the log driver during development to see emails in `storage/logs/laravel.log`
- Test with real email addresses before going live
- Verify all email templates render correctly

## Security Notes
- Never commit API keys to version control
- Use environment variables for sensitive information
- Consider rate limiting for newsletter subscriptions
- Implement email verification if needed

## Future Enhancements
- Email unsubscribe functionality
- Newsletter campaign management
- Email analytics and tracking
- Bulk email sending for announcements 