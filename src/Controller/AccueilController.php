<?php
/**
 * Created by PhpStorm.
 * User: i181561
 * Date: 02/10/2018
 * Time: 13:54
 */

namespace UnivLeMans\TP\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

class AccueilController extends AbstractController
{
    public function index(Request $request, $parameters)
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $userid = $session->get('user_id');
        $usernom = $session->get('user_nom');
        $userprenom = $session->get('user_prenom');
        $usertd = $session->get('user_td');

        $content = $this->render('accueil/index.html.php', ['userid' => $userid, 'usernom' => $usernom, 'userprenom' => $userprenom, 'usertd' => $usertd]);

        $response = new Response($content);

        return $response;
    }
}