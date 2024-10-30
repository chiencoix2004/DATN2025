<!DOCTYPE html>
<html>
<head>
    <title>{{ __('Thông báo đổi mật khẩu') }}</title>
</head>
<body>
    <h1>Xin chào {{ $user->full_name }}</h1>
    <p>{{ __('Mật khẩu của bạn đã được thay đổi thành công.') }}</p>
    <p>{{ __('Nếu bạn không thực hiện việc này, vui lòng liên hệ với chúng tôi ngay lập tức.') }}</p>
</body>
</html>