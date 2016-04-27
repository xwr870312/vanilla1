<?php

/**
 * Class ReportSoapStructure
 *
 * Construct SOAP XML structure to for user's report
 */
class ReportSoapStructure {

    private $reportFields;

    function __construct($reportFields) {
        if (is_array($reportFields)) {
            $this->reportFields = $reportFields;
        }
    }

    function report_body() {
            return '<ns7:RunAnalyticsReport xmlns:ns7="urn:messages.ws.rightnow.com/v1_2">'.
                        '<ns7:AnalyticsReport xmlns:ns4="urn:objects.ws.rightnow.com/v1_2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="ns4:AnalyticsReport">'.
                            '<ID xmlns="urn:base.ws.rightnow.com/v1_2" id="' . $this->reportFields['report_id'] . '" />'.
                            '<ns4:Filters xsi:type="ns4:AnalyticsReportFilter">'.
                                '<ns4:Name>incidents.c$campaign_lvl1</ns4:Name>'.
                                '<ns4:Values>'.$this->reportFields['campaign_lvl1'].'</ns4:Values>'.
                            '</ns4:Filters>'.
                            '<ns4:Filters xsi:type="ns4:AnalyticsReportFilter">'.
                                '<ns4:Name>incidents.c$campaign_lvl1</ns4:Name>'.
                                '<ns4:Values>'.$this->reportFields['campaign_lvl1'].'</ns4:Values>'.
                            '</ns4:Filters>'.
                        '</ns7:AnalyticsReport>'.
                   '</ns7:RunAnalyticsReport>';
    }

    function rn_object() {

        $fields = '';
        $fields .= $this->report_body();

        return $fields;
    }
}