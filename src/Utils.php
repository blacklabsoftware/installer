<?php

namespace Blacklab\LaravelUp\Console;

class Utils
{

    public static function getStandardPath()
    {
        $user = posix_getpwuid(posix_getuid());
        return $user['dir'].DIRECTORY_SEPARATOR."laravel-up.json";
    }
    
    public static function doesPresetFileExist()
    {
        return file_exists(static::getStandardPath());
    }

    public static function createPresetFile()
    {
        $path = static::getStandardPath();
        $file = fopen($path, 'w+');
        
        $stubContents = file_get_contents(implode(DIRECTORY_SEPARATOR, [
            __DIR__,
            '..',
            'stubs',
            'laravel-up.json.stub'
        ]));
        
        fwrite($file, $stubContents);
        fclose($file);
    }

    /**
     * Validates a preset to ensure it only includes the correct keys.
     *
     * @return void
     */
    public static function validatePreset()
    {
        
    }
}
