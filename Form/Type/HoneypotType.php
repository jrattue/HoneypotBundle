<?php

namespace Rattler\HoneypotBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

class HoneypotType extends AbstractType{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'required' => false,
            'mapped' => false,
            'data' => '',
            'attr' => array(
                'autocomplete' => 'off',
                'tabindex' => -1,
                'style' => 'position: absolute; left: -500%; top: -500%;'
            ),
            'constraints' => array(
                new Assert\Blank(
                    array(
                        'groups' => array(
                            Constraint::DEFAULT_GROUP,
                            'honeypot'
                        ),
                        'message' => 'An error has occurred, please refresh the page and try again.',
                    )
                )
            ),
            'error_bubbling' => true,
            'label' => false
        ));
    }

    /**
     * @return string
     */
    public function getParent(){
        return 'text';
    }

    /**
     * @return string
     */
    public function getName(){
        return 'rattler_honeypot';
    }
	
}