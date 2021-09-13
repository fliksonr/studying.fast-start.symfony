<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    /**
     * @return Response
     * @var Route
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        $greeting = '';
        if ($name = $request->query->get('hello')) {
            $greeting = sprintf('<h1>Hello, %s!</h1>', htmlspecialchars($name));
        }
//        return $this->render('conference/index.html.twig', [
//            'controller_name' => 'ConferenceController',
//        ]);
        return new Response(
            <<<EOF
    <html>
        <body>
            $greeting
            <img src="/images/bmstu.png"/>
        </body>
    </html>
EOF
        );
    }

    /**
     * @param string $name
     * @return Response
     * @Route("/hello/{name}", name="ItsMeMario")
     */
    public function name(string $name = '')
    {
        $greeting = '<h1>Who are you?</h1>';
        if ($name) {
            $greeting = sprintf('<h1>Oh, %s, it\'s you!</h1>', htmlspecialchars($name));
        }
        return new Response(
            <<<EOF
    <html>
        <body>
            $greeting
        </body>
    </html>
EOF
        );
    }
}
