<?php

namespace App\Controller;

use App\Entity\Citoyen;
use App\Entity\Health;
use App\Entity\MedicalFile;
use App\Form\HealthType;
use App\Form\MedicalFileType;
use App\Repository\CitoyenRepository;
use App\Repository\HealthRepository;
use App\Repository\MedicalFileRepository;
use App\Repository\UserRepository;
use App\Repository\VehicleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmsController extends AbstractController
{

    #[Route('/effectif_ems', name: 'app_effectif_ems')]
    public function effectif_ems(CitoyenRepository $citoyenRepository, Request $request): Response
    {
        $effectif = $citoyenRepository->findBy(['groupjobs' => '3']);

        return $this->render('ems/effectif.html.twig', [
            "effectif"=>$effectif
        ]);
    }

    #[Route('/patient', name: 'app_patient')]
    public function patient(CitoyenRepository $citoyenRepository, PaginatorInterface $paginator, Request $request):Response
    {
        $data = $citoyenRepository->findAlpha();

        $citoyen = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 15
        );

        return $this->render('ems/patient.html.twig', [
            "citoyens"=> $citoyen
        ]);
    }

    #[Route('/detail_patient{id}', name: 'app_detail_patient')]
    public function detail_patient(int $id, CitoyenRepository $citoyenRepository, HealthRepository $healthRepository):Response
    {
        $citoyen = $citoyenRepository->find($id);
        $health = $healthRepository->find($id);


        return $this->render('ems/detail_patient.html.twig', [
            "citoyen" => $citoyen,
            "health"=>  $health
        ]);
    }

    #[Route('/ajout_info{id}', name: 'app_add_info')]
    public function add_info(Citoyen $citoyen, Request $request, ManagerRegistry $managerRegistry)
    {
        $health = new Health();
        $healthForm = $this->createForm(HealthType::class, $health);

        $healthForm->handleRequest($request);

        if ($healthForm->isSubmitted()  ){
            $em =$managerRegistry->getManager();
            $health->setCitoyen($citoyen);
            $em->persist($health);
            $em->flush();

            $this->addFlash('success', 'Information ajouté !');
            return $this->redirectToRoute('app_detail_patient',['id'=>$citoyen->getId()]);
        }

        return $this->render('ems/ajout_information.html.twig', [
            'healthForm'=>$healthForm->createView()
        ]);
    }

    #[Route('/dossier_medical', name: 'app_medical_file')]
    public function medical_file(MedicalFileRepository $medicalFileRepository, Request $request, PaginatorInterface $paginator):Response
    {
        $data = $medicalFileRepository->findBy([],['date'=> 'DESC']);

        $file = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 3
        );

        return $this->render('ems/dossier_medical.html.twig', [
            "files"=>$file
        ]);
    }

    #[Route('/detail_dossier_medical{id}', name: 'app_detail_medical_file')]
    public function detail_medical_file(int $id, CitoyenRepository $citoyenRepository,MedicalFileRepository $medicalFileRepository): Response
    {
        $citoyen = $citoyenRepository->find($id);
        $medic = $medicalFileRepository->find($id);

        return $this->render('ems/detail_dossier_medical.html.twig', [
            'citoyen' => $citoyen,
            'medic' => $medic
        ]);
    }

    #[Route('/intervention', name: 'app_intervention')]
    public function intervention(Request $request, ManagerRegistry $managerRegistry)
    {
        $medicalFile = new MedicalFile();
        $medicalFileForm = $this->createForm(MedicalFileType::class, $medicalFile);

        $medicalFileForm->handleRequest($request);

        if ($medicalFileForm->isSubmitted() && $medicalFileForm->isValid()){
            $em = $managerRegistry->getManager();
            $em->persist($medicalFile);
            $em->flush();

            $this->addFlash('success', 'intervention enregistré !');
            return $this->redirectToRoute('app_medical_file');
        }
        return $this->render('ems/intervention.html.twig', [
            'medicalFileForm'=>$medicalFileForm->createView()
        ]);
    }

    #[Route('/ppa_ems', name: 'app_ppa_ems')]
    public function ppa_ems()
    {

        return $this->render('ems/ppa_ems.html.twig');
    }

    #[Route('/vehicule_ems', name: 'app_vehicle_ems')]
    public function vehicle_ems(VehicleRepository $vehicleRepository, PaginatorInterface $paginator, Request $request):Response
    {
        $data = $vehicleRepository->findBy(['service'=>'ems']);

        $vehicle = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 15
        );

        return $this->render('ems/vehicule.html.twig', [
            "vehicles"=> $vehicle
        ]);
    }

    #[Route('/detail_vehicule_ems{id}', name: 'app_detail_vehicle_ems')]
    public function detail_vehicle_ems(int $id, VehicleRepository $vehicleRepository):Response
    {
        $vehicle = $vehicleRepository->find($id);

        return $this->render('ems/detail_vehicule.html.twig',[
            "vehicle" => $vehicle
        ]);
    }
}
