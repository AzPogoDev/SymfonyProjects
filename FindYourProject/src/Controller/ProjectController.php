<?php

namespace App\Controller;

use App\Entity\ProjectsEntity;
use App\Repository\ProjectsEntityRepository;
use phpDocumentor\Reflection\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
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
     * @Route("/project", name="project")
     */

    public function index(): Response
    {

        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

    /**
     * @Route ("/projects/{slug}/{id}", name="project.show")
     * @return Response
     */
    public function show($slug, $id): Response
    {
        $project = $this->repository->find($id);

        return $this->render('project/index.html.twig', [

            'project'=> $project,
            'current_menu' => 'projects'

        ]);
    }
}
