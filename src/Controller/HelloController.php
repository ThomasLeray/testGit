<?php


namespace UnivLeMans\TP\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UnivLeMans\TP\Entity\User;

class HelloController extends AbstractController
{

    public function index(Request $request, $parameters)
    {
        $name = $parameters['name'];

        $content = $this->render(__DIR__ . '/../../templates/hello/index.html.php', ['name' => $name]);

        $response = new Response($content);

        return $response;
    }
}