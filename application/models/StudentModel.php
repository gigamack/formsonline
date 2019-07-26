<?php
class StudentModel extends CI_Model
{
    public $ID;
    public $TitleThai;
    public $FirstnameThai;
    public $LastnameThai;
    public $FullnameThai;
    public $TitleFullnameThai;
    public $TitleEng;
    public $FirstnameEng;
    public $LastnameEng;
    public $FullnameEng;
    public $TitleFullnameEng;
    public $FacultyThai;
    public $MajorThai;
    public $FacultyEng;
    public $MajorEng;
    public $StudyStatus;
    public $BirthDate;
    public $StudyLevel;
    public $CitizenID;
    public $StudyLevelThai;
    public $StudyLevelEng;

    public function setStudent($StudentInfo)
    {
        $this->ID = isset($StudentInfo['STUDENT_ID']) ? $StudentInfo['STUDENT_ID'] : "";
        $this->TitleThai = isset($StudentInfo['TITLE_NAME_THAI']) ? $StudentInfo['TITLE_NAME_THAI'] : "";
        $this->FirstnameThai = isset($StudentInfo['STUD_NAME_THAI']) ? $StudentInfo['STUD_NAME_THAI'] : "";
        $this->LastnameThai = isset($StudentInfo['STUD_SNAME_THAI']) ? $StudentInfo['STUD_SNAME_THAI'] : "";
        $this->FullnameThai = $this->FirstnameThai . " " . $this->LastnameThai;
        $this->TitleFullnameThai = $this->TitleThai . $this->FirstnameThai . " " . $this->LastnameThai;
        $this->TitleEng = isset($StudentInfo['TITLE_NAME_ENG']) ? $StudentInfo['TITLE_NAME_ENG'] : "";
        $this->FirstnameEng = isset($StudentInfo['STUD_NAME_ENG']) ? $StudentInfo['STUD_NAME_ENG'] : "";
        $this->LastnameEng = isset($StudentInfo['STUD_SNAME_ENG']) ? $StudentInfo['STUD_SNAME_ENG'] : "";
        $this->FullnameEng = $this->FirstnameEng . " " . $this->LastnameEng;
        $this->TitleFullnameEng = $this->TitleEng . " " . $this->FirstnameEng . " " . $this->LastnameEng;
        $this->FacultyThai = isset($StudentInfo['FAC_NAME_THAI']) ? $StudentInfo['FAC_NAME_THAI'] : "";
        $this->MajorThai = isset($StudentInfo['MAJOR_NAME_THAI']) ? $StudentInfo['MAJOR_NAME_THAI'] : "";
        $this->FacultyEng = isset($StudentInfo['FAC_NAME_ENG']) ? $StudentInfo['FAC_NAME_ENG'] : "";
        $this->MajorEng = isset($StudentInfo['MAJOR_NAME_ENG']) ? $StudentInfo['MAJOR_NAME_ENG'] : "";
        $this->StudyStatus = isset($StudentInfo['STUDY_STATUS']) ? $StudentInfo['STUDY_STATUS'] : "";
        $this->BirthDate = isset($StudentInfo['STUD_BIRTH_DATE']) ? $StudentInfo['STUD_BIRTH_DATE'] : "";
        $this->CitizenID = isset($StudentInfo['CITIZEN_ID']) ? $StudentInfo['CITIZEN_ID'] : "";
        $this->StudyLevel = isset($StudentInfo['STUDY_LEVEL_ID']) ? $StudentInfo['STUDY_LEVEL_ID'] : "";
        $this->StudyLevelThai = isset($StudentInfo['STUDY_LEVEL_NAME']) ? $StudentInfo['STUDY_LEVEL_NAME'] : "";
        $this->StudyLevelEng = isset($StudentInfo['STUDY_LEVEL_NAME_ENG']) ? $StudentInfo['STUDY_LEVEL_NAME_ENG'] : "";
    }
}
