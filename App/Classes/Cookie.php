<?php
namespace App\classes;

class Cookie
{
      private $path = '/';
      private $secure = false;
      private $httponly = true;
      private $samesite = 'Lax';

      public function setCookie($name, $value, $time):void
      {
            $expire = time() + $time;
            setcookie($name, $value, $expire, $this->path, null, $this->secure, $this->httponly);
            setcookie($name, $value, $expire, $this->path, null, $this->secure, $this->httponly, $this->samesite);
            setcookie($name, $value, time() + $time, $this->path);
      }

      public function getCookie($name):?string
      {
            return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
            return $_COOKIE[$name] ?? null;
      }

      public function deleteCookie($name):void
      {
            $time = time() - 3600*24*60;
            setcookie($name, '', $time, $this->path, null, $this->secure, $this->httponly);
            setcookie($name, '', $time, $this->path, null, $this->secure, $this->httponly, $this->samesite);
            unset($_COOKIE[$name]);
            $time = $this->getCookie($name);
      }
}
?>
