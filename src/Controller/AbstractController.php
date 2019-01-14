<?php

namespace UnivLeMans\TP\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\Yaml\Yaml;
use UnivLeMans\TP\Manager\EdtManager;
use UnivLeMans\TP\Manager\UserManager;

abstract class AbstractController
{
    protected function render(string $template, array $parameters = []): ?string
    {
        $templatePath = __DIR__.'/../../templates';
        $template = $templatePath . '/'. $template;

        extract($parameters);
        if (!is_file($template)) {
            throw new \RuntimeException(sprintf('Template file \'%s\' not found.', $template));
        }

        ob_start();
        include $template;

        return ob_get_clean();
    }

    /**
     * @return UserManager
     */
    protected function getUserManager()
    {
        return new UserManager($this->getConnection());
    }

    /**
     * @return EdtManager
     */
    protected function getEdtManager()
    {
        return new EdtManager($this->getConnection());
    }

    /**
     * @return \PDO
     */
    protected function getConnection()
    {
        $config = Yaml::parseFile(__DIR__.'/../../config/config.yaml');

        $dsn = sprintf('mysql:dbname=%s;host=%s', $config['config']['db_name'], $config['config']['db_host']);
        $user = $config['config']['db_user'];
        $password = $config['config']['db_password'];

        return new \PDO($dsn, $user, $password);
    }

    protected function getUser(Request $request)
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        if (!$session->has('user_id')) {
            return null;
        }

        $id = $session->get('user_id');
        $user = $this->getUserManager()->find($id);
        if (!$user) {
            $session->remove('user_id');
            throw new \Exception('User not found');
        }

        return $user;
    }
}