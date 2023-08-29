<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Register extends Controller
{
 
    public function save()
    {
        //include helper form
        // helper(['form']);
        //set rules validation form
        // $rules = [
        //     'username'      => 'required|min_length[3]|max_length[20]',
        //     'namaadmin'      => 'required|min_length[3]|max_length[100]',
        //     'email'         => 'required|min_length[6]|max_length[100]|valid_email|is_unique[admin.nama_admin]',
        //     'password'      => 'required|min_length[6]|max_length[200]',
        //     // 'confpassword'  => 'matches[password]'
        // ];
         
        // if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'username'     => $this->request->getVar('username'),
                'name'     => $this->request->getVar('name'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            // print_r($data);
            return redirect()->to('/auth-login');
        // }else{
        //     $data['validation'] = $this->validator;
        //     return redirect()->to('/auth-register');
        // }
         
    }
 
}