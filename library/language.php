<?php
session_start();

class Language {
    private static $translations = [];
    private static $currentLanguage = 'pt';
    private static $availableLanguages = ['pt', 'en'];
    
    public static function init() {
        // Detecta o idioma preferido
        self::detectLanguage();
        
        // Carrega as traduções
        self::loadTranslations();
    }
    
    private static function detectLanguage() {
        // 1. Verifica se foi definido via parâmetro GET
        if (isset($_GET['lang']) && in_array($_GET['lang'], self::$availableLanguages)) {
            self::$currentLanguage = $_GET['lang'];
            $_SESSION['language'] = $_GET['lang'];
            return;
        }
        
        // 2. Verifica se existe na sessão
        if (isset($_SESSION['language']) && in_array($_SESSION['language'], self::$availableLanguages)) {
            self::$currentLanguage = $_SESSION['language'];
            return;
        }
        
        // 3. Detecta pelo cabeçalho Accept-Language do navegador
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            if (in_array($browserLang, self::$availableLanguages)) {
                self::$currentLanguage = $browserLang;
                $_SESSION['language'] = $browserLang;
                return;
            }
        }
        
        // 4. Fallback para português
        self::$currentLanguage = 'pt';
        $_SESSION['language'] = 'pt';
    }
    
    private static function loadTranslations() {
        $languageFile = __DIR__ . '/languages/' . self::$currentLanguage . '.php';
        if (file_exists($languageFile)) {
            self::$translations = include $languageFile;
        } else {
            // Fallback para português se o arquivo não existir
            self::$translations = include __DIR__ . '/languages/pt.php';
        }
    }
    
    public static function get($key, $default = null) {
        return isset(self::$translations[$key]) ? self::$translations[$key] : ($default ?: $key);
    }
    
    public static function getCurrentLanguage() {
        return self::$currentLanguage;
    }
    
    public static function getAvailableLanguages() {
        return self::$availableLanguages;
    }
    
    public static function getLanguageName($code) {
        $names = [
            'pt' => 'Português',
            'en' => 'English'
        ];
        return isset($names[$code]) ? $names[$code] : $code;
    }
    
    public static function getLanguageFlag($code) {
        $flags = [
            'pt' => 'br', // Bandeira do Brasil para português
            'en' => 'us'  // Bandeira dos EUA para inglês
        ];
        return isset($flags[$code]) ? $flags[$code] : $code;
    }
    
    public static function getCurrentUrl($newLang = null) {
        $url = $_SERVER['REQUEST_URI'];
        $parsedUrl = parse_url($url);
        
        // Remove o parâmetro de idioma atual se existir
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

// Função helper para facilitar o uso
function __($key, $default = null) {
    return Language::get($key, $default);
}

// Inicializa o sistema de idiomas
Language::init();
