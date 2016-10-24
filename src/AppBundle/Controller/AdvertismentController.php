<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Advertisment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertismentController extends Controller
{
    /**
     * @Route("/advertisment/list", name="advertisment_list")
     */
    public function listAction(Request $request)
    {
        $user = $this->getUser();
        
        return $this->render('default/advertisment_list.html.twig', ['advertisments' => $user->getAdvertisments()]);
    }
    
    /**
     * @Route("/advertisment/create", name="advertisment_create")
     */
    public function createAction(Request $request)
    {
        $request = Request::createFromGlobals();

        if ($request->isMethod('POST')) {
            $advertisment = new Advertisment();
            $user = $this->getUser();
            $title = strval($request->request->get('title'));
            $description = strval($request->request->get('description'));

            $errors = false;
            
            if ($title == '' || $description == '') {
                $this->addFlash(
                    'error',
                    'Please do not leave empty fields!'
                );
                $errors = true;
            }
            
            if (!$errors) {
                $advertisment->setUser($user);

                $advertisment->setTitle($title);
                $advertisment->setDescription($description);
                $advertisment->setPostingDate(new \DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($advertisment);
                $em->flush();

                $this->addFlash(
                    'notice',
                    'Advertisment successfully created!'
                );

                return new RedirectResponse($this->generateUrl('homepage'));
            }
            
            return $this->render(
                'default/create_advertisment.html.twig',
                ['title' => $title, 'description' => $description]
            );
        } else {
            return $this->render('default/create_advertisment.html.twig');
        }
    }
}
