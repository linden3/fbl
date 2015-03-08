<?php
namespace Fbl\App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerController
{
    public function registerPlayerAction(Request $request)
    {
        var_dump($request->request->get('foo')); die;
        return new Response();
    }
}
