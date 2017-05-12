<?php

namespace CallbackBundle\Service;


use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RequestsListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request     = $event->getRequest();
        $contentType = $request->headers->get('content-type');

        switch($contentType)
        {
            case 'application/json':
                $params = json_decode($request->getContent(),true);

                //maybe we had error in json_decode
                if($params === null)
                {
                    $errorCode = json_last_error();
                    if($errorCode !== JSON_ERROR_NONE)
                    {
                        throw new BadRequestHttpException(json_last_error_msg(),null,$errorCode);
                    }
                }

                //we have something in request
                if(is_array($params))
                {
                    $request->request->add($params); //inject parsed data to request object
                }
                break;
            //add here other content-Types handlers
        }

    }
}