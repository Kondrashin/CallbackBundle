<?php

namespace CallbackBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CallbackBundle\Entity\Task;
use CallbackBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/getform", name="callback_getform")
     */
    public function getformAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task, array(
            'method' => 'POST',
            'attr' => ['ng-submit'=>'submitForm()']
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
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task, array(
            'method' => 'POST',
            'attr' => ['ng-submit'=>'submitForm()']
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sendtask = $this->get('sendtask');
            $sendtask->sendMessage($task);

            $dbtask = $this->get('dbtask');
            $dbtask->insertMessage($task);
        }
        $data               = file_get_contents("php://input");
        $dataJsonDecode     = json_decode($data);
        $message            = $dataJsonDecode->name;
        return new JsonResponse(array('name'=>$task->getName()));
    }
}