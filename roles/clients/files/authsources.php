<?php

$config = array(

    // This is a authentication source which handles admin authentication.
    'admin' => array(
        // The default is to use core:AdminPassword, but it can be replaced with
        // any authentication source.

        'core:AdminPassword',
    ),


    // An authentication source which can authenticate against both SAML 2.0
    // and Shibboleth 1.3 IdPs.
    'default-sp' => array(
        'saml:SP',

        // The entity ID of this SP.
        // Can be NULL/unset, in which case an entity ID is generated based on the metadata URL.
        'entityID' => null,

        // The entity ID of the IdP this should SP should contact.
        // Can be NULL/unset, in which case the user will be shown a list of available IdPs.
        'idp' => null,

        // The URL to the discovery service.
        // Can be NULL/unset, in which case a builtin discovery service will be used.
        'discoURL' => null,

        /*
         * WARNING: SHA-1 is disallowed starting January the 1st, 2014.
         *
         * Uncomment the following option to start using SHA-256 for your signatures.
         * Currently, SimpleSAMLphp defaults to SHA-1, which has been deprecated since
         * 2011, and will be disallowed by NIST as of 2014. Please refer to the following
         * document for more information:
         *
         * http://csrc.nist.gov/publications/nistpubs/800-131A/sp800-131A.pdf
         *
         * If you are uncertain about identity providers supporting SHA-256 or other
         * algorithms of the SHA-2 family, you can configure it individually in the
         * IdP-remote metadata set for those that support it. Once you are certain that
         * all your configured IdPs support SHA-2, you can safely remove the configuration
         * options in the IdP-remote metadata set and uncomment the following option.
         *
         * Please refer to the hosted SP configuration reference for more information.
          */
        //'signature.algorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',

        /*
         * The attributes parameter must contain an array of desired attributes by the SP.
         * The attributes can be expressed as an array of names or as an associative array
         * in the form of 'friendlyName' => 'name'.
         * The metadata will then be created as follows:
         * <md:RequestedAttribute FriendlyName="friendlyName" Name="name" />
         */
        /*'attributes' => array(
            'attrname' => 'urn:oid:x.x.x.x',
        ),*/
        /*'attributes.required' => array (
            'urn:oid:x.x.x.x',
        ),*/
    ),


	/* TODO: move crypted passwords to private repo */
    'crypto-hash' => array(
        'authcrypt:Hash',
        // hashed version of password, made with bin/pwgen.php
        'baas:{SSHA256}k3PEnrrBqpxjOwuE4kArdPwAG2lVrJZBeS5/+Ej8598nGbBKCvYfzQ==' => array(
            'uid' => array('admin'),
            'urn:mace:dir:attribute-def:uid' => array('admin'),
            'urn:mace:dir:attribute-def:eduPersonAffiliation' => array('member', 'employee'),
            'urn:mace:dir:attribute-def:mail' => array('admin@scz.lab.surf.nl'),
            'urn:mace:terena.org:attribute-def:schacHomeOrganization' => array('scz.lab.surf.nl'),
            'urn:mace:dir:attribute-def:eduPersonPrincipalName' => array('admin@scz.lab.surf.nl'),
            'urn:oid:1.3.6.1.4.1.5923.1.1.1.6' => array('admin@scz.lab.surf.nl'),
        ),
        'student:{SSHA256}sa1hYchNHSHa0DwbZjf0vSuQj34GnaMVRVJVGBG+ao18/5NcvAnr7w==' => array(
//             'uid' => array('test'),
            'urn:mace:dir:attribute-def:uid' => array('testuid'),
            'urn:mace:dir:attribute-def:eduPersonAffiliation' => array('member', 'student'),
            'urn:mace:dir:attribute-def:mail' => array('some@mailaddress.org'),
            'urn:mace:terena.org:attribute-def:schacHomeOrganization' => array('surfnet.nl'),
            'urn:mace:dir:attribute-def:eduPersonPrincipalName' => array('eppn_student@surfnet.nl'),
//             'urn:oid:1.3.6.1.4.1.5923.1.1.1.6' => array('eppn_student@surfnet.nl'),
            'urn:mace:dir:attribute-def:postalAddress' => array('Waar je huis woont')
        ),
        'employee:{SSHA256}sa1hYchNHSHa0DwbZjf0vSuQj34GnaMVRVJVGBG+ao18/5NcvAnr7w==' => array(
            'uid' => array('employee'),
            'eduPersonAffiliation' => array('member', 'employee'),
        ),
    ),


);
