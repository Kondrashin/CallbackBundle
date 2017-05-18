<?php
namespace Kondrashin\CallbackBundle\Twig;

class CallbackExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('callbackbutton', [$this, 'printCallbackButton'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ])
        ];
    }

    /**
     * @return
     */
    public function printCallbackButton(\Twig_Environment $environment)
    {
        return $environment->render('CallbackBundle:default:button.html.twig');
    }
}