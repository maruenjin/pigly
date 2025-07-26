<?php

return [
    'required' => ':attribute を入力してください',
    'email'    => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
    'numeric'  => ':attribute は数字で入力してください',
    'max'      => [
        'numeric' => ':attribute は :max 以下で入力してください',
        'string'  => ':attribute は :max 文字以内で入力してください',
    ],
    'min'      => [
        'numeric' => ':attribute は :min 以上で入力してください',
    ],
    'attributes' => [
        'email'    => 'メールアドレス',
        'password' => 'パスワード',
    ],
];


