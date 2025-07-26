<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/weight.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <header class="header">
        <div class="header-left">
            <h1 class="logo">PiGLy</h1>
        </div>
        <div class="header-right">
            <a href="{{ route('weight_target.edit') }}" class="btn btn-gray">目標体重設定</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-red">ログアウト</button>
            </form>
        </div>
    </header>

    <main class="main-container">
        @yield('content')
    </main>
</body>
</html>

