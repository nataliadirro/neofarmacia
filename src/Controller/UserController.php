<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
    /**
     * @Route("/api/users", name="getUser", methods={"GET","HEAD"})
    * @return \Symfony\Component\HttpFoundation\JsonResponse
    */
    public function getAll() : Response
    {
        $users = [
            [
                'dni' => '05255883W',
                'name' => 'Yorumi', 'lastname' => 'Apellido1'
            ],
            [
                'dni' => '00001156R',  'name' => 'Camila Terry', 'name' => 'Olususi Oluyemi', 'lastname' => 'Apellidos 2'
            ]
        ];
        // $response = new Response(
        //     'Content',
        //     Response::, HTTP_NOT_FOUND
        //     ['content-type' => 'text/html']
        // );

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent(json_encode($users));
        return $response;
    }


    /**
     * @Route("/api/user", name="addUser", methods={"POST"})
       * @return \Symfony\Component\HttpFoundation\JsonResponse
       */
    public function add(Request $request) : Response
    {
        $em = $this->getDoctrine()->getManager();
        // $query = $em->createQuery("SELECT name from User::class");
        // var_dump($query->getResult());die;

        $user = new User();
        $user->setDni('05255883W');
        $user->setName('Yorumi');
        $user->setLastname('Apellido1');
        $em->persist($user);
        $em->flush();


        //aqui se modifica en el lenguaje de cliente y se monta

        return new Response('Saved the new user ');
    }
}
