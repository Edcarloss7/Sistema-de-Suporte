<?php
namespace App\Utility\PasswordHasher;

use Authentication\PasswordHasher\AbstractPasswordHasher;

class DefaultPasswordHasher extends AbstractPasswordHasher
{
    public function hash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function check(string $password, string $hashedPassword): bool
    {
        return password_verify($password, $hashedPassword);
    }
}