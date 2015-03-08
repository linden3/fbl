<?php
namespace Fbl\App\Application;

use Fbl\App\Request\ContentType;
use LogicException;
use Silex\Application as SilexApplication;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class JsonApplication
 */
class IdentityApi
{
    /**
     * @var SilexApplication
     */
    private $app;

    /**
     * @param SilexApplication $app
     */
    function __construct(SilexApplication $app)
    {
        $this->app = $app;
    }

    public function run()
    {
        $request = Request::createFromGlobals();

        $contentType = ContentType::fromString($request->headers->get('Content-Type'));
        if (! $contentType->isJson()) {
            throw new LogicException("Only accepts JSON input");
        }

        $request->request->replace(json_decode($request->getContent(), true));

        $this->app->run($request);
    }
}
