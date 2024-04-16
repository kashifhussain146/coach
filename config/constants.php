<?php

return [
    'EVENT_TYPE' => [
        1 => 'Notification (i.e. just a notice at the top of the roster)', /* will change it after marketplace categories */
        2 => "For Rostering (i.e. you'll be rostering specifically to this event)", /* will change it after marketplace categories */
    ],
    'AWARD' => [
        0 => 'None', /* will change it after marketplace categories */
        2 => "SCHADS", /* will change it after marketplace categories */
    ],
    'BREAK' => [
        0 => 'Breaks Do NOT Deduct From Total Hours', /* will change it after marketplace categories */
        2 => "Breaks Deduct From Total Hours", /* will change it after marketplace categories */
    ],
    'RELATED' => [
        1 => 'Account', /* will change it after marketplace categories */
        2 => "Case Files", /* will change it after marketplace categories */
        3 => "Task", /* will change it after marketplace categories */
        4 => "Opportunity", /* will change it after marketplace categories */
        5 => "Quoted Line Item", /* will change it after marketplace categories */
        6 => "Quote", /* will change it after marketplace categories */
        7 => "Bugs", /* will change it after marketplace categories */
        8 => "Case", /* will change it after marketplace categories */
        9 => "Lead", /* will change it after marketplace categories */
        10 => "Project", /* will change it after marketplace categories */
        11 => "Project Task", /* will change it after marketplace categories */
        12 => "Target", /* will change it after marketplace categories */
        13 => "Knowledge Base", /* will change it after marketplace categories */
        14 => "Note", /* will change it after marketplace categories */
    ],
    'COLOR' => [
        null => 'class1', /* will change it after marketplace categories */
        0 => 'class1', /* will change it after marketplace categories */
        1 => "class2", /* will change it after marketplace categories */
        2 => "class3", /* will change it after marketplace categories */
        3 => "class4", /* will change it after marketplace categories */
        4 => "class5", /* will change it after marketplace categories */
        5 => "class5", /* will change it after marketplace categories */
        6 => "class6", /* will change it after marketplace categories */
    ],
    'LOCATION_TYPE' => [
        'General' => 'General', /* will change it after marketplace categories */
        "NSW Licenced" => "NSW Licenced", /* will change it after marketplace categories */
        "ACT Licenced" => "ACT Licenced", /* will change it after marketplace categories */
        "QLD Licenced" => "QLD Licenced", /* will change it after marketplace categories */
        "SA Licenced" => "SA Licenced", /* will change it after marketplace categories */
        "TAS Licenced" => "TAS Licenced", /* will change it after marketplace categories */
        "VIC Licenced" => "VIC Licenced", /* will change it after marketplace categories */
        "WA Licenced" => "WA Licenced", /* will change it after marketplace categories */
    ],
    'message_template_types' => [
        'shift_assign' => 'Shift assign to personnel',
        'Shift_start_late' => 'Start Late Shift',
        'shift_end_late' => 'End Late Shift',
        'shift_declined' => 'Shift Declined',
        'shift_cancelled' => 'Shift Cancelled',
        'account_confirmation' => 'Account Confirmation',
        'shift_bid_create' => 'Shift Bid Create',
        'shift_bid_filled' => 'Shift Bid Filled',
        'new_policy' => 'New Policy',
    ],
    'email_template_types' => [
        'account_approval_needed' => 'Account Approval Needed',
        'account_confirmation' => 'Account Confirmation',
        'personnel_leave_request'=>'Personnel Leave Request',
        'reset_password' => 'Reset Password',
        'inquery' => 'Inquiry',
        'password_changed' => 'Password Change',
        'leave_request_managers' => 'Leave request to shift managers',
        'leave_request_admin' => 'Leave Request Admin Alert',
        'leave_request_approve' => 'Leave Request Approve',
        'leave_request_deny' => 'Leave Request Deny',
        'contractor_timesheet_approved' => 'Contractor Approve Timesheet',
        'personal_timesheet_approved' => 'Personnel Approve Timesheet',
        'Staff_timesheet_approved' => 'Staff Approve Timesheet',
        'Payrol_timesheet_approved' => 'payrol Approve Timesheet',
        'location_timesheet_approved' => 'Location Approve Timesheet',
        'send_message' => 'Send Message',
        'send_improvement_message' => 'Send Improvement Message',
        'incident_report_email' => 'Incident Report Email',
        'SendIncedentDamageReport' => 'Send Incident Damage Report',
        'shift_assign_roster' => 'Roster commited',
        'shift_assign' => 'Shift assign to personnel',
        'shift_accept' => 'Shift Accept',
        'shift_reject' => 'Shift Reject',
        'shift_deleted' => 'Shift Deleted',
        'appoinment_invitation' => 'Appoinment Invitation',
        'shift_cancelled' => 'Shift Cancelled',
        'roster_committed' => 'Roster Committed',
        'shift_resolve_dispute' => 'Shift Resolve Dispute',
        'inactive_user_rostering'=> 'User inactive send an email to rostering',
        'LicenceCheckIssue' => 'Licence Check Issue Admin Alert',
        
        // @Note: Email notification for this type has been already depreciated
        'medication_count' => 'Medication count',

        'reportable_incident' => 'Reportable Incident',
        'behaviours_of_concern' => 'Behaviours of concern',
        'injury_report' => 'Injury Report',
        'licence_expired_reminder_30_days' => 'Licence Expired Reminder 30 Days',
        'licence_expired_reminder_15_days' => 'Licence Expired Reminder 15 Days',
        'course_expired_reminder_30_days' => 'Course Expired Reminder 30 Days',
        'licence_expired' => 'Licence Expired',
        'Shift_start_late' => 'Start Late Shift',
        'shift_end_late' => 'End Late Shift',
        'Training Paased For Admin'=>'training_passed_for_admin',
        'Training Paased For User'=>'training_passed_for_user',

        // @Note: Email notification for this type has been already depreciated
        'medication_dose_exceed'=>'medication_dose_exceed',

        'document_expired_reminder_84_days' => 'Document Expired Reminder 84 Days',
        'car_code_email' => 'Car code email',
        'risk_assessment_completion' => 'Risk Assessment Completion',
        'supported_living_selfcare_checklist' => 'Supported living selfcare checklist',
        'Induction Paased For Admin'=>'induction_passed_for_admin',
        'Induction Paased For User'=>'induction_passed_for_user',
        'User Edit Send Email'=>'user_edit_email',
        'on_call_report_email'=>'On Call Send Report Mail',
        'visitor_sign_out_email'=>'Visitor sign out mail',
        'mail_for_personnal_induction'=>'New Induction for Support Workers("Buddy & Inductee")',
    ],
    'licence_types' => [
        "Security Licence" => "Security Licence",
        "Security Licence Licensed" => "Security Licence for Licensed Venues (note: This will warn if there isn't a First Aid and RSA)",
        "Crowd Control Licence" => "Crowd Control Licence",
        "RSA" => "RSA",
        "RCG" => "RCG",
        "RSA/RCG" => "RSA/RCG",
        "WWCC" => "WWCC",
        "Drivers Licence" => "Drivers Licence (please note the class, state &amp; number)",
        "Crim Check" => "Crim Check",
        "PART" => "PART Training",
        "First Aid" => "First Aid",
        "CPR" => "CPR",
        "Traffic Controller" => "Traffic Controller",
        "Child Safe Certificate" => "Child Safe Certificate",
        "Kanangra CRC" => "Kanangra CRC",
        "Induction" => "Induction",
        "Other" => "Other"
    ],

    'minor_incidents' => [
        "1" => "Refuse Entry",
        "2" => "Refuse Service",
        "3" => "Theft",
        "4" => "Malicious Complaint",
        "5" => "Complaint",
        "6" => "Minors",
        "7" => "Self Exclusion",
        "8" => "Gaming",
        "9" => "Approaching Intoxicated",
        "10" => "Suspect Intoxicated",
        "11" => "Inappropriate Behaviour",
        "12" => "Confiscated Item (detail item in Summary)",
        "13" => "Other",
    ],
    'serious_incidents' => [
        "1" => "Violence - Brawl/Affray",
        "2" => "Violence - Glassing",
        "3" => "Anti-Social Behaviour",
        "4" => "Asked to Leave",
        "5" => "Injury/Medical Assistance",
        "6" => "Suspected Drug Use    ",
        "7" => "Behaving Irrationally",
        "8" => "Prohibited Item (detail item in Summary)",
        "9" => "Failure to Comply",
        "10"=> "Security Guard",
        "11"=> "RSA Team Member",
    ],
    'actions' => [
        "1" => "Patron Asked to Leave",
        "2" => "Patron refused entry",
        "3" => "Patron refused service",
        "4" => "First Aid Treatment Supplied",
        "5" => "Ambulance Attended",
        "6" => "Security Attended",
        "7" => "Police Called by Venue Staff",
        "8" => "Police Involved",
        "9" => "Fail to Quit Notice Issued",
        "10" => "Crime Scene Preserved",
        "11" => "Police/Regulatory Inspection",
        "12" => "Other",
    ],

    'DOCUMENT_TYPE' => [
        "HR" => "HR",
        "Clinical" => "Clinical",
        "ESS Operations" => "ESS Operations",
        "Security Operations" => "Security Operations",
    ],
    'DOCUMENT_SUB_TYPE' => [
        "Organisational" => "Organisational",
        "Location" => "Location",
        "Participant specific" => "Participant specific",
    ],
    'NOTE_TYPE' => [
        "0" => ["title"=>"Asleep",          "color"=>"#8e8a8a", "border"=>"#cccccc", "textColor"=>"#000000"],
        "1" => ["title"=>"Happy",           "color"=>"#f029e0", "border"=>"#f029e0", "textColor"=>"#ffffff"],
        "2" => ["title"=>"Calm",            "color"=>"#2cd253", "border"=>"#2cd253", "textColor"=>"#ffffff"],
        "3" => ["title"=>"Agitated",        "color"=>"#fff601", "border"=>"#fff601", "textColor"=>"#000000"],
        "4" => ["title"=>"PRN",             "color"=>"#8a2621", "border"=>"#8a2621", "textColor"=>"#ffffff"],
        "5" => ["title"=>"Mild Behaviour",  "color"=>"#fd020e", "border"=>"#fd020e", "textColor"=>"#ffffff"],
        "6" => ["title"=>"Severe Outburst", "color"=>"#000000", "border"=>"#000000", "textColor"=>"#ffffff"],

    ],
    'DIRECTION' => [
        "" => "Select",
        "1" => "Inbound",
        "2" => "Outbound",
        "3" => "Site",
        "4" => "Oncall",
        "5" => "Office",
    ],
    'RELEATED' => [
        "" => "Select",
        "1" => "Operations",
        "2" => "Clinical",
        "3" => "Programs",
        "4" => "Other"
    ],
    'multiple_checkbox_for_notes' => [
        "1" => "Use of Redirection to a preferred topic or activity",
        "2" => "Use of Self-Soothing techniques",
        "3" => "Use of Co-regulation techniques",
        "4" => "Use of Reflective Listening",
        "5" => "Discussion of the Pro’s and Con’s to help the Participant Problem solve",
        "6" => "Use of Impulse control Strategies",
        "7" => "Removal of stimuli that was overstimulating the Participant",
    ],
];
