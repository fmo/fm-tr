<?php

namespace App\Repository;

use App\Entity\Country;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CountryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Country::class);
    }

    public function update()
    {
        $this->_em->flush();
    }

    public function save(Country $country)
    {
        $this->_em->persist($country);
        $this->_em->flush();
    }

    public function remove(Country $country)
    {
        $this->_em->remove($country);
        $this->_em->flush();
    }
}
