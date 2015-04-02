# Rattler HoneypotBundle

A Symfony2 bundle that provides a very simple Honeypot form type

## Installation

### Add bundle to composer.json

    "require": {
        // ...
            
        "rattler/honeypot-bundle": "dev-master",
    }

### Add RattlerHoneypotBundle to application kernel

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Rattler\HoneypotBundle\RattlerHoneypotBundle(),
            // ...
        );
    }

## Usage

Add the following to to an existing form.
    
    $builder->add('text', 'rattler_honeypot');
    
The name of the field can be changed to anything.