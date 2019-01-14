<?php


namespace UnivLeMans\TP\Controller;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use UnivLeMans\TP\Entity\User;

class UserController extends AbstractController
{
    public function index(Request $request)
    {
        $user = $this->getUser($request);
        $content = $this->render('user/login.html.php', ['user' => $user]);
        $response = new Response($content);

        return $response;
    }

    public function login(Request $request, $parameters)
    {
        $method = $request->getMethod();
        $failed = false;
        if ($method === 'POST') {
//            var_dump("test");
            $login = $request->get('login');
            $password = $request->get('password');
//            var_dump($login);
//            var_dump($password);
            $manager = $this->getUserManager();
            $user = $manager->findByLogin($login);
            if ($user) {
//                var_dump('test');
//                var_dump($user);
//                var_dump($password);
                $valid = $manager->isPasswordValid($user, $password);
                if ($valid) {

                    $session = new Session(new NativeSessionStorage(), new AttributeBag());

                    $session->set('user_id', $user->getId());
                    $session->set('user_nom', $user->getNom());
                    $session->set('user_prenom', $user->getPrenom());
                    $session->set('user_td', $user->getTd());

                    return new RedirectResponse("/accueil");
                }
            }
            $failed = true;
        }

        $content = $this->render('user/login.html.php', ['failed' => $failed]);

        return new Response($content);

    }

    public function register(Request $request, $parameters)
    {
        $user = new User();
        $method = $request->getMethod();
        $errors = [];
        $submitted = false;
        if ($method === 'POST') {
            $submitted = true;
            $login = $request->get('login');
            if ($login === null || $login === '') {
                $errors['login'] = 'Login ne doit pas être vide';
            } else {
                $user->setLogin($login);
            }

            $password = $request->get('password');
            if ($password === null || $password === '') {
                $errors['password'] = 'Le mot de passe ne doit pas être vide';
            }

            $nom = $request->get('nom');
            $prenom = $request->get('prenom');
            $idTd = $request->get('td');
        }

        if ($submitted && empty($errors)) {
            $manager = $this->getUserManager();
            $password = $manager->hashPassword($password);
            $user->setPassword($password);
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setTd($idTd);
            $manager->insert($user);

            $user = new User();
        }

        $content = $this->render(
            'user/register.html.php',
            ['user' => $user, 'errors' => $errors, 'success' => $submitted && empty($errors)]
        );

        return new Response($content);
    }

    public function logout()
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());
        $session->clear();

        return  new RedirectResponse('/');
    }
}