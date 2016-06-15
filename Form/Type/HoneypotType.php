<?php

namespace Rattler\HoneypotBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Blank;

class HoneypotType extends AbstractType{

    public function configureOptions(OptionsResolver $resolver)
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
                new Blank(
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
        return TextType::class;
    }

    /**
     * @return string
     */
    public function getBlockPrefix(){
        return 'rattler_honeypot';
    }

}
