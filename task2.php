<?php
function validatePassword($password)
{
    echo "Проверка пароля:\n";

    $isValid = true;

    if (mb_strlen($password) < 8) {
        echo "Длина пароля: менее 8 символов.\n";
        $isValid = false;
    } else {
        echo "Длина пароля: ок.\n";
    }

    if (preg_match('/[A-ZА-Я]/u', $password)) {
        echo "Заглавные буквы: присутствуют.\n";
    } else {
        echo "Заглавные буквы: отсутствуют.\n";
        $isValid = false;
    }

    if (preg_match('/[a-zа-я]/u', $password)) {
        echo "Строчные буквы: присутствуют.\n";
    } else {
        echo "Строчные буквы: отсутствуют.\n";
        $isValid = false;
    }

    if (preg_match('/\d/u', $password)) {
        echo "Цифры: присутствуют.\n";
    } else {
        echo "Цифры: отсутствуют.\n";
        $isValid = false;
    }

    echo "Результат проверки: " . ($isValid ? "Пароль надёжен\n" : "Пароль слабый\n");
    return $isValid;
}

validatePassword("WeakPass1");
