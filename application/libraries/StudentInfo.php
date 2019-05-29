<?php

class StudentInfo
{
    private $ServiceHost = 'http://web3.phuket.psu.ac.th:8000';

    public function getStudentInfo($StudentID)
    {
        $url = $this->ServiceHost . '/api/student';
        $headers = array(
            'Content-Type: application/json',
        );
        $data = array(
            'query' => 'query StudentID($STUDENT_ID : String)
                 {getStudentInfo(STUDENT_ID:$STUDENT_ID){
                    STUDENT_ID
                    TITLE_NAME_THAI
		            TITLE_NAME_ENG
                    STUD_NAME_THAI
                    STUD_SNAME_THAI
                    STUD_NAME_ENG
                    STUD_SNAME_ENG
                    STUDY_STATUS
                    FAC_ID
                    DEPT_ID
                    MAJOR_ID
                    MAJOR_NAME_THAI
                    MAJOR_NAME_ENG
                    MAJOR_SHORT_THAI
                    MAJOR_SHORT_ENG
                    FAC_NAME_THAI
                    FAC_NAME_ENG
                    CITIZEN_ID
                    STUD_BIRTH_DATE
                    STUDY_LEVEL_ID
            }}',
            'variables' => array(
                'STUDENT_ID' => $StudentID,
            ),
        );

        $response = $this->getDataFromGraphQL($url, $data);

        return isset($response['data']['getStudentInfo'][0]) ? $response['data']['getStudentInfo'][0] : '';
    }

    public function getStudentGPA($StudentID)
    {
        $url = $this->ServiceHost . '/api/student';
        $headers = array(
            'Content-Type: application/json',
        );
        $data = array(
            'query' => 'query StudentID($STUDENT_ID : String)
                 {getStudentGPA(STUDENT_ID:$STUDENT_ID){
                    STUDENT_ID
                    EDU_TERM
		            EDU_YEAR
		            SEM_GPA
		            CUM_GPA
                    STATUS
                    GRADE_STATUS_DESC
                    GRADE_STATE
            }}',
            'variables' => array(
                'STUDENT_ID' => $StudentID,
            ),
        );

        $response = $this->getDataFromGraphQL($url, $data);

        return isset($response['data']['getStudentGPA'][0]) ? $response['data']['getStudentGPA'][0] : '';
    }

    private function getDataFromGraphQL($url, $data)
    {
        $headers = array(
            'Content-Type: application/json',
        );
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result = curl_exec($curl_handle);

        if (!$result) {die("Connection Failure");}
        $response = json_decode($result, true);

        return $response;
    }
}
