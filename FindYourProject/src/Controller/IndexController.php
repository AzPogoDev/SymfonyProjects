<?php

namespace App\Controller;

use App\Repository\ProjectsEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    /**
     * @var ProjectsEntityRepository
     */
    private $repository;

    public function __construct(ProjectsEntityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $projects = $this->repository->findAll();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'projects'=> $projects
        ]);
    }
}
