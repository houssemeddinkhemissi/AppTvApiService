<?php

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class DefaultController extends FOSRestController
{
    /**
     * @Rest\Post("/registerUser")
     * @return mixed
     */
    public function registerUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //$data=$request->getContent();
        $data = $request->request->all();

        $user = new User();
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);

        $user->setDateNais(new \DateTime($data['date']));

        $user->setRole('client');

        $encoder=new BCryptPasswordEncoder(13);

        $factory = $this->get('security.encoder_factory');

        $encryptedpass = $encoder->encodePassword($data['password'], "az");

        $user->setPassword($encryptedpass);


        $em->persist($user);
        $em->flush();


        $responseData = array("error" => false, "message" => "good", "user" => $user);


        return $responseData;

    }

    /**
     * @Rest\Post("/login")
     */
    public function loginAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:User')->findOneBy(array('email' => $request->get('email')));

        if(is_null($user))
        {
            $response = array("error" => true, "message" => "not existing user");
            return $response;
        }

        $encoder=new BCryptPasswordEncoder(13);

        if ($encoder->isPasswordValid($user->getPassword(), $request->get('password'), "az"))
        {

            $response = array("error" => false, "message" => "good", "user" => $user);
            return $response;
        }


        $response = array("error" => true, "message" => "bad password");
        return $response;

    }

    /**
     * @Rest\Post("/updateimage")
     */
    public function updateImageAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('email' => $request->get('email')));
        if(is_null($user))
        {
            $response = array("error" => true, "message" => "not existing user");
            return $response;
        }
        else{

            $fileName = md5(uniqid());
            file_put_contents($fileName.'.png',base64_decode($request->get('img')));
            $response = array("error" => true, "message" => $request->get('img'));
            $user->setImage($fileName.'.png');
            $em->persist($user);
            $em->flush();
            return $response;
        }

    }

    /**
     * @Rest\Post("/getimage")
     */
    public function getImageAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('email' => $request->get('email')));
        if(is_null($user))
        {
            $response = array("error" => true, "message" => "not existing user");
            return $response;
        }
        else{

            $fileName =$user->getImage();
            $response = array("error" => true, "message" => $fileName);

            return $response;
        }

    }
    /**
     * @Rest\Post("/getusername")
     */
    public function getusernameAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('email' => $request->get('email')));
        if(is_null($user))
        {
            $response = array("error" => true, "message" => "not existing user");
            return $response;
        }
        else{

            $username =$user->getUsername();
            $response = array("error" => true, "message" => $username);

            return $response;
        }

    }
    /**
     * @Rest\Post("/getdatenais")
     */
    public function getdatenaisAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('email' => $request->get('email')));
        if(is_null($user))
        {
            $response = array("error" => true, "message" => "not existing user");
            return $response;
        }
        else{

            $datenais =$user->getDatenais();
            $response = array("error" => true, "message" => $datenais);

            return $response;
        }

    }
    /**
     * @Rest\Post("/getpassword")
     */
    public function getpasswordAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('email' => $request->get('email')));
        if(is_null($user))
        {
            $response = array("error" => true, "message" => "not existing user");
            return $response;
        }
        else{

            $password =$user->getPassword();
            $response = array("error" => true, "message" => $password);

            return $response;
        }

    }
}
