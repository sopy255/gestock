<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 24/08/2018
 * Time: 11:24
 */
define("ROOT_LEVEL", 10);
define("SADMIN_LEVEL", 8);
define("ADMIN_LEVEL", 5);
define("CONCIERGE_LEVEL", 2);
const BR_BASE_URL = "http://127.0.0.1/univBack-end/";
const ROOT_INT_CONF = array(
    "mainMenu" => [
        "Liste de Suppers Admins #listSadmin",
        "Modifier mes informations #rootUppAccount",
        "Supper Admin Blocker #SadminLook"
    ],
    "href" => [
        "add" => "root/createsupperadmin",
        "delete" => "root/deletesuperadmin",
        "hideTwo" => "user/getAdmin",
        "preview" => "user/getSupperAdmin",
        "lock" => "root/blocksupperadmin",
        "unlock" => "root/unlocksuperadmin"
    ]
);
const SUPPER_INT_CONF = array(
    "mainMenu" => [
        "Liste de mes Admin #listAdmin",
        "Modifier mes informations #SadminUppAccount",
        "Ajouter ou Modifier une Localité #addLocality",
        "Besoin d'aide ? #supperAdminHelp"
    ],
    "href" => [
        "add" => "sadmin/createadmin",
        "delete" => "sadmin/deleteadmin",
        "hideTwo" => "user/getConcierge",
        "preview" => "user/getAdmin",
        "lock" => "sadmin/blockadmin",
        "unlock" => "sadmin/unlockadmin"
    ]
);
const ADMIN_INT_CONF = array(
    "mainMenu" => [
        "Liste de mes Concierge #listConcierge",
        "Modifier mes informations #adminUppAccount",
        "Besoin d'aide ? #adminHelp"
    ],
    "href" => [
        "add" => "admin/addConcierge",
        "delete" => "concierge/updateaccount",
        "hideTwo" => "user/getCity",
        "preview" => "user/getConcierge",
        "lock" => "admin/blockConcierge",
        "unlock" => "admin/unlockConcierge"
    ]
);
const CONCIERGE_INT_CONF = array(
    "mainMenu" => [
        "Demandes enregistrer #requestRegister",
        "Mes établissements #etablissement",
        "Modifier mes informations #invitation",
        "Besoin d'aide ? #conciergeHelp"
    ],
    "href" => [
        "add" => "admin/addCity",
        "delete" => "sadmin/deleteCity",
        "hideTwo" => "concierge/getdemand",
        "preview" => "user/getAdmin",
        "lock" => "sadmin/blockCity",
        "unlock" => "concierge/unlockCity"
    ]
);
const VISITOR_INT_CONF = array(
    "mainMenu" => [
        "Modifier mes informations #visitorUppAccount",
        "Concierge contacter #myConcierge",
        "Cyter Consulter #cityRegister",
        "Besoin d'aide ? #visitorHelp"
    ]
);
const AUTH_DISPLAY_CONF = array(
    "root" => array(
        "getSupperAdmin" => array(
            "add" => "block",
            "delete" => "block",
            "hideTwo" => "block",
            "lock" => "block",
            "preview" => "none"
        ),
        "getAdmin" => array(
            "add" => "none",
            "delete" => "block",
            "hideTwo" => "block",
            "lock" => "block",
            "preview" => "block"
        ),
        "getConcierge" => array(
            "add" => "none",
            "delete" => "block",
            "hideTwo" => "block",
            "lock" => "block",
            "preview" => "block"
        ),
        "getCity" => array(
            "add" => "none",
            "delete" => "block",
            "hideTwo" => "block",
            "lock" => "block",
            "preview" => "block"
        )
    ),
    "sadmin" => array(
        "getAdmin" => array(
            "add" => "block",
            "delete" => "block",
            "hideTwo" => "block",
            "lock" => "block",
            "preview" => "none"
        ),
        "getConcierge" => array(
            "add" => "none",
            "delete" => "none",
            "hideTwo" => "block",
            "lock" => "block",
            "preview" => "block"
        ),
        "getCity" => array(
            "add" => "none",
            "delete" => "none",
            "hideTwo" => "block",
            "lock" => "block",
            "preview" => "block"
        )
    ),
    "admin" => array(
        "getConcierge" => array(
            "add" => "block",
            "delete" => "block",
            "hideTwo" => "block",
            "lock" => "none",
            "preview" => "none"
        ),
        "getCity" => array(
            "add" => "block",
            "delete" => "block",
            "hideTwo" => "none",
            "lock" => "none",
            "preview" => "block"
        )
    ),
    "concierge" => array(
        "getCity" => array(
            "add" => "none",
            "delete" => "none",
            "hideTwo" => "block",
            "lock" => "none",
            "preview" => "none"
        )
    )
);