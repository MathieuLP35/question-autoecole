<?php
namespace Core;
use Symfony\Component\Yaml\Yaml;

class Config {
    private static array $configs = [];

    public static function get (string $fileName) {
        $config = self::hasConfig($fileName);
        if ($config) {
            return $config;
        } else {
            return self::loadConfig($fileName);
        }
    }

    private static function hasConfig (string $config) {
        if (isset(self::$configs[$config])) {
            return self::$configs[$config];
        }
        return false;
    }
    private static function loadConfig (string $config) {
        $path = APP_DIR."/configs/$config.yml";
        if (is_file($path)) {
            $conf = Yaml::parseFile($path);
            self::$configs[$config] = $conf;
            return $conf;
        }
        return false;
    }
}