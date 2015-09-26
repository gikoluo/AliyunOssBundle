<?php

namespace Giko\AliyunOssBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GikoAliyunOssBundle:Default:index.html.twig', array('name' => $name));
    }
}
