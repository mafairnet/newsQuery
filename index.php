<?php
    include_once('core/xml_files_parser.php');

    $events = getEventsFromXMLFiles('events/');

    print_r($events);
?>