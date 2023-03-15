<?php

    require_once('classes/db_manager_class.php');
    $manager = new codex_manager;

    require_once('classes/search_results_class.php');
    $search_builder = new search_builder;
    
    // Search for anything matching query and type
    if ($_REQUEST['action'] == 'search') {

        $search_query = $_REQUEST['query'];
        $search_type = $_REQUEST['type'];

        if ( isset($search_query) && isset($search_type) ) {

            $results = $manager->search_for_php($search_query, $search_type);

            $search_builder->build_frontend_results($results);
        }
    }

    if ($_REQUEST['action'] == 'adminShowAll') {

        $results = $manager->admin_show_all();

        $search_builder->build_admin_results($results);
    }

    
?>