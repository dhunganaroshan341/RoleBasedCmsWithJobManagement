<?php

namespace App\Services;

class GreetingService
{
    public function getGreeting(): string
    {
        return 'Welcome back';
    }

    public function getEmoji(): string
    {
        return '👋';
    }

    public function getTagline(): string
    {
        return 'Here’s what’s happening in your system today';
    }

    public function getInternationalLine(): string
    {
        return 'Hello • Hola • Bonjour • 你好 • नमस्ते';
    }
}
