<?php

    /*
        This function retreives the event information from XML
        INPUT:  XML Files directory
        OUTPUT: Event infrmation into array event
            -tittle
            -organizer
            -description
            -locationHR
            -locationLL
            -startDate
            -endDate
            -website
            -previewImage
            -eventImage


    */
    function getEventsFromXMLFiles($directory)
    {
        $doc = new DOMDocument();

        $files = glob($directory."*xml");

        $eventsArray = Array();

        if (is_array($files)) {

            foreach($files as $filename) {
                
                //echo $filename.'<br/>';
                $doc->load($filename);
                $events = $doc->getElementsByTagName("event");

                foreach ($events as $event)
                {

                    $tittle         = "";
                    $organizer      = "";
                    $description    = "";
                    $locationHR     = "";
                    $locationLL     = "";
                    $startDate      = "";
                    $endDate        = "";
                    $website        = "";
                    $previewImage   = "";
                    $eventImage     = "";

                    $tittleRaw         = $event->getElementsByTagName('tittle');
                    if ($tittleRaw->length>0){$tittle = $tittleRaw->item(0)->nodeValue;}
                    
                    $organizerRaw       = $event->getElementsByTagName('organizer');
                    if ($organizerRaw->length>0){$organizer = $organizerRaw->item(0)->nodeValue;}

                    $descriptionRaw     = $event->getElementsByTagName('description');
                    if ($descriptionRaw->length >0){$description = $descriptionRaw->item(0)->nodeValue;}

                    $locationHRRaw      = $event->getElementsByTagName('locationHR');
                    if ($locationHRRaw->length>0){$locationHR = $locationHRRaw->item(0)->nodeValue;}

                    $locationLLRaw      = $event->getElementsByTagName('locationLL');
                    if ($locationLLRaw->length>0){$locationLL = $locationLLRaw->item(0)->nodeValue;}

                    $startDateRaw       = $event->getElementsByTagName('startDate');
                    if ($startDateRaw->length>0){$startDate = $startDateRaw->item(0)->nodeValue;}

                    $endDateRaw         = $event->getElementsByTagName('endDate');
                    if ($endDateRaw->length>0){$endDate = $endDateRaw->item(0)->nodeValue;}

                    $websiteRaw         = $event->getElementsByTagName('website');
                    if ($websiteRaw->length>0){$website = $websiteRaw->item(0)->nodeValue;}

                    $previewImageRaw    = $event->getElementsByTagName('previewImage');
                    if ($previewImageRaw->length>0){$previewImage = $previewImageRaw->item(0)->nodeValue;}

                    $eventImageRaw      = $event->getElementsByTagName('eventImage');
                    if ($eventImageRaw->length>0){$eventImage = $eventImageRaw->item(0)->nodeValue;}

                    array_push($eventsArray,array('tittle'=>$tittle,'organizer'=>$organizer,'description'=>$description,'locationHR'=>$locationHR,'locationLL'=>$locationLL,'startDate'=>$startDate,'endDate'=>$endDate,'website'=>$website,'previewImage'=>$previewImage,'eventImage'=>$eventImage));
                }

            }

        }

        return $eventsArray;
    }
?>