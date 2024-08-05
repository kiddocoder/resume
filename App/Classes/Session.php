<?php
namespace App\classes;

class Session {

      public function setSession($name, $value): void {
            if(!isset($_SESSION)) {
                  session_start();
            }
            $_SESSION[$name] = $value;
      }

      public function getSession($name): ?string {
            if(!isset($_SESSION)) {
                  session_start();
            }
            return $_SESSION[$name] ?? null;
      }

      public function checkSession(): bool {
            return session_status() === PHP_SESSION_ACTIVE ? true : false;
      }

      public function startSession(): void {
            if(!$this->checkSession()) {
                  session_start();
            }
      }

      public function closeSession(): void {
            session_destroy();
      }
}
