<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }


   # /**
    #*@Route("/user/test", name="testRoleAdmin")
   # */
   # public function testRoleAdminAction(Request $request){
    	#$this->denyAccessUnlessGranted(attributes: 'ROLE_ADMIN');
        #return $this->render('movie/movie.html.twig', array('obj' => $obj));
   # }
    # /**
    #*@Route("/user/test", name="testRoleUser")
    #*/
    #public function testRoleUserAction(Request $request){
    	#$this->denyAccessUnlessGranted(attributes: 'ROLE_USER');
  #return $this->render('registration/register.html.twig', [
            #'registrationForm' => $form->createView(),
        #]);    }
}
