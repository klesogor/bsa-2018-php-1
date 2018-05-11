<?php declare(strict_types=1);

namespace Cryptocurrency\Task2;

class EmojiGenerator
{
    private static $emojis = ['🚀', '🚃', '🚄', '🚅', '🚇'];
    public function generate(): \Generator
    {
        for($i = 0;$i<count(self::$emojis);$i++)
        {
            yield self::$emojis[$i];
        }
    }
}