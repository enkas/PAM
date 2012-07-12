<?php

namespace Pam\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Pam\AccountBundle\Entity\Account;
use Pam\AccountBundle\Entity\Type;

class AccountsController extends Controller
{
    public function listAction(Request $request)
    {
        $userId =1;


        $em = $this->getDoctrine()->getManager();
        $accounts = $em->getRepository('PamAccountBundle:Account')->findByUser($userId);
        $types = $em->getRepository('PamAccountBundle:Type')->findAll();
        $user = $em->getRepository('PamAccountBundle:User')->find($userId);

        $form = $this->createFormBuilder($types)
            ->add('name', 'text')
            ->add('types', 'entity', array(
                'empty_value' => 'Choose an type',
                'class' => 'PamAccountBundle:Type',
                'property'=>'name'))
            ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database

                $formData = $form->getData();
                $account =  new Account();
                $account->setName($formData['name']);
                $account->setType($formData['types']);
                $account->setUser($user);
                $em = $this->getDoctrine()->getManager();
                $em->persist($account);
                $em->flush();

                return $this->redirect($this->generateUrl('pam_account_accounts_list'));
            }
        }

        return $this->render('PamAccountBundle:Accounts:index.html.twig', array(
            'accounts'=>$accounts,
            'types'=>$types,
            'form' => $form->createView()
        ));
    }
}
