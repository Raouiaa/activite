<?php

namespace ActivityBundle\Controller;

use ActivityBundle\Entity\Activity;
use ActivityBundle\Form\ActivityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ActivityController extends Controller
{
    public function readAction()
    {
        $activity=$this->getDoctrine()->getRepository(Activity::class)->findAll();
        return $this->render('@Activity/Activity/read.html.twig', array(
        'activity'=>$activity
        ));

    }
    public function createAction(Request $request)
    {
        //1.préparation de l'objet vide
        $activity=new Activity();
        //2.préparation du form
        $form=$this->createForm(ActivityType::class,$activity);
        //3.sauvegarde dans la base des données
        $form=$form->handleRequest($request);
        if($form->isValid()){
            //4.cnx avec la base des données
            $em=$this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();
            return $this->redirectToRoute('read_activity');
        }
        return $this->render('@Activity/Activity/create.html.twig', array(
           'form'=>$form->createView()
        ));

    }
    public function updateAction($idActivite,Request $request)
    {
        //1.cnx avec la base des données
        $em=$this->getDoctrine()->getManager();
        //2.charger l'objet à partir de la base des données
        $activity=$em->getRepository(Activity::class)->find($idActivite);
        //3.creation de la formulaire
        $form=$this->createForm(ActivityType::class,$activity);
        //4.ajout dans la base des données
        $form=$form->handleRequest($request);
        if ($form->isValid()){
            $em->flush();
            return$this->redirectToRoute('read_activity');
        }
        return $this->render('@Activity/Activity/update.html.twig',array(
            'form'=>$form->createView()
        ));
    }
    public function deleteAction($idActivite)
    {
        //1.cnx avec la base des données
        $em=$this->getDoctrine()->getManager();
        //2.ORM->Base des données
        $activity=$em->getRepository(Activity::class)->find($idActivite);
        //3.suppresision  à partir de la base des données
        $em->remove($activity);
        //4.push current output all the way to the browser with a few caveats.
        $em->flush();
        return $this->redirectToRoute('read_activity');

    }
}
