<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Emisson;
use AppBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class EmissionController extends FOSRestController
{
    /**
     * @Rest\Post("/addEmission")
     * @return mixed
     */
    public function addEmissionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //$data=$request->getContent();
        $data = $request->request->all();


        $emission = new Emisson();
        $emission->setIdemisson($data['idEmission']);
        //$emission->setChaine($data['chaine']);
        $emission->setCategorie($data['categorie']);
        $emission->setDescription($data['description']);
        $emission->setImage($data['image']);
        $emission->setNom($data['nom']);
        $emission->setTemps($data['temps']);
        $emission->setTempsAjout(new \DateTime());

        //  $chaine = $em->getRepository('AppBundle:Chaine')->findBy($data['chaine']);
        $chaine = $em->getRepository('AppBundle:Chaine')->findOneBy(array('nom' => $data['nomchaine']));
        $emission->setChaine($chaine);


        $exists = $em->getRepository('AppBundle:Emisson')->findBy(array(
            'nom' => $emission->getNom(),
            'image' => $emission->getImage(),
            'description' => $emission->getDescription(),
            'categorie' => $emission->getCategorie(),
            'temps' => $emission->getTemps(),
            'chaine' => $emission->getChaine()
        ));

        if(!$exists) {
            $em->persist($emission);
            $em->flush();
        }




        $responseData = array("error" => false, "message" => "good", "user" => $emission);


        return $responseData;

    }

    /**
     * @Rest\GET("/SelectEmissions")
     */
    public function getAllEmissionsAction() {
        $emissions = $this->getDoctrine()
            ->getRepository('AppBundle:Emisson')
            ->findAll();

        $emissions = $this->get('serializer')->serialize($emissions, 'json');

        $response = new Response($emissions);

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }



    /**
     * @Rest\Post("/SelectEmission")
     */
    public function getEmissionsAction(Request $request) {
        $emissions = $this->getDoctrine()
            ->getRepository('AppBundle:Emisson')
            ->findBy(array('idemisson' => $request->get('id')));

        $emissions = $this->get('serializer')->serialize($emissions, 'json');

        $response = new Response($emissions);

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }



    /**
     * @Rest\Post("/SelectEmissionByChaine")
     */
    public function getEmissionsByChainesAction(Request $request) {

        // $em = $this->getDoctrine()->getManager();
        //$data = $request->request->all();


        $chaine = $this->getDoctrine()
            ->getRepository('AppBundle:Chaine')
            ->findOneBy(array('nom' => $request->get('nom')));



        $ch = $chaine->getIdchaine();
        $emissions = $this->getDoctrine()
            ->getRepository('AppBundle:Emisson')
            ->findBy(array('chaine' => $ch));

        $emissions = $this->get('serializer')->serialize($emissions, 'json');

        $response = new Response($emissions);

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }



}
