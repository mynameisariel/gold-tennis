# Tennis Booking System

A comprehensive booking system for tennis lessons built with Laravel, featuring lesson management, time slot scheduling, and customer booking capabilities.

## Features

### For Customers
- Browse available tennis lessons
- View lesson details and pricing
- Interactive calendar for date selection
- Real-time time slot availability
- Book lessons with optional notes
- View booking history and status

### For Administrators
- Dashboard with booking statistics
- Create and manage lesson types
- Add and manage time slots (single or recurring)
- View and manage all bookings
- Confirm or cancel bookings
- Quick time slot creation tools

## Database Structure

### Tables
1. **users** - User accounts with admin privileges
2. **lessons** - Tennis lesson types with pricing and details
3. **time_slots** - Available time slots for lessons
4. **bookings** - Customer bookings linked to time slots

### Key Relationships
- Users can have multiple bookings
- Lessons can have multiple time slots
- Time slots can have multiple bookings (but only one active)
- Bookings belong to both users and time slots

## Installation & Setup

1. **Run Migrations**
   ```bash
   php artisan migrate
   ```

2. **Seed Sample Data**
   ```bash
   php artisan db:seed --class=LessonSeeder
   php artisan db:seed --class=TimeSlotSeeder
   ```

3. **Make a User Admin**
   ```bash
   php artisan user:make-admin user@example.com
   ```

4. **Start the Development Server**
   ```bash
   php artisan serve
   ```

## Usage Guide

### For Administrators

1. **Access Admin Panel**
   - Navigate to `/admin` after logging in as an admin user
   - View dashboard with booking statistics

2. **Manage Lessons**
   - Go to `/admin/lessons` to view all lessons
   - Click "Add New Lesson" to create lesson types
   - Set title, description, duration, price, and image

3. **Manage Time Slots**
   - Click "Time Slots" on any lesson
   - Add individual time slots or recurring patterns
   - Use quick add buttons for common patterns (weekdays, weekends, evenings)
   - Enable/disable or delete time slots as needed

4. **Manage Bookings**
   - Go to `/admin/bookings` to view all customer bookings
   - Confirm pending bookings
   - Cancel bookings if necessary
   - View booking notes and customer details

### For Customers

1. **Browse Lessons**
   - Visit `/lessons` to see available lesson types
   - Click "Book Now" on any lesson

2. **Book a Lesson**
   - Select a date using the interactive calendar
   - Choose from available time slots
   - Add optional notes
   - Confirm booking

3. **View Bookings**
   - Log in and visit `/bookings` to see booking history
   - Cancel bookings if needed

## Key Routes

### Public Routes
- `/` - Home page
- `/lessons` - Browse lessons
- `/lessons/{lesson}` - View lesson details and book

### Customer Routes (Auth Required)
- `/bookings` - View booking history
- `/bookings/{booking}` - View booking details
- `/bookings/{booking}/cancel` - Cancel booking

### Admin Routes (Admin Required)
- `/admin` - Admin dashboard
- `/admin/lessons` - Manage lessons
- `/admin/lessons/create` - Create new lesson
- `/admin/lessons/{lesson}/time-slots` - Manage time slots
- `/admin/bookings` - Manage all bookings

## Technical Implementation

### Models
- **Lesson** - Manages lesson types and pricing
- **TimeSlot** - Handles availability and scheduling
- **Booking** - Manages customer reservations
- **User** - Extended with admin privileges

### Controllers
- **LessonController** - Handles lesson display and time slot queries
- **BookingController** - Manages customer booking operations
- **AdminController** - Handles all administrative functions

### Key Features
- **Interactive Calendar** - JavaScript-powered date selection
- **Real-time Availability** - AJAX calls to check time slot availability
- **Recurring Time Slots** - Automatic creation of weekly/monthly patterns
- **Admin Middleware** - Protects admin routes
- **Responsive Design** - Works on desktop and mobile

## Customization

### Adding New Lesson Types
1. Use the admin interface to create new lessons
2. Set appropriate pricing and duration
3. Add time slots for the new lesson type

### Modifying Time Slot Patterns
Edit the `createRecurringTimeSlots` method in `AdminController` to change:
- Recurring patterns (weekly, monthly, custom)
- Duration of recurring slots (currently 3 months)
- Time slot intervals

### Styling
The system uses Tailwind CSS for styling. Customize colors and layout by modifying:
- CSS classes in Blade templates
- Tailwind configuration in `tailwind.config.js`

## Security Features

- **Admin Middleware** - Protects admin routes
- **User Authorization** - Users can only view their own bookings
- **Input Validation** - All forms include proper validation
- **CSRF Protection** - All forms include CSRF tokens
- **SQL Injection Prevention** - Uses Eloquent ORM

## Future Enhancements

- Email notifications for bookings
- Payment integration
- Calendar integration (Google Calendar, Outlook)
- SMS reminders
- Customer reviews and ratings
- Advanced reporting and analytics
- Multi-location support 