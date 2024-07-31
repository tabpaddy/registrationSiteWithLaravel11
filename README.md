# registrationSiteWithLaravel11
```markdown
# Laravel 11 Registration and Forgot Password with OTP

This Laravel 11 application includes a user registration page and a "Forgot Password" feature that uses OTP (One-Time Password) verification sent to the user's email.

## Features

- User registration
- Login and logout
- Forgot password with OTP verification
- Secure password reset

## Prerequisites

- PHP >= 8.2
- Composer
- MySQL or any other supported database
- Mailtrap or another email testing tool

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/tabpaddy/registrationSiteWithLaravel11.git
   cd yourrepository
   ```

2. Install dependencies:
   ```sh
   composer install
   ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
   ```sh
   cp .env.example .env
   ```

4. Generate the application key:
   ```sh
   php artisan key:generate
   ```

5. Set up your database and email configuration in the `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password

   MAIL_MAILER=smtp
   MAIL_HOST=smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=your_mailtrap_username
   MAIL_PASSWORD=your_mailtrap_password
   MAIL_ENCRYPTION=null
   MAIL_FROM_ADDRESS="noreply@example.com"
   MAIL_FROM_NAME="${APP_NAME}"
   ```

6. Run the migrations to set up the database tables:
   ```sh
   php artisan migrate
   ```

## Usage

### User Registration

1. Visit the registration page at `/register`.
2. Fill in the required details and submit the form to create a new account.

### Forgot Password with OTP

1. Visit the forgot password page at `/forgot-password`.
2. Enter your registered email address and submit the form.
3. Check your email for the OTP and follow the link to verify the OTP.
4. Enter the OTP and your new password to reset your password.

## Routes

The following routes are available in the application:

- `GET /register`: Show the registration form.
- `POST /register`: Handle the registration form submission.
- `GET /login`: Show the login form.
- `POST /login`: Handle the login form submission.
- `POST /logout`: Log the user out.
- `GET /forgot-password`: Show the forgot password form.
- `POST /forgot-password`: Send the OTP to the user's email.
- `GET /verify-otp`: Show the OTP verification form.
- `POST /verify-otp`: Verify the OTP.
- `GET /reset-password`: Show the reset password form.
- `POST /reset-password`: Handle the reset password form submission.

## Controllers

The main controller handling the forgot password functionality is `ForgotPasswordController`:

- `showForgotPasswordForm()`: Display the forgot password form.
- `sendOTP(Request $request)`: Generate and send the OTP to the user's email.
- `showVerifyOTPForm(Request $request)`: Display the OTP verification form.
- `verifyOTP(Request $request)`: Verify the provided OTP.
- `showResetPasswordForm(Request $request)`: Display the reset password form.
- `resetPassword(Request $request)`: Handle the password reset and delete the OTP.

## Models

The application includes the following models:

- `User`: The default user model for authentication.
- `Otp`: Model to store OTPs in the database.

## Views

The application includes the following views:

- `auth/forgot-password.blade.php`: The forgot password form.
- `auth/verify-otp.blade.php`: The OTP verification form.
- `auth/reset-password.blade.php`: The reset password form.
- `emails/otp.blade.php`: The email template for sending OTP.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Contributing

If you'd like to contribute to this project, please submit a pull request or open an issue on GitHub.

## Contact

For any questions or inquiries, please contact [taborotap@gmail.com].

```

