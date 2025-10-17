<?php
session_start();

/**
 * Language Class
 * 
 * Manages the website's internationalization system, handling language detection,
 * translation loading, and language switching functionality.
 */
class Language {
    /** @var array Stores the loaded translations */
    private static $translations = [];
    
    /** @var string Current active language code */
    private static $currentLanguage = 'pt';
    
    /** @var array List of available language codes */
    private static $availableLanguages = ['pt', 'en'];
    
    /** @var array Configuration settings for the language system */
    private static $config = [];
    
    /**
     * Initializes the language system
     * 
     * Performs the following steps:
     * 1. Loads configuration settings
     * 2. Detects preferred language
     * 3. Loads translations for the detected language
     */
    public static function init() {
        self::loadConfig();
        self::detectLanguage();
        self::loadTranslations();
    }
    
    /**
     * Loads language configuration from config file
     * 
     * Reads the configuration file and sets up:
     * - Language settings
     * - Default language
     * - Available languages list
     */
    private static function loadConfig() {
        $configFile = __DIR__ . '/config.php';
        if (file_exists($configFile)) {
            $config = include $configFile;
            if (isset($config['language'])) {
                self::$config = $config['language'];
                self::$currentLanguage = self::$config['default_language'] ?? 'pt';
                self::$availableLanguages = self::$config['available_languages'] ?? ['pt', 'en'];
            }
        }
    }
    
    /**
     * Detects the preferred language based on various factors
     * 
     * Detection priority:
     * 1. URL parameter 'lang'
     * 2. Session stored language (if enabled)
     * 3. Browser's Accept-Language header (if enabled)
     * 4. Default configured language
     */
    private static function detectLanguage() {
        // 1. Check if defined via GET parameter
        if (isset($_GET['lang']) && in_array($_GET['lang'], self::$availableLanguages)) {
            self::$currentLanguage = $_GET['lang'];
            if (self::$config['store_in_session'] ?? true) {
                $_SESSION['language'] = $_GET['lang'];
            }
            return;
        }
        
        // 2. Check if exists in session (if enabled)
        if ((self::$config['store_in_session'] ?? true) && 
            isset($_SESSION['language']) && 
            in_array($_SESSION['language'], self::$availableLanguages)) {
            self::$currentLanguage = $_SESSION['language'];
            return;
        }
        
        // 3. Detect from browser's Accept-Language header (if enabled)
        if ((self::$config['auto_detect_browser_language'] ?? true) && 
            isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            if (in_array($browserLang, self::$availableLanguages)) {
                self::$currentLanguage = $browserLang;
                if (self::$config['store_in_session'] ?? true) {
                    $_SESSION['language'] = $browserLang;
                }
                return;
            }
        }
        
        // 4. Fallback to configured default language
        $defaultLang = self::$config['default_language'] ?? 'pt';
        self::$currentLanguage = $defaultLang;
        if (self::$config['store_in_session'] ?? true) {
            $_SESSION['language'] = $defaultLang;
        }
    }
    
    /**
     * Loads translation files for the current language
     * 
     * Attempts to load translations in the following order:
     * 1. Current language file
     * 2. Default language file (if current language file doesn't exist)
     * 3. Portuguese file as final fallback
     */
    private static function loadTranslations() {
        $languageFile = __DIR__ . '/languages/' . self::$currentLanguage . '.php';
        if (file_exists($languageFile)) {
            self::$translations = include $languageFile;
        } else {
            // Fallback to configured default language if file doesn't exist
            $defaultLang = self::$config['default_language'] ?? 'pt';
            $defaultFile = __DIR__ . '/languages/' . $defaultLang . '.php';
            if (file_exists($defaultFile)) {
                self::$translations = include $defaultFile;
            } else {
                // Final fallback to Portuguese
                self::$translations = include __DIR__ . '/languages/pt.php';
            }
        }
    }
    
    /**
     * Gets a translation by its key
     * 
     * @param string $key Translation key to look up
     * @param string|null $default Default value if key is not found
     * @return string Translation text or default/key if not found
     */
    public static function get($key, $default = null) {
        return isset(self::$translations[$key]) ? self::$translations[$key] : ($default ?: $key);
    }
    
    /**
     * Returns the current active language code
     * 
     * @return string Two-letter language code (e.g., 'pt', 'en')
     */
    public static function getCurrentLanguage() {
        return self::$currentLanguage;
    }
    
    /**
     * Returns list of available language codes
     * 
     * @return array List of two-letter language codes
     */
    public static function getAvailableLanguages() {
        return self::$availableLanguages;
    }
    
    /**
     * Gets the human-readable name of a language by its code
     * 
     * @param string $code Two-letter language code
     * @return string Language name in its native form
     */
    public static function getLanguageName($code) {
        $names = [
            'pt' => 'Português',
            'en' => 'English'
        ];
        return isset($names[$code]) ? $names[$code] : $code;
    }
    
    /**
     * Gets the flag code for a language
     * 
     * Maps language codes to country flag codes:
     * - Portuguese -> Brazilian flag
     * - English -> US flag
     * 
     * @param string $code Two-letter language code
     * @return string Two-letter country code for flag
     */
    public static function getLanguageFlag($code) {
        $flags = [
            'pt' => 'br', // Brazilian flag for Portuguese
            'en' => 'us'  // US flag for English
        ];
        return isset($flags[$code]) ? $flags[$code] : $code;
    }
    
    /**
     * Gets the current URL with optional language parameter
     * 
     * Rebuilds the current URL, optionally adding or updating
     * the language parameter while preserving other query parameters
     * 
     * @param string|null $newLang Optional new language code to add to URL
     * @return string Modified URL with or without language parameter
     */
    public static function getCurrentUrl($newLang = null) {
        $url = $_SERVER['REQUEST_URI'];
        $parsedUrl = parse_url($url);
        
        // Remove existing language parameter if present
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            unset($queryParams['lang']);
            
            if ($newLang) {
                $queryParams['lang'] = $newLang;
            }
            
            $newQuery = http_build_query($queryParams);
            $url = $parsedUrl['path'] . ($newQuery ? '?' . $newQuery : '');
        } else {
            if ($newLang) {
                $url .= '?lang=' . $newLang;
            }
        }
        
        return $url;
    }
}

/**
 * Helper function for easier translation lookup
 * 
 * @param string $key Translation key to look up
 * @param string|null $default Default value if key is not found
 * @return string Translation text or default/key if not found
 */
function __($key, $default = null) {
    return Language::get($key, $default);
}

// Initialize the language system
Language::init();
