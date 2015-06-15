<?php

namespace Rattler\HoneypotBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
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

    // BC for SF < 2.7
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
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
