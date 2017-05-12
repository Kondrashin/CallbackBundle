<?php

namespace CallbackBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CallbackBundle\Entity\Callback;
use CallbackBundle\Form\CallbackType;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/getform", name="callback_getform")
     */
    public function getformAction(Request $request)
    {
        $task = new Callback();
        $form = $this->createForm(CallbackType::class, $task, array(
            'method' => 'POST',
            'attr' => ['ng-submit' => 'submitForm()']
        ));

        return $this->render('@Callback/default/form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/sendform", name="callback_sendform")
     */
    public function sendformAction(Request $request)
    {
        $task = new Callback();
        $form = $this->createForm(CallbackType::class, $task, array(
            'method' => 'POST',
            'attr' => ['ng-submit' => 'submitForm()']
        ));
        $form->submit($request->request->all());
        if ($form->isSubmitted() && $form->isValid()) {
            $sendtask = $this->get('sendmail');
            $sendtask->sendMessage($task);

            $dbtask = $this->get('callbackmanager');
            $dbtask->insertMessage($task);
            return new JsonResponse(array(
                'success' => true));
        } else {
            $formErrors = $this->get('formerrors')->getArray($form);
            return new JsonResponse(array(
                'success' => false,
                'submitted' => $form->isSubmitted(),
                'valid' => $form->isValid(),
                'errors' => $formErrors));
        }
        //return new JsonResponse(array('name'=>$task->getEmail(), 'valid'=>$valid, 'submitted'=>$submitted));
    }
}