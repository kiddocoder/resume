<?php
namespace App\classes;

class Cookie
{
    private $path = '/';
    private $secure = false;
    private $httponly = true;
    private $samesite = 'Lax';

    /**
     * Définit un cookie.
     *
     * @param string $name Le nom du cookie
     * @param string $value La valeur du cookie
     * @param int $time La durée de vie du cookie en secondes
     * @param string $samesite La politique SameSite du cookie
     * @return void
     */
    public function setCookie($name, $value, $time): void
    {
        $expire = time() + $time;

        // Appel à setcookie
        setcookie($name, $value, $expire);
    }

    /**
     * Récupère la valeur d'un cookie.
     *
     * @param string $name Le nom du cookie
     * @return string|null La valeur du cookie ou null si non défini
     */
    public function getCookie($name): ?string
    {
        return $_COOKIE[$name] ?? null; // Utilisation de l'opérateur null coalescent
    }

    /**
     * Supprime un cookie.
     *
     * @param string $name Le nom du cookie à supprimer
     * @return void
     */
    public function deleteCookie($name): void
    {
        $expire = time() - 3600; // Expire le cookie en le définissant dans le passé
        setcookie($name, '', $expire);

        // Suppression de la variable de cookie de la superglobale
        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
        }
    }
}
?>