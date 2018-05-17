<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Combat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Combat controller.
 *
 * @Route("tournament")
 */
class CombatController extends Controller
{

    /**
     * Lists all combat entities.
     *
     * @Route("/fight", name="combat_fight")
     * @Method("GET")
     */
    public function fightAction()
    {
        $em = $this->getDoctrine()->getManager();

        $combats = $em->getRepository('AppBundle:Combat')->findAll();

        return $this->render('combat/fight.html.twig', array(
            'combats' => $combats,
        ));
    }


    /**
     * Lists all combat entities.
     *

     * @Route("/", name="combat_tournoi")

     * @Method("GET")
     */
    public function tournoiAction()
    {
        $em = $this->getDoctrine()->getManager();

        $combats = $em->getRepository('AppBundle:Combat')->findAll();
        return $this->render('combat/combat.html.twig', array(
            'combats' => $combats,
        ));
    }


    /**
     * Creates a new combat entity.
     *
     * @Route("/new", name="combat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $combat = new Combat();
        $form = $this->createForm('AppBundle\Form\CombatType', $combat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($combat);
            $em->flush();

            return $this->redirectToRoute('combat_show', array('id' => $combat->getId()));
        }

        return $this->render('combat/new.html.twig', array(
            'combat' => $combat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a combat entity.
     *
     * @Route("/{id}", name="combat_show")
     * @Method("GET")
     */
    public function showAction(Combat $combat)
    {
        $deleteForm = $this->createDeleteForm($combat);

        return $this->render('combat/show.html.twig', array(
            'combat' => $combat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing combat entity.
     *
     * @Route("/{id}/edit", name="combat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Combat $combat)
    {
        $deleteForm = $this->createDeleteForm($combat);
        $editForm = $this->createForm('AppBundle\Form\CombatType', $combat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('combat_edit', array('id' => $combat->getId()));
        }

        return $this->render('combat/edit.html.twig', array(
            'combat' => $combat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a combat entity.
     *
     * @Route("/{id}", name="combat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Combat $combat)
    {
        $form = $this->createDeleteForm($combat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($combat);
            $em->flush();
        }

        return $this->redirectToRoute('combat_index');
    }

    /**
     * Creates a form to delete a combat entity.
     *
     * @param Combat $combat The combat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Combat $combat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('combat_delete', array('id' => $combat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all combat entities.
     *
     * @Route("/admin", name="combat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $combats = $em->getRepository('AppBundle:Combat')->findAll();

        return $this->render('combat/index.html.twig', array(
            'combats' => $combats,
        ));
    }
}
