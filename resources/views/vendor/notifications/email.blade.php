<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Đặt Lại Mật Khẩu</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            background-color: #edf2f7;
            margin: 0;
            padding: 0;
        }
        .inner-body {
            background-color: #ffffff;
            border: 1px solid #e8e5ef;
            border-radius: 2px;
            margin: 0 auto;
            padding: 32px;
            width: 570px;
        }
        .button {
            background-color: #2d3748;
            border-radius: 4px;
            color: #fff;
            display: inline-block;
            font-size: 16px;
            padding: 8px 18px;
            text-decoration: none;
        }
        .footer {
            text-align: center;
            color: #b0adc5;
            font-size: 12px;
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="inner-body" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td>
                            <h1 style="color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0;">Xin chào!</h1>
                            <p style="font-size: 16px; line-height: 1.5em; margin-top: 0;">Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
                            <p style="margin: 30px 0; text-align: center;">
                                <a href="{{ $actionUrl }}" class="button" target="_blank">Đặt Lại Mật Khẩu</a>
                            </p>
                            <p style="font-size: 16px; line-height: 1.5em; margin-top: 0;">Liên kết đặt lại mật khẩu này sẽ hết hạn trong 60 phút.</p>
                            <p style="font-size: 16px; line-height: 1.5em; margin-top: 0;">Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
                            <p style="font-size: 16px; line-height: 1.5em; margin-top: 0;">Trân trọng,<br>Fashion - Thời trang Phong cách Việt</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="footer">
                            <p>Nếu bạn gặp sự cố khi nhấp vào nút "Đặt Lại Mật Khẩu", hãy sao chép và dán URL bên dưới vào trình duyệt web của bạn:</p>
                            <p><a href="{{ $actionUrl }}" style="color: #3869d4;">{{ $actionUrl }}</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="footer">
                            <p>© 2024 Fashion - Thời trang Phong cách Việt. Bảo lưu mọi quyền.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>