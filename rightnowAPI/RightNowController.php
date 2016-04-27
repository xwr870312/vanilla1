<?php

require_once 'rightnow-contact-soap-structure.php';
require_once 'rightnow-incident-soap-structure.php';


/**
 * Class RightNowController
 *
 * Data delivery process to RightNow.
 */
class RightNowController {

    public $contact_id = 0;
    public $curtin_email = false;

    /**
     * SOAP HEADER Information
     *
     * @param string $appId
     *
     * @return String
     */
    function get_soap_header($appId) {
        $soapHeader = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                       <soapenv:Header>
                       <ns7:ClientInfoHeader xmlns:ns7="urn:messages.ws.rightnow.com/v1_2" soapenv:mustUnderstand="0">
                       <ns7:AppID>'.$appId.'</ns7:AppID>
                       </ns7:ClientInfoHeader>
                       <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" mustUnderstand="1">
                       <wsse:UsernameToken>
                       <wsse:Username>Pav</wsse:Username>
                        <wsse:Password>Agent007</wsse:Password>
                       </wsse:UsernameToken>
                       </wsse:Security>
                       </soapenv:Header>
                       <soapenv:Body>';

        /**
         *
         *
         */
        return $soapHeader;
    }

    /**
     * SOAP Footer Information
     *
     * @return String
     */
    function get_soap_footer() {
        $soapFooter = '</soapenv:Body>
                       </soapenv:Envelope>';

        return $soapFooter;
    }


    /**
     * Sending data to RightNow via SOAP
     *
     * @param string $soap
     *
     * @return mixed
     */
    function send_soap($soap) {
        // web service url, remove --tst to target live server
        $url = "https://askcurtin--tst.custhelp.com/cgi-bin/askcurtin.cfg/services/soap";

        // curl setup
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $headers = array();

        // set headers
        array_push($headers, "Content-Type: text/xml;charset=utf-8");
        array_push($headers, "Accept: application/soap+xml,application/dime, multipart/related, text/*");
        array_push($headers, "User-Agent: Axis/1.1");
        array_push($headers, "Cache-Control: no-cache");
        array_push($headers, "Pragma: no-cache");
        array_push($headers, "SOAPAction: " . $url . "?wsdl=typed");

        if($soap != null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, "$soap");
            array_push($headers, "Content-Length: ".strlen($soap));
        }

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // get soap response soap
        $response = curl_exec($ch);

        curl_close($ch);

        // return soap response soap
        return $response;
    }

    /**
     * Retrieve user email from soap query result
     *
     * @param string $soap
     *
     * @return string
     */
    function extract_id_from_email_query($soap) {

        // convert soap into simple xml
        $xml = simplexml_load_string($soap);
        $xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $xml->registerXPathNamespace('xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $xml->registerXPathNamespace('xsd', 'http://www.w3.org/2001/XMLSchema');

        // search xml tag structure for node Row which holds the id
        $id = (string) $xml->children('soapenv', true)->Body->children('n0', true)->QueryCSVResponse->CSVTableSet->CSVTables->CSVTable->Rows->Row;

        return $id;
    }

    /**
     * Retrieve user email from soap query result
     *
     * @param string $soap
     *
     * @return string
     */
    function extract_id_from_response($soap) {
        // convert soap into simple xml
        $xml = simplexml_load_string($soap);
        $xml->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $xml->registerXPathNamespace('xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $xml->registerXPathNamespace('xsd', 'http://www.w3.org/2001/XMLSchema');

        // search xml tag structure for node Row which holds the id
        $id = (string) $xml->children('soapenv', true)->Body->children('n0', true)->CreateResponse->RNObjectsResult->RNObjects->children('n2', true)->ID->attributes()->id;

        return $id;
    }

    /**
     * Function to user ip address
     *
     * @return string
     */
    function clientIPAddress() {
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if ($_SERVER['HTTP_X_FORWARDED'])
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        else if ($_SERVER['HTTP_FORWARDED_FOR'])
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if ($_SERVER['HTTP_FORWARDED'])
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        else if ($_SERVER['REMOTE_ADDR'])
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipAddress = 'Unknown';

        // return soap
        return $ipAddress;
    }

    /**
     * Get user's contact id from RightNow
     *
     * @param string $emailquery
     *
     * @return string
     */
    function get_contact_id_by_email($emailquery) {

        // soap header
        $soapHeader = $this->get_soap_header('GetContactIdByEmail');

        // soap footer
        $soapFooter = $this->get_soap_footer();

        $soap = $soapHeader.$emailquery.$soapFooter;

        $soapresult = $this->send_soap($soap);

        return $this->extract_id_from_email_query($soapresult);
    }

    /**
     * Get user's primary email address from RightNow
     *
     * @param string $primary_email_query
     *
     * @return string
     */
    function get_primary_email($primary_email_query) {

        // soap header
        $soapHeader = $this->get_soap_header('findContactIdByEmail');

        // soap footer
        $soapFooter = $this->get_soap_footer();

        $soap = $soapHeader.$primary_email_query.$soapFooter;

        $soapresult = $this->send_soap($soap);

        return $this->extract_id_from_email_query($soapresult);
    }

    /**
     * Check to match the chosen email domain
     *
     * @param string $email
     * @param string $domain
     *
     * @return boolean
     */
    function check_email_domain($email, $domain) {
        $length = strlen($domain);
        if ($length == 0) {
            return true;
        }

        return substr($email, -$length) === $domain;
    }

    /**
     * Construct Soap Structure for user's contact info
     *
     * @param array $contactFields
     *
     * @return string
     *
     */
    function setup_contact_soap($contactFields) {
        $contactSoapStructure = new ContactSoapStructure($contactFields);
        // try to get contact_id
        $emailquery = $contactSoapStructure->get_contact_by_email_query();

        $contactId = $this->get_contact_id_by_email($emailquery);

        if(!empty($contactId)) {

            // prepare soap structure to request primary email address by contact ID
            $primary_email_query = $contactSoapStructure->get_primary_email_query($contactId);
            // send the soap structure and receive the primary email address in response
            $primary_email = $this->get_primary_email($primary_email_query);

            // check if the primary email address finishes in 'curtin.edu.au'
            if($this->check_email_domain($primary_email, "curtin.edu.au") == true) {
                $contactSoapStructure->set_primary_email($primary_email);
                // set flag to true, so the contact update can be skipped
                $this->curtin_email = true;
            }

            $this->contact_id = $contactId;
            $contactSoapStructure->set_contact_id($contactId);
        }

         return $contactSoapStructure->rn_object();
    }

    /**
     * Send user's contact
     *
     * @param string $contactSoapObject
     *
     * @return integer
     */
    function upload_contact($contactSoapObject) {
        // soap header
        $soapHeader = $this->get_soap_header('Upload Contact');
        // soap footer
        $soapFooter = $this->get_soap_footer();

        $soap = $soapHeader.$contactSoapObject.$soapFooter;

        $sendSoap = $this->send_soap($soap);

        if (empty($this->contact_id)) {
            $this->contact_id = $this->extract_id_from_response($sendSoap);
        }
        return $this->contact_id;
    }

    /**
     * Construct Soap Structure for user's incident info
     *
     * @param array $incidentFields
     *
     * @return string
     *
     */
    function setup_incident($incidentFields) {
        $incidentSoapStructure = new IncidentSoapStructure($incidentFields);
		
        $incidentSoapStructure->set_contact_id($this->contact_id);

        return $incidentSoapStructure->rn_object();
    }
    /**
     * Send user's contact
     *
     * @param string $incidentSoapObject
     *
     * @return integer
     */
    function upload_incident($incidentSoapObject) {

        // soap header
        $soapHeader = $this->get_soap_header('Create Incident');
        // soap footer
        $soapFooter = $this->get_soap_footer();
        $soap = $soapHeader . $incidentSoapObject. $soapFooter;

		$sendSoap = $this->send_soap($soap);

        $incidentid = $this->extract_id_from_response($sendSoap);

        return $incidentid;
    }
}