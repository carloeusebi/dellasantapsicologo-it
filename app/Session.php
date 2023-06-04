<?php

namespace app;

class Session
{

    protected const FLASH = 'flash_messages';

    public function __construct()
    {
        session_set_cookie_params(3600);

        session_start();

        $flashMessages = $_SESSION[self::FLASH] ??  [];

        foreach ($flashMessages as $key => &$flashMessage) {
            $flashMessage['remove'] = true;
        }

        $_SESSION[self::FLASH] = $flashMessages;
    }


    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }


    public function getFlash($key)
    {
        return $_SESSION[self::FLASH][$key]['value'] ?? false;
    }


    public function remove($key)
    {

        unset($_SESSION[self::FLASH][$key]);
    }


    public function __destruct()
    {
        $this->removeFlashMessages();
    }


    private function removeFlashMessages()
    {

        $flashMessages = $_SESSION[self::FLASH] ?? [];

        foreach ($flashMessages as $key => $flashMessage) {

            if ($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }

        $_SESSION[self::FLASH] = $flashMessages;
    }
}
