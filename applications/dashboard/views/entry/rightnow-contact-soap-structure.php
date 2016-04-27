<?php

/**
 * Class ContactSoapStructure
 *
 * Construct SOAP XML structure to for user's contact
 */
class ContactSoapStructure {
    private $contactFields;
    private $contactAction = '';

    function __construct($contactFields) {
        if (is_array($contactFields)) {
            $this->contactFields = $contactFields;
        }
    }

    function field_exist($fieldname) {
        if (!empty($fieldname) && array_key_exists($fieldname, $this->contactFields) &&
            !empty($this->contactFields[$fieldname])) {
            return true;
        }
        return false;
    }

    function set_contact_id($fieldvalue) {
        if (!empty($fieldvalue)) {
            $this->contactFields['contact_id'] = $fieldvalue;
        }
    }

    function set_primary_email($fieldvalue) {
        if (!empty($fieldvalue)) {
            $this->contactFields['email'] = $fieldvalue;
        }
    }

    function contact_action() {
        if ($this->contactAction == 'update') {
            // if contact exists then do a update
            return '<ns7:Update xmlns:ns7="urn:messages.ws.rightnow.com/v1_2">'.
                   '<ns7:RNObjects xmlns:ns4="urn:objects.ws.rightnow.com/v1_2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="ns4:Contact">'.
                   '<ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->contactFields['contact_id'] . '" />';
        } else {
            // if contact does not exist then do a create
            return '<ns7:Create xmlns:ns7="urn:messages.ws.rightnow.com/v1_2">'.
                   '<ns7:RNObjects xmlns:ns4="urn:objects.ws.rightnow.com/v1_2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="ns4:Contact">';
        }
    }
    function address_structure() {
        $address = '';

        if ($this->field_exist('city') || $this->field_exist('postcode')) {
            $address .= '<ns4:Address>';

            if (!empty($this->contactFields['city'])) {
                $address .= '<ns4:City>'.$this->contactFields['city'] . '</ns4:City>';
            }
            if (!empty($this->contactFields['postcode'])) {
                $address .= '<ns4:PostalCode>'.$this->contactFields['postcode'].'</ns4:PostalCode>';
            }

            $address .= '</ns4:Address>';
        }
        return $address;
    }

    function emails_structure() {
        $emails = '<ns4:Emails>';

        $emails .= '<ns4:EmailList action="' . $this->contactAction . '">';

        $emails .= '<ns4:Address>' . $this->contactFields['email'] . '</ns4:Address> <ns4:AddressType> <ID xmlns="urn:base.ws.rightnow.com/v1_2" id="0" /></ns4:AddressType>';
        $emails .= '</ns4:EmailList></ns4:Emails>';

        return $emails;
    }

    function globalOptIn() {
        $optin = '';
        if ($this->field_exist('ma_opt_in')) {
            $optin = '<ns4:MarketingSettings> <ns4:MarketingOptIn>' . $this->contactFields['ma_opt_in'] . '</ns4:MarketingOptIn> </ns4:MarketingSettings>';
        }
        return $optin;
    }
    function names() {
        $names = '';
        if ($this->field_exist('firstname') || $this->field_exist('lastname')) {
            $names .= '<ns4:Name>';

            if($this->field_exist('firstname')) {
                $names .= '<ns4:First>' . $this->contactFields['firstname'] . '</ns4:First>';
            }

            if($this->field_exist('lastname')) {
                $names .= '<ns4:Last>' . $this->contactFields['lastname'] . '</ns4:Last>';
            }
            $names .= '</ns4:Name>';
        }
        return $names;
    }

    function notes() {
        $notes = '<ns4:Notes>';
        $notes .= '<ns4:NoteList action="' . $this->contactAction . '">';

        $notes .= '<ns4:Text>Created through the SOAP API. IP address:</ns4:Text> </ns4:NoteList> </ns4:Notes>';

        return $notes;
    }

    function organization() {
        if($this->field_exist('org_id')) {
            return '<ns4:Organization><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->contactFields['org_id'] . '" /></ns4:Organization>';
        }
        return '';
    }

    function phones() {
        $phones = '';
        if ($this->field_exist('ph_office') || $this->field_exist('ph_mobile') || $this->field_exist('ph_fax') || $this->field_exist('ph_assistant') ||
            $this->field_exist('ph_home')) {

            $phones .= '<ns4:Phones>';

            if ($this->field_exist('ph_office')) {
                $phones .= '<ns4:PhoneList action="' . $this->contactAction . '">';
                $phones .= '<ns4:Number>' . $this->contactFields['ph_office'] . '</ns4:Number> <ns4:PhoneType><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="0" /></ns4:PhoneType></ns4:PhoneList>';
            }

            if ($this->field_exist('ph_mobile')) {
                $phones .= '<ns4:PhoneList action="' . $this->contactAction . '">';
                $phones = $phones . '<ns4:Number>' . $this->contactFields['ph_mobile'] . '</ns4:Number><ns4:PhoneType><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="1" /></ns4:PhoneType></ns4:PhoneList>';
            }

            if ($this->field_exist('ph_fax')) {
                $phones .= '<ns4:PhoneList action="' . $this->contactAction . '">';
                $phones .= '<ns4:Number>' . $this->contactFields['ph_fax'] . '</ns4:Number> <ns4:PhoneType><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="2" /></ns4:PhoneType></ns4:PhoneList>';
            }

            if ($this->field_exist('ph_assistant')) {
                $phones .= '<ns4:PhoneList action="' . $this->contactAction . '">';
                $phones .= '<ns4:Number>' . $this->contactFields['ph_assistant'] . '</ns4:Number><ns4:PhoneType><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="3" /></ns4:PhoneType></ns4:PhoneList>';
            }

            if ($this->field_exist('ph_home')) {
                $phones .= '<ns4:PhoneList action="' . $this->contactAction . '">';
                $phones .= '<ns4:Number>' . $this->contactFields['ph_home'] . '</ns4:Number><ns4:PhoneType><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="4" /></ns4:PhoneType></ns4:PhoneList>';
            }
            $phones .= '</ns4:Phones>';
        }
        return $phones;
    }

    function custom_fields() {
        $cfields = '';
        $contactDVDefaults = contact_custom_fields_default();
        if ($this->field_exist('custom_fields') && is_array($this->contactFields["custom_fields"])) {
            $cfields .= '<ns4:CustomFields><ObjectType xmlns="urn:generic.ws.rightnow.com/v1_2"><Namespace xsi:nil="true"/>';
            $cfields .= '<TypeName>ContactCustomFields</TypeName></ObjectType>';
            $cfields .= '<GenericFields name="c" dataType="OBJECT" xmlns="urn:generic.ws.rightnow.com/v1_2">';
            $cfields .= '<DataValue><ObjectValue><ObjectType><Namespace xsi:nil="true"/><TypeName>ContactCustomFields</TypeName>';
            $cfields .= '</ObjectType>';

            foreach($this->contactFields["custom_fields"] as $key => $val) {
                if (array_key_exists($key, $contactDVDefaults) && $val != '') {
                    // convert boolean data value
                    if (strtolower($contactDVDefaults[$key]['datatype']) == 'boolean' && $val > 0) {
                        $val = 1;
                    }
                    if(array_key_exists('xmlns', $contactDVDefaults[$key])) {
                        $cfields .= "\n".'<GenericFields name="'.$key.'" dataType="'.$contactDVDefaults[$key]['datatype'].'"><DataValue> <NamedIDValue><ID id="' . $val . '" xmlns="'.$contactDVDefaults[$key]['xmlns'].'"/></NamedIDValue> </DataValue> </GenericFields>';
                    } else {
                        $cfields .= "\n".'<GenericFields name="'.$key.'" dataType="'.$contactDVDefaults[$key]['datatype'].'"><DataValue><' . $contactDVDefaults[$key]['datavalue'] . '>' . $val . '</'.ucfirst($contactDVDefaults[$key]['datavalue']) . '></DataValue></GenericFields>';
                    }
                }
            }
            $cfields .= '</ObjectValue> </DataValue> </GenericFields> </ns4:CustomFields>';
        }
        return $cfields;
    }

    function contact_action_closing() {
        $content =  '</v1:RNObjects>
                     <ns7:ProcessingOptions>
                     <ns7:SuppressExternalEvents>true</ns7:SuppressExternalEvents>
                     <ns7:SuppressRules>true</ns7:SuppressRules>
                     </ns7:ProcessingOptions>';
        if ($this->contactAction == 'update') {
            $content .= '</ns7:Update>';
        } else {
            $content .= '</ns7:Create>';
        }
        return $content;
    }
    function rn_object() {
        // check contact_id has been set
        if (!empty($this->contactFields['contact_id']) && $this->contactFields['contact_id'] > 0) {
            $this->contactAction = 'update';
        } else {
            $this->contactAction = 'add';
        }

        $fields = '';
        $fields .= $this->contact_action();
        $fields .= $this->address_structure();
        $fields .= $this->custom_fields();
        $fields .= $this->emails_structure();
        $fields .= $this->globalOptIn();
        $fields .= $this->names();
        $fields .= $this->notes();
        $fields .= $this->organization();
        $fields .= $this->phones();
        $fields .= $this->contact_action_closing();

        return $fields;
    }

    function get_contact_by_email_query () {

        if ($this->field_exist('email')) {
            $query  = '<ns7:QueryCSV xmlns:ns7="urn:messages.ws.rightnow.com/v1_2">';
            // set query to search for contact id from contact primary email
            $query .= "<ns7:Query>SELECT ID FROM Contact WHERE Emails.Address = '". $this->contactFields['email'] ."' AND (Emails.AddressType = 0 OR Emails.AddressType = 1 OR Emails.AddressType = 2)</ns7:Query>";
            $query .= '</ns7:QueryCSV>';
        }
        return $query;
    }

    function get_primary_email_query($contactId) {

        if ($this->field_exist('email')) {
            $query  = '<ns7:QueryCSV xmlns:ns7="urn:messages.ws.rightnow.com/v1_2">';
            // set query to search for contact id from contact primary email
            $query .= "<ns7:Query>SELECT Emails.EmailList.Address FROM Contact WHERE ID ='". $contactId ."'</ns7:Query>";
            $query .= '</ns7:QueryCSV>';
        }
        return $query;
    }
}