<?php

require_once 'rightnow-vars-defaults.php';
require_once 'RightNowController.php';

class RightNowAPI
{
    /**
     * Send submitted form to Curtin RightNow CRM
     *
     * @param array $contactFields
     * @param array $incidentFields
     *
     * @return array
     */
    public function createContactIncident($contactFields, $incidentFields)
    {
        $soapResult = array();

        // check both contactFields array and IncidentFields array exist
        if (!isset($contactFields) || !isset($incidentFields)) {
            // set results error message to contact or incident array not found
            $soapResult['error'] = "contact fields or incident fields array not found.";
        } else {
            if (array_key_exists('email', $contactFields)) {
                $rncontroller = new RightNowController();

                $contactSoap = $rncontroller->setup_contact_soap($contactFields);

                // Only update contact details if the primary address is not a Curtin email
                if($rncontroller->curtin_email == false) {
                    $rncontroller->upload_contact($contactSoap);
                }

                // User must exist in RightNow CRM in order to send user's incident.
                if (!empty($rncontroller->contact_id)) {
                    $incidentSoap = $rncontroller->setup_incident($incidentFields);
                    $incidentid = $rncontroller->upload_incident($incidentSoap);

                    if (!empty($incidentid)) {
                        $soapResult['success'] =  true;
                    } else {
                        $soapResult['success'] = false;
                    }
                }

            } else {
                $soapResult['error'] = 'Email field is not exist';
            }
        }
        return $soapResult;
    }
}