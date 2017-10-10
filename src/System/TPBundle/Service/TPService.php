<?php

namespace System\TPBundle\Service;

use Doctrine\ORM\EntityManager;

class TPService
{
    protected $em;

    public function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }

    public function getBookingGeneralData($reference){
        $em = $this->em;

        $general_data = $em->getRepository('SystemBackendBundle:Booking')->findTPBookingGeneralData($reference);

        return $general_data;
    }

    public function getBookingServiceDescription($reference){
        $em = $this->em;

        $services = $em->getRepository('SystemBackendBundle:Booking')->findTPBookingServicesDescription($reference);

        return $services;
    }

    public function getBookingServicesWithCost($reference){
        $em = $this->em;

        $services = $em->getRepository('SystemBackendBundle:Booking')->findTPBookingServicesWithCost($reference);

        return $services;
    }

    public function getBookingClientsName($reference){
        $em = $this->em;

        $clients = $em->getRepository('SystemBackendBundle:Booking')->findTPBookingClientsName($reference);

        return $clients;
    }
}