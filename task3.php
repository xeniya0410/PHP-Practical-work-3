<?php
function analyzeLogForEmails($logText)
{
    preg_match_all('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/iu', $logText, $matches);

    $emails = $matches[0];
    $count = count($emails);

    echo "Найденные email-адреса:\n";
    echo "------------------------\n";
    foreach ($emails as $i => $email) {
        echo ($i + 1) . ". $email\n";
    }
    echo "------------------------\n";

    return $count;
}

$logs = "[2023-11-15 09:23:45] ERROR: Login failed for user john.doe@example.com
[2023-11-15 09:24:12] SUCCESS: User admin@company.org logged in successfully
[2023-11-15 09:25:33] WARNING: Password reset requested for alice.smith@gmail.com";

echo "Количество: " . analyzeLogForEmails($logs);
