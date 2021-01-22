<?php
class Student_Model extends CI_Model {

	function set_student_details($arr="") {
        $data=array (
            'FirstName'		=> $arr['firstname'],
            'LastName'		=> $arr['lastname'],
            'Email'		    => $arr['email'],	
            'DateOfBirth'	=> $arr['dateofbirth'],
            'Mobile'		=> $arr['mobile'],
            'Designation'	=> $arr['designation'],
            'Gender'		=> $arr['gender'],
            'Swimming'		=> $arr['swimming'],
            'Jogging'		=> $arr['jogging']	
            );
        if(!empty($arr['id'])) {
            $id = $arr['id'];
            $this->db->where('stud_id', $id);
            $flag = $this->db->update('stud_info', $data); 
            return $flag ? 2 : 0;
        } else {
            $this->db->insert('stud_info', $data);
            $flag = $this->db->insert_id();
            return $flag ? 1 : 0;
        }
    }

    function is_student_details_exist($id) {
        $this->db->where('stud_id',$id);
        $query = $this->db->get('stud_info')->row();  
        return $query; 
    }

    function delete_student_details($arr="") {
        if(!empty($arr['id'])) {
            $id = $arr['id'];
            $this->db->where('stud_id',$id);
            $flag=$this->db->delete('stud_info');
            return $flag ? 1 : 0;
        } else {
            return 2;
        }
    }

    function get_all_records() {
        $studentDetails = $this->db->get('stud_info'); 
        $output = "";
        $cnt = 1;
        foreach($studentDetails->result() as $row)
        {
            $output.='
              <tr id="'.$row->stud_id.'">
                <td>'.$cnt.'</td>
                <td>'.$row->FirstName.'</td>
                <td>'.$row->LastName.'</td>
                <td>'.$row->Email.'</td>
                <td>'.$row->DateOfBirth.'</td>
                <td>'.$row->Mobile.'</td>
                <td>'.$row->Designation.'</td>
                <td>'.$row->Gender.'</td>
                <td>'.$row->Swimming.'</td>
                <td>'.$row->Jogging.'</td>
                <td>'.$row->PostingDate.'</td>
                <td>
                  <a href="'.base_url('Student_Controller/post_student_details/' . $row->stud_id . '').'" class="btn btn-success btn-sm">edit</a>&nbsp;
                  <button type="button" class="btn btn-danger btn-sm deleteStudent">delete</button>
                </td>
              </tr>
            ';
            $cnt++;
        }        
        return $output;
    }
}