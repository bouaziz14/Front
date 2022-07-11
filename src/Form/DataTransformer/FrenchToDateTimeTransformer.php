<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class FrenchToDateTimeTransformer implements DataTransformerInterface {

    /**
     * @inheritDoc
     */
    public function transform($date)
    {

        if ($date === null) {
            return '';
        }

        return $date->format('d/m/Y');
    }

    /**
     * @inheritDoc
     */
    public function reverseTransform($frenchdate)
    {
        if ($frenchdate === null) {
            throw new TransformationFailedException("Vous devez fournir une date !");
        }

        $date = \DateTime::createFromFormat('d/m/Y', $frenchdate);

        if ($date === false) {
            throw new TransformationFailedException("Le format de la date n'est pas le bon.");
        }

        return $date;
    }
}