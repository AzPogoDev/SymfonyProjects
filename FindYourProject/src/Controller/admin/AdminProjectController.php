<?php

namespace App\Controller\admin;

use App\Entity\ProjectsEntity;
use App\Form\ProjectType;
use App\Repository\ProjectsEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProjectController extends AbstractController
{

    /**
     * @var ProjectsEntityRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ProjectsEntityRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.project.index")
     * @return Response
     */
    public function index(): Response
    {
        $projects = $this->repository->findAll();

        return $this->render('admin/project/index.html.twig', compact('projects'));
    }

    /**
     * @Route("/admin/project/{id}", name="admin.project.edit")
     * @param ProjectsEntity $project
     * @param Request $request
     * @return Response
     */
    public function edit(ProjectsEntity $project, Request $request): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('admin.project.index');
        }

        return $this->render('admin/project/edit.html.twig', [
            'project' => $project,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/project/create", name="admin.project.create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $project = new ProjectsEntity();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($project);
            $this->em->flush();
            return $this->redirectToRoute('admin.project.index');
        }

        return $this->render('admin/project/create.html.twig', [
            'project' => $project,
            'form' => $form->createView()
        ]);
    }


}
