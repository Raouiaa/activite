<?php

namespace ReservationActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ReservationActiviteBundle:Default:index.html.twig');
    }
}
