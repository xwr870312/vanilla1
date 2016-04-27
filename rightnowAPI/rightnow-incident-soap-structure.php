<?php

/**
 * Class IncidentSoapStructure
 *
 * Construct SOAP XML structure to for user's incident
 */
class IncidentSoapStructure {
    private $incidentFields;
    private $incidentAction = '';

    function __construct($incidentFields) {
        if (is_array($incidentFields)) {
            $this->incidentFields = $incidentFields;
        }
    }

    function field_exist($fieldname) {
        if (!empty($fieldname) && array_key_exists($fieldname, $this->incidentFields) &&
            !empty($this->incidentFields[$fieldname])) {
            return true;
        }
        return false;
    }

    function set_contact_id($fieldvalue) {
        if (!empty($fieldvalue)) {
            $this->incidentFields['contact_id'] = $fieldvalue;
        }
    }

    function incident_action() {
        if ($this->field_exist('incident_id')) {
            $content = '<ns7:Update xmlns:ns7="urn:messages.ws.rightnow.com/v1_2">';
        } else {
            $content = '<ns7:Create xmlns:ns7="urn:messages.ws.rightnow.com/v1_2">';
        }
        $content .= '<ns7:RNObjects xmlns:ns4="urn:objects.ws.rightnow.com/v1_2" ';
        $content .= 'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="ns4:Incident">';

        return $content;
    }

    function existing_incident() {
        if ($this->incidentAction == 'update' && $this->field_exist('existing_incident')) {
            return '<ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['existing_incident'] . '" />';
        }
        return '';
    }

    function channel() {
        if ($this->field_exist('channel')) {
            return '<ns4:Channel><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['channel'] . '" /></ns4:Channel>';
        }
    }

    function disposition() {
        if ($this->field_exist('disposition')) {
            return '<ns4:Disposition><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['disposition'] . '" /></ns4:Disposition>';
        }
    }
    function incident_queue() {
        if ($this->field_exist('queue')) {
            return '<ns4:Queue><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['queue'] . '" /></ns4:Queue>';
        }
    }


    function custom_fields()  {
        $cfields = '';
        $incidentDVDefaults = incident_custom_fields_default();
        if ($this->field_exist('custom_fields') && is_array($this->incidentFields["custom_fields"])) {
            $cfields .= '<ns4:CustomFields><ObjectType xmlns="urn:generic.ws.rightnow.com/v1_2"><Namespace xsi:nil="true"/>';
            $cfields .= '<TypeName>IncidentsCustomFields</TypeName></ObjectType><GenericFields name="c" dataType="OBJECT" xmlns="urn:generic.ws.rightnow.com/v1_2">';
            $cfields .= '<DataValue><ObjectValue><ObjectType><Namespace xsi:nil="true"/><TypeName>IncidentsCustomFields</TypeName></ObjectType>';

            foreach($this->incidentFields["custom_fields"] as $key => $val) {

                if (array_key_exists($key, $incidentDVDefaults) && $val != '') {
                    // convert boolean data value
                    if (strtolower($incidentDVDefaults[$key]['datatype']) == 'boolean' && $val > 0) {
                        $val = 1;
                    }

                    if(array_key_exists('xmlns', $incidentDVDefaults[$key])) {
                        $cfields .= "\n".'<GenericFields name="'.$key.'" dataType="'.$incidentDVDefaults[$key]['datatype'].'"><DataValue> <NamedIDValue><ID id="' . $val . '" xmlns="'.$incidentDVDefaults[$key]['xmlns'].'"/></NamedIDValue> </DataValue> </GenericFields>';
                    } else {
                        $cfields .= "\n".'<GenericFields name="'.$key.'" dataType="'.$incidentDVDefaults[$key]['datatype'].'"><DataValue><' . $incidentDVDefaults[$key]['datavalue'] . '>' . $val . '</'.ucfirst($incidentDVDefaults[$key]['datavalue']) . '></DataValue></GenericFields>';
                    }
                }
            }
            $cfields .= '</ObjectValue></DataValue></GenericFields></ns4:CustomFields>';
        }

        return $cfields;
    }

    function status() {
        if ($this->field_exist('status')) {
            return '<ns4:StatusWithType><ns4:Status><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['status'] . '" /></ns4:Status></ns4:StatusWithType>';
        } else {
            return '<ns4:StatusWithType><ns4:Status><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="2" /></ns4:Status></ns4:StatusWithType>';
        }
    }

    function subject() {
        if($this->field_exist('subject')) {
            return '<ns4:Subject>' . $this->incidentFields['subject'] . '</ns4:Subject>';
        }
    }

    function threadList() {
        $thread = '';
        if($this->field_exist('thread')) {
            $thread = '<ns4:Threads><ns4:ThreadList action="add">';
            if($this->field_exist('threadChannel')) {
                $thread .= '<ns4:Channel><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['threadChannel'] . '" /></ns4:Channel>';
            }
            if ($this->field_exist('threadEntryType')) {
                $thread .= '<ns4:EntryType><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['threadEntryType'] . '" /></ns4:EntryType>';
            } else {
                $thread .= '<ns4:EntryType><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="1" /></ns4:EntryType>';
            }
            $thread .= '<ns4:Text>' . $this->incidentFields['thread'] . '</ns4:Text>';

            $thread .= '</ns4:ThreadList></ns4:Threads>';
        }
        return $thread;
    }

    function incident_interface() {
        if ($this->field_exist('interface')) {
            return '<ns4:Interface action="add"><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['interface'] . '" /></ns4:Interface>';
        }
    }

    function primary_contact() {
        return '<ns4:PrimaryContact><ns4:Contact><ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->incidentFields['contact_id'] . '" /></ns4:Contact></ns4:PrimaryContact>';
    }

    function incident_action_closing() {
        $content = '</ns7:RNObjects>
                <ns7:ProcessingOptions>
                <ns7:SuppressExternalEvents>false</ns7:SuppressExternalEvents>
                <ns7:SuppressRules>false</ns7:SuppressRules>
                </ns7:ProcessingOptions>';
        if ($this->incidentAction == 'update') {
            $content .= '</ns7:Update>';
        } else {
            $content .= '</ns7:Create>';
        }
        return $content;
    }
    function rn_object () {
        $incidentfielddef = incident_fields_default();

        // check incident_id has been set
        if (!empty($this->incidentFields['incident_id']) && $this->incidentFields['incident_id'] > 0) {
            $this->incidentAction = 'update';
        } else {
            $this->incidentAction = 'add';
        }

        $fields  = '';

        $fields .= $this->incident_action(). "\n";
        $fields .= $this->existing_incident(). "\n";
        $fields .= $this->channel();
        $fields .= $this->custom_fields(). "\n";
        $fields .= $this->disposition();
        $fields .= $this->incident_interface(). "\n";
        $fields .= $this->primary_contact(). "\n";
        $fields .= $this->incident_queue();
        $fields .= $this->status(). "\n";
        $fields .= $this->subject(). "\n";
        $fields .= $this->threadList(). "\n";
        $fields .= $this->incident_action_closing(). "\n";

        return $fields;
    }

}