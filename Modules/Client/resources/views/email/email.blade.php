<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Thông báo đổi mật khẩu') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #6c4baf;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
        .header img {
            width: 50px;
            height: auto;
        }
        .header h1 {
            font-size: 24px;
            margin: 10px 0;
            font-weight: bold;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            font-size: 20px;
            color: #333333;
        }
        .content p {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
        }
        .content strong {
            color: #27ae60;
        }
        .content .cta {
            display: block;
            margin: 20px 0;
            text-align: center;
        }
        .cta a {
            background-color: #6c4baf;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }
        .footer {
            background-color: #f4f6f8;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>
<body>
    <h1>Xin chào {{ $user->full_name }}</h1>
    <p>{{ __('Mật khẩu của bạn đã được thay đổi thành công.') }}</p>
    <p>{{ __('Nếu bạn không thực hiện việc này, vui lòng liên hệ với chúng tôi ngay lập tức.') }}</p>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <img src="https://your-logo-url.com/logo.png" alt="Logo">
            <h1>Make the Holidays Count</h1>
            <p>Google for YourCompany</p>
        </div>
        <!-- Content -->
        <div class="content">
            <h2>Xin chào {{ $user->full_name }}</h2>
            <p>{{ __('Mật khẩu của bạn đã được thay đổi thành công.') }}</p>
            <p>{{ __('Nếu bạn không thực hiện việc này, vui lòng liên hệ với chúng tôi ngay lập tức.') }}</p>
            <!-- Call to Action -->
            {{-- <div class="cta">
                <a href="https://your-company-url.com">Learn More</a>
            </div> --}}
        </div>
        <!-- Footer -->
        <div class="footer">
            <p>© 2024 YourCompany. All rights reserved.</p>
            <p>If you no longer wish to receive emails from us, you can <a href="#">unsubscribe here</a>.</p>
        </div>
    </div>
</body>
</html>
</html>