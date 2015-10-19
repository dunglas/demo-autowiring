<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DefaultController extends Controller
{
    /**
     * @Route("/tweet")
     * @Method("POST")
     */
    public function tweetAction(Request $request)
    {
        return $this->tweet($request, 'twitter_client');
    }

    /**
     * @Route("/tweet-uppercase")
     * @Method("POST")
     */
    public function tweetUppercaseAction(Request $request)
    {
        return $this->tweet($request, 'uppercase_twitter_client');
    }

    private function tweet(Request $request, $service)
    {
        $user = $request->request->get('user');
        $key = $request->request->get('key');
        $status = $request->request->get('status');

        if (!$user || !$key || !$status) {
            throw new BadRequestHttpException();
        }

        $this->get($service)->tweetInRot13($user, $key, $status);

        return new Response('OK');
    }
}
