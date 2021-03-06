<?php

namespace HieuLe\Favicon;

/**
 * Description of Config
 *
 * @author Hieu Le <letrunghieu.cse09@gmail.com>
 */
class Config
{

    /**
     * All available sizes
     *
     * @var array 
     */
    private static $_sizes        = array(
        'favicon-16x16.png'            => 16,
        'favicon-32x32.png'            => 32,
        'favicon-96x96.png'            => 96,
        'android-chrome-36x36.png'     => 36,
        'android-chrome-48x48.png'     => 48,
        'android-chrome-72x72.png'     => 72,
        'android-chrome-96x96.png'     => 96,
        'android-chrome-144x144.png'   => 144,
        'android-chrome-192x192.png'   => 192,
        'mstile-70x70.png'             => 70,
        'mstile-144x144.png'           => 144,
        'mstile-150x150.png'           => 150,
        'mstile-310x310.png'           => 310,
        'mstile-310x150.png'           => array(310, 150),
        'apple-touch-icon.png'         => 57,
        'apple-touch-icon-57x57.png'   => 57,
        'apple-touch-icon-60x60.png'   => 60,
        'apple-touch-icon-72x72.png'   => 72,
        'apple-touch-icon-76x76.png'   => 76,
        'apple-touch-icon-114x114.png' => 114,
        'apple-touch-icon-120x120.png' => 120,
        'apple-touch-icon-152x152.png' => 152,
        'apple-touch-icon-180x180.png' => 180,
    );
    private static $_tileSettings = array(
        'mstile-70x70.png'   => array(
            'w'    => 126,
            'h'    => 126,
            'icon' => 100,
            'top'  => 13,
            'left' => 13,
        ),
        'mstile-150x150.png' => array(
            'w'    => 270,
            'h'    => 270,
            'icon' => 124,
            'top'  => 73,
            'left' => 50,
        ),
        'mstile-310x310.png' => array(
            'w'    => 558,
            'h'    => 558,
            'icon' => 260,
            'top'  => 149,
            'left' => 128,
        ),
        'mstile-310x150.png' => array(
            'w'    => 558,
            'h'    => 270,
            'icon' => 130,
            'top'  => 214,
            'left' => 45,
        ),
    );

    /**
     * Return sizes from options
     * 
     * @param bool $noOldApple exclude old Apple touch image sizes
     * @param bool $noAndroid exclude manifest.json file and images for Androids
     * @param bool $noMs exclude images for Windows and IE11 
     * @return array
     */
    public static function getSizes($noOldApple = false, $noAndroid = false, $noMs = false)
    {
        $result = array_merge(self::$_sizes, array());
        if ($noOldApple)
        {
            unset($result['apple-touch-icon-57x57.png']);
            unset($result['apple-touch-icon-60x60.png']);
            unset($result['apple-touch-icon-72x72.png']);
            unset($result['apple-touch-icon-114x114.png']);
        }
        if ($noAndroid)
        {
            unset($result['android-chrome-36x36.png']);
            unset($result['android-chrome-48x48.png']);
            unset($result['android-chrome-72x72.png']);
            unset($result['android-chrome-96x96.png']);
            unset($result['android-chrome-144x144.png']);
        }
        if ($noMs)
        {
            unset($result['mstile-70x70.png']);
            unset($result['mstile-144x144.png']);
            unset($result['mstile-150x150.png']);
            unset($result['mstile-310x310.png']);
            unset($result['mstile-310x150.png']);
        }
        return $result;
    }

    /**
     * Get the settings for Windows tile image size
     * 
     * @param type $name
     * @return array
     * @throws \RuntimeException
     */
    public static function getTileSettings($name)
    {
        if (!isset(self::$_tileSettings[$name]))
        {
            throw new \RuntimeException('Invalid image name');
        }
        return self::$_tileSettings[$name];
    }

}
