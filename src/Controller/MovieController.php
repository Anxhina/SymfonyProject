<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MovieController extends AbstractController
{
     /**
     * @Route("movie", name="home")
     */
    public function index()
    {
        //require_once dirname(__FILE__).'/../API/Popular.php';  http://www.omdbapi.com/?i=tt3896198&apikey=e42185e
          $someJSON = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=5e3035407d08540e15d0937a745730cb&language=en-US");

  // Convert JSON string to Array
            $someArray = json_decode($someJSON, true);
       
       
        return $this->render('movie/index.html.twig', array('someArray' => $someArray));
    }

      /**
     * @Route("/movie/{id}", name="show_movie")
     * @Method({"GET"})
     */
       public function show($id)
    {
        //$id = $_GET['id'];
        $json = file_get_contents('https://api.themoviedb.org/3/movie/'. $id .'?api_key=5e3035407d08540e15d0937a745730cb&language=en-US');
        $obj = json_decode($json);
        //print_r($obj);
        return $this->render('movie/movie.html.twig', array('obj' => $obj));
    }

        /**
    *   @Route("/search", name="search")
  
     * @Method({"GET"})
     */
       public function search(Request $request)
    {
        $searchstr = $request->get('search');
        //$id = $_GET['id'];
        $jsonn = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key=842b55a754f9290a41da057d07defd85&language=en-US&query='.$searchstr.'&page=1&include_adult=false');
        $objj = json_decode($jsonn);
        //print_r($objj);
        //print_r($obj);
        return $this->render('movie/search.html.twig', array('objj' => $objj));
    }}
