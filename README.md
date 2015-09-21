## Awildeep/DisqueBundle

[Disque workqueue](https://github.com/antirez/disque) Disque is a distributed message broker.
[mariano/disque-php](https://github.com/mariano/disque-php/) disque-php, a Disque PHP library.

The Awildeep/DisqueBundle is a Symfony2 Bundle that provides an easy way to integrate disque-php with Symfony2

## Why do I need this?

Firstly, you do not need this at all.  

[mariano/disque-php](https://github.com/mariano/disque-php/) is perfectly usable in Symfony2 without this bundle.  This 
bundle is only intended to provide some useful integration points with Symfony2:

* Yaml configuration of Disque server(s)
* Command-line interaction with Disque via Symfony2's Commands.  (Coming soon)


## Should I use this?

Sure.  Or don't.  Either way I provide no warranty, guarantee, or promises what-so-ever.  However if you like this feel
free to patch as needed.


## What is missing?

Almost everything.  Currently this bundle only supports basic configuration, and provides a way to access the
DisqueServer object via a service.  More coming as I need it, or want it.

## Installation

### Composer

    ``` bash
    $ php composer.phar require awildeep/disque-bundle
    ```

### Enable the bundle
    ``` php
    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Awildeep\DisqueBundle\AwildeepDisqueBundle(),
        );
    }

    ```
### Configure
    ``` yaml
    # app/config/config.yml

    awildeep_disque:
        autoconnect: true
        connection_timeout: 30
        servers:
            primary:
                server: 127.0.0.1
                port: 7711
                #password: password
            #server_2:
                #server: 172.16.0.1
                #port: 7711
                #password: password

    ```
## License

This bundle is under the MIT license. [See the complete license](https://github.com/awildeep/DisqueBundle/LICENSE.txt).

## Credits

### Author 

[Greg Militello](http://github.com/awildeep)

###Contributor(s) :

Currently none.