<?php


namespace UnivLeMans\TP\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{

    public function index(Request $request)
    {
        $user = $this->getUser($request);
        $content = $this->render('index.html.php', ['user' => $user]);
        $response = new Response($content);

        return $response;
    }
}