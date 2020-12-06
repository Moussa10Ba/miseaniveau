<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/admin/competences' => [[['_route' => 'AddCompetence', '_controller' => 'App\\Controller\\CompetenceController::AddCompetence'], null, ['POST' => 0], null, false, false, null]],
        '/api/admin/groupe_competences' => [[['_route' => 'saveGroupeCompetence', '_controller' => 'App\\Controller\\GroupeCompetenceController::saveGroupeCompetence'], null, ['POST' => 0], null, false, false, null]],
        '/referentiel' => [[['_route' => 'referentiel', '_controller' => 'App\\Controller\\ReferentielController::index'], null, null, null, false, false, null]],
        '/api/apprenants' => [[['_route' => 'addApprennant', '_controller' => 'App\\Controller\\UtilisateurController::addUser'], null, ['POST' => 0], null, false, false, null]],
        '/api/formateurs' => [[['_route' => 'addFormateur', '_controller' => 'App\\Controller\\UtilisateurController::addUser'], null, ['POST' => 0], null, false, false, null]],
        '/api/admin/promo' => [
            [['_route' => 'api_promos_get_promo_ref_forma_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'get_promo_ref_forma'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_promos_add_promo_apprenant_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'add_promo_apprenant'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/promo/apprenants/attente' => [[['_route' => 'api_promos_get_promo_ref_formaApp_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'get_promo_ref_formaApp'], null, ['GET' => 0], null, false, false, null]],
        '/api/admin/promo/apprenants/principal' => [[['_route' => 'api_promos_getApprenantGroupePrincipal_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'getApprenantGroupePrincipal'], null, ['GET' => 0], null, false, false, null]],
        '/api/admin/referentiels' => [
            [['_route' => 'api_referentiels_get_Referentiel_GroupeCompetences_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_collection_operation_name' => 'get_Referentiel_GroupeCompetences'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_referentiels_add_Referentiel_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_collection_operation_name' => 'add_Referentiel'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/referentiels/groupe_competences' => [[['_route' => 'api_referentiels_get_Referentiel_GroupeCompetences_Competence_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_collection_operation_name' => 'get_Referentiel_GroupeCompetences_Competence'], null, ['GET' => 0], null, false, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api(?'
                    .'|/a(?'
                        .'|dmin/(?'
                            .'|competences/([^/]++)(*:82)'
                            .'|groupe_competences/([^/]++)(*:116)'
                            .'|profils/([^/]++)/users(*:146)'
                            .'|users/([^/]++)(*:168)'
                        .')'
                        .'|pprenants/([^/]++)(*:195)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:232)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:263)'
                        .'|c(?'
                            .'|o(?'
                                .'|ntexts/(.+)(?:\\.([^/]++))?(*:305)'
                                .'|mpetence_valides(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:350)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:388)'
                                    .')'
                                .')'
                            .')'
                            .'|_ms(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:423)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:461)'
                                .')'
                            .')'
                        .')'
                        .'|a(?'
                            .'|dmin/(?'
                                .'|pro(?'
                                    .'|mos/(?'
                                        .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                            .'|(*:525)'
                                        .')'
                                        .'|([^/]++)/(?'
                                            .'|groupe_promos(?:\\.([^/]++))?(*:574)'
                                            .'|referentiels(?'
                                                .'|(?:\\.([^/]++))?(*:612)'
                                                .'|/([^/]++)/groupe_competences(?'
                                                    .'|(?:\\.([^/]++))?(*:666)'
                                                    .'|/([^/]++)/competences(?'
                                                        .'|(?:\\.([^/]++))?(*:713)'
                                                        .'|/([^/]++)/niveaux(?:\\.([^/]++))?(*:753)'
                                                    .')'
                                                .')'
                                            .')'
                                            .'|formateurs(?:\\.([^/]++))?(*:789)'
                                        .')'
                                    .')'
                                    .'|fil(?'
                                        .'|s(?'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:827)'
                                            .')'
                                            .'|/(?'
                                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                    .'|(*:868)'
                                                .')'
                                                .'|([^/]++)/utilisateurs(?:\\.([^/]++))?(*:913)'
                                            .')'
                                        .')'
                                        .'|_sorties(?'
                                            .'|(?:\\.([^/]++))?(?'
                                                .'|(*:952)'
                                            .')'
                                            .'|/(?'
                                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                                    .'|(*:993)'
                                                .')'
                                                .'|([^/]++)/apprenants(?:\\.([^/]++))?(*:1036)'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                                .'|groupe_competences(?'
                                    .'|(?:\\.([^/]++))?(*:1085)'
                                    .'|(*:1094)'
                                    .'|/(?'
                                        .'|([^/\\.]++)(?:\\.([^/]++))?(*:1132)'
                                        .'|([^/]++)(?'
                                            .'|(*:1152)'
                                            .'|/competences(?'
                                                .'|(?:\\.([^/]++))?(*:1191)'
                                                .'|/([^/]++)/niveaux(?:\\.([^/]++))?(*:1232)'
                                            .')'
                                        .')'
                                    .')'
                                .')'
                                .'|utilisateurs(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1278)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1317)'
                                    .')'
                                .')'
                                .'|competences(?'
                                    .'|(?:\\.([^/]++))?(*:1357)'
                                    .'|(*:1366)'
                                    .'|/(?'
                                        .'|([^/\\.]++)(?:\\.([^/]++))?(*:1404)'
                                        .'|([^/]++)(?'
                                            .'|(*:1424)'
                                            .'|/niveaux(?:\\.([^/]++))?(*:1456)'
                                        .')'
                                    .')'
                                .')'
                                .'|referentiels/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1512)'
                                    .')'
                                    .'|([^/]++)/groupe_competences(?'
                                        .'|(?:\\.([^/]++))?(*:1567)'
                                        .'|/([^/]++)/competences(?'
                                            .'|(?:\\.([^/]++))?(*:1615)'
                                            .'|/([^/]++)/niveaux(?:\\.([^/]++))?(*:1656)'
                                        .')'
                                    .')'
                                .')'
                            .')'
                            .'|ppren(?'
                                .'|ants(?'
                                    .'|(?:\\.([^/]++))?(*:1699)'
                                    .'|(*:1708)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1743)'
                                .')'
                                .'|nants/([^/]++)(*:1767)'
                            .')'
                        .')'
                        .'|formateurs(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1809)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1848)'
                            .')'
                        .')'
                        .'|niveaux(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1887)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1926)'
                            .')'
                        .')'
                        .'|groupe_promos(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1971)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2010)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        82 => [[['_route' => 'updateCompetence', '_controller' => 'App\\Controller\\CompetenceController::updateCompetence'], ['id'], ['PUT' => 0], null, false, true, null]],
        116 => [[['_route' => 'updateGroupeCompetence', '_controller' => 'App\\Controller\\GroupeCompetenceController::updateGroupeCompetence'], ['id'], ['PUT' => 0], null, false, true, null]],
        146 => [[['_route' => 'get_all_users_by_profils', '_controller' => 'App\\Controller\\ProfilController::getListUserByProfil'], ['id'], ['GET' => 0], null, false, false, null]],
        168 => [[['_route' => 'updateUser', '_controller' => 'App\\Controller\\UtilisateurController::updateUser'], ['id'], ['PUT' => 0], null, false, true, null]],
        195 => [[['_route' => 'updateApprenant', '_controller' => 'App\\Controller\\UtilisateurController::updateUser'], ['id'], ['PUT' => 0], null, false, true, null]],
        232 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        263 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        305 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        350 => [
            [['_route' => 'api_competence_valides_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CompetenceValides', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_competence_valides_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CompetenceValides', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        388 => [
            [['_route' => 'api_competence_valides_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CompetenceValides', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_competence_valides_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CompetenceValides', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_competence_valides_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CompetenceValides', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_competence_valides_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CompetenceValides', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        423 => [
            [['_route' => 'api_c_ms_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CM', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_c_ms_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\CM', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        461 => [
            [['_route' => 'api_c_ms_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CM', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_c_ms_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CM', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_c_ms_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CM', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_c_ms_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\CM', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        525 => [
            [['_route' => 'api_promos_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_promos_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_promos_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_promos_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        574 => [[['_route' => 'api_promos_groupe_promos_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupePromo', '_api_subresource_operation_name' => 'api_promos_groupe_promos_get_subresource', '_api_subresource_context' => ['property' => 'groupePromos', 'identifiers' => [['id', 'App\\Entity\\Promo', true]], 'collection' => true, 'operationId' => 'api_promos_groupe_promos_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        612 => [[['_route' => 'api_promos_referentiels_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_subresource_operation_name' => 'api_promos_referentiels_get_subresource', '_api_subresource_context' => ['property' => 'referentiels', 'identifiers' => [['id', 'App\\Entity\\Promo', true]], 'collection' => true, 'operationId' => 'api_promos_referentiels_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        666 => [[['_route' => 'api_promos_referentiels_groupe_competences_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_subresource_operation_name' => 'api_promos_referentiels_groupe_competences_get_subresource', '_api_subresource_context' => ['property' => 'groupeCompetence', 'identifiers' => [['id', 'App\\Entity\\Promo', true], ['referentiels', 'App\\Entity\\Referentiel', true]], 'collection' => true, 'operationId' => 'api_promos_referentiels_groupe_competences_get_subresource']], ['id', 'referentiels', '_format'], ['GET' => 0], null, false, true, null]],
        713 => [[['_route' => 'api_promos_referentiels_groupe_competences_competences_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_subresource_operation_name' => 'api_promos_referentiels_groupe_competences_competences_get_subresource', '_api_subresource_context' => ['property' => 'competences', 'identifiers' => [['id', 'App\\Entity\\Promo', true], ['referentiels', 'App\\Entity\\Referentiel', true], ['groupeCompetence', 'App\\Entity\\GroupeCompetence', true]], 'collection' => true, 'operationId' => 'api_promos_referentiels_groupe_competences_competences_get_subresource']], ['id', 'referentiels', 'groupeCompetence', '_format'], ['GET' => 0], null, false, true, null]],
        753 => [[['_route' => 'api_promos_referentiels_groupe_competences_competences_niveaux_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_subresource_operation_name' => 'api_promos_referentiels_groupe_competences_competences_niveaux_get_subresource', '_api_subresource_context' => ['property' => 'niveau', 'identifiers' => [['id', 'App\\Entity\\Promo', true], ['referentiels', 'App\\Entity\\Referentiel', true], ['groupeCompetence', 'App\\Entity\\GroupeCompetence', true], ['competences', 'App\\Entity\\Competence', true]], 'collection' => true, 'operationId' => 'api_promos_referentiels_groupe_competences_competences_niveaux_get_subresource']], ['id', 'referentiels', 'groupeCompetence', 'competences', '_format'], ['GET' => 0], null, false, true, null]],
        789 => [[['_route' => 'api_promos_formateurs_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_subresource_operation_name' => 'api_promos_formateurs_get_subresource', '_api_subresource_context' => ['property' => 'formateurs', 'identifiers' => [['id', 'App\\Entity\\Promo', true]], 'collection' => true, 'operationId' => 'api_promos_formateurs_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        827 => [
            [['_route' => 'api_profils_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profils_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        868 => [
            [['_route' => 'api_profils_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profils_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_profils_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        913 => [[['_route' => 'api_profils_utilisateurs_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Utilisateur', '_api_subresource_operation_name' => 'api_profils_utilisateurs_get_subresource', '_api_subresource_context' => ['property' => 'utilisateurs', 'identifiers' => [['id', 'App\\Entity\\Profil', true]], 'collection' => true, 'operationId' => 'api_profils_utilisateurs_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        952 => [
            [['_route' => 'api_profil_sorties_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => 'api_profil_sorties_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        993 => [
            [['_route' => 'api_profil_sorties_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_profil_sorties_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
        ],
        1036 => [[['_route' => 'api_profil_sorties_apprenants_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_subresource_operation_name' => 'api_profil_sorties_apprenants_get_subresource', '_api_subresource_context' => ['property' => 'apprenants', 'identifiers' => [['id', 'App\\Entity\\ProfilSortie', true]], 'collection' => true, 'operationId' => 'api_profil_sorties_apprenants_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1085 => [[['_route' => 'api_groupe_competences_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        1094 => [[['_route' => 'api_groupe_competences_saveGroupeCompetence_collection', '_controller' => 'App/Controller/GroupeCompetenceController::saveGroupeCompetence', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_collection_operation_name' => 'saveGroupeCompetence'], [], ['POST' => 0], null, false, false, null]],
        1132 => [[['_route' => 'api_groupe_competences_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1152 => [[['_route' => 'api_groupe_competences_updateGroupeCompetence_item', '_controller' => 'App/Controller/GroupeCompetenceController::updateGroupeCompetence', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_item_operation_name' => 'updateGroupeCompetence'], ['id'], ['PUT' => 0], null, false, true, null]],
        1191 => [[['_route' => 'api_groupe_competences_competences_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_subresource_operation_name' => 'api_groupe_competences_competences_get_subresource', '_api_subresource_context' => ['property' => 'competences', 'identifiers' => [['id', 'App\\Entity\\GroupeCompetence', true]], 'collection' => true, 'operationId' => 'api_groupe_competences_competences_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1232 => [[['_route' => 'api_groupe_competences_competences_niveaux_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_subresource_operation_name' => 'api_groupe_competences_competences_niveaux_get_subresource', '_api_subresource_context' => ['property' => 'niveau', 'identifiers' => [['id', 'App\\Entity\\GroupeCompetence', true], ['competences', 'App\\Entity\\Competence', true]], 'collection' => true, 'operationId' => 'api_groupe_competences_competences_niveaux_get_subresource']], ['id', 'competences', '_format'], ['GET' => 0], null, false, true, null]],
        1278 => [
            [['_route' => 'api_utilisateurs_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Utilisateur', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_utilisateurs_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Utilisateur', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1317 => [
            [['_route' => 'api_utilisateurs_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Utilisateur', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_utilisateurs_updateUser_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Utilisateur', '_api_item_operation_name' => 'updateUser'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1357 => [[['_route' => 'api_competences_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        1366 => [[['_route' => 'api_competences_addCompetence_collection', '_controller' => 'App/Controller/CompetenceController::addCompetence', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_collection_operation_name' => 'addCompetence'], [], ['POST' => 0], null, false, false, null]],
        1404 => [[['_route' => 'api_competences_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1424 => [[['_route' => 'api_competences_updateCompetencee_item', '_controller' => 'App/Controller/CompetenceController::updateCompetence', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_item_operation_name' => 'updateCompetencee'], ['id'], ['PUT' => 0], null, false, true, null]],
        1456 => [[['_route' => 'api_competences_niveaux_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_subresource_operation_name' => 'api_competences_niveaux_get_subresource', '_api_subresource_context' => ['property' => 'niveau', 'identifiers' => [['id', 'App\\Entity\\Competence', true]], 'collection' => true, 'operationId' => 'api_competences_niveaux_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1512 => [
            [['_route' => 'api_referentiels_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_referentiels_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_referentiels_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_referentiels_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1567 => [[['_route' => 'api_referentiels_groupe_competences_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_subresource_operation_name' => 'api_referentiels_groupe_competences_get_subresource', '_api_subresource_context' => ['property' => 'groupeCompetence', 'identifiers' => [['id', 'App\\Entity\\Referentiel', true]], 'collection' => true, 'operationId' => 'api_referentiels_groupe_competences_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1615 => [[['_route' => 'api_referentiels_groupe_competences_competences_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_subresource_operation_name' => 'api_referentiels_groupe_competences_competences_get_subresource', '_api_subresource_context' => ['property' => 'competences', 'identifiers' => [['id', 'App\\Entity\\Referentiel', true], ['groupeCompetence', 'App\\Entity\\GroupeCompetence', true]], 'collection' => true, 'operationId' => 'api_referentiels_groupe_competences_competences_get_subresource']], ['id', 'groupeCompetence', '_format'], ['GET' => 0], null, false, true, null]],
        1656 => [[['_route' => 'api_referentiels_groupe_competences_competences_niveaux_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_subresource_operation_name' => 'api_referentiels_groupe_competences_competences_niveaux_get_subresource', '_api_subresource_context' => ['property' => 'niveau', 'identifiers' => [['id', 'App\\Entity\\Referentiel', true], ['groupeCompetence', 'App\\Entity\\GroupeCompetence', true], ['competences', 'App\\Entity\\Competence', true]], 'collection' => true, 'operationId' => 'api_referentiels_groupe_competences_competences_niveaux_get_subresource']], ['id', 'groupeCompetence', 'competences', '_format'], ['GET' => 0], null, false, true, null]],
        1699 => [[['_route' => 'api_apprenants_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        1708 => [[['_route' => 'api_apprenants_addApprennant_collection', '_controller' => 'App\\Controller\\UtilisateurController::AddApprenant', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_collection_operation_name' => 'addApprennant'], [], ['POST' => 0], null, false, false, null]],
        1743 => [[['_route' => 'api_apprenants_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1767 => [[['_route' => 'api_apprenants_updateApprenant_item', '_controller' => 'App\\Controller\\UtilisateurController::updateUser', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_item_operation_name' => 'updateApprenant'], ['id'], ['PUT' => 0], null, false, true, null]],
        1809 => [
            [['_route' => 'api_formateurs_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_formateurs_AddFormateur_collection', '_controller' => 'App\\Controller\\Utilisateur::addFormateur', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_collection_operation_name' => 'AddFormateur'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1848 => [
            [['_route' => 'api_formateurs_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_formateurs_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_formateurs_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1887 => [
            [['_route' => 'api_niveaux_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_niveaux_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1926 => [
            [['_route' => 'api_niveaux_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_niveaux_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_niveaux_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_niveaux_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Niveau', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1971 => [
            [['_route' => 'api_groupe_promos_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupePromo', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_promos_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupePromo', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2010 => [
            [['_route' => 'api_groupe_promos_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupePromo', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_promos_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupePromo', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_groupe_promos_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupePromo', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_groupe_promos_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupePromo', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
