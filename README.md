# Rattler HoneypotBundle

A Symfony bundle that provides a very simple invisible Honeypot form type

For Symfony 2 use version 1.0.

## Installation

### Add bundle to composer.json

    "require": {
        // ...
        "rattler/honeypot-bundle": "~2.0",
    }

### Enable RattlerHoneypotBundle 

    // config/bundles.php
    
    return [
        // ...
        Rattler\HoneypotBundle\RattlerHoneypotBundle::class => ['all' => true],
    ];
    
## Usage

Add the following to to an existing form.
    
    $builder->add('text', HoneypotType::class);
    
The name of the field can be changed to anything (generic names seems to work better).
