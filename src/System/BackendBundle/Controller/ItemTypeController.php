<?php

namespace System\BackendBundle\Controller;

use System\BackendBundle\Entity\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Itemtype controller.
 *
 */
class ItemTypeController extends Controller
{
    /**
     * Lists all itemType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $itemTypes = $em->getRepository('SystemBackendBundle:ItemType')->findAll();

        return $this->render('itemtype/index.html.twig', array(
            'itemTypes' => $itemTypes,
        ));
    }

    /**
     * Creates a new itemType entity.
     *
     */
    public function newAction(Request $request)
    {
        $itemType = new Itemtype();
        $form = $this->createForm('System\BackendBundle\Form\ItemTypeType', $itemType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($itemType);
            $em->flush();

            return $this->redirectToRoute('itemtype_show', array('id' => $itemType->getId()));
        }

        return $this->render('itemtype/new.html.twig', array(
            'itemType' => $itemType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a itemType entity.
     *
     */
    public function showAction(ItemType $itemType)
    {
        $deleteForm = $this->createDeleteForm($itemType);

        return $this->render('itemtype/show.html.twig', array(
            'itemType' => $itemType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing itemType entity.
     *
     */
    public function editAction(Request $request, ItemType $itemType)
    {
        $deleteForm = $this->createDeleteForm($itemType);
        $editForm = $this->createForm('System\BackendBundle\Form\ItemTypeType', $itemType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('itemtype_edit', array('id' => $itemType->getId()));
        }

        return $this->render('itemtype/edit.html.twig', array(
            'itemType' => $itemType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a itemType entity.
     *
     */
    public function deleteAction(Request $request, ItemType $itemType)
    {
        $form = $this->createDeleteForm($itemType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($itemType);
            $em->flush();
        }

        return $this->redirectToRoute('itemtype_index');
    }

    /**
     * Creates a form to delete a itemType entity.
     *
     * @param ItemType $itemType The itemType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ItemType $itemType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('itemtype_delete', array('id' => $itemType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
