SHOW ALL DATA
====================================
public function show(){
        $data = [];
        $data['title'] = "User List";
        $model = new UserModel();
        $data['details'] = $model->findAll();
        return view('pages/view',$data);
}

DELETE DATA
==========================
 public function delete($id){
        $session = \Config\Services::session();  
        $data = [];
        $data['title'] = "Delete User";
        $model = new UserModel();
        $model->delete($id);
        $session->setFlashdata('message', 'Record Deleted Successfully!');
        return redirect()->route('view');
    }
    
    
 SHOW ID WISE DATA
 ===============================
 public function edit($id){
        $data = [];
        $data['title'] = "Edit User";
        $model = new UserModel();
        $data['row']=$model->where('id',$id)->first();
        return view('pages/edit',$data);;
  }
  
 UPDATE ID WISE DATA
 ===================================
 public function updatedata(){
        $session = \Config\Services::session();  
        $data = [];
        $data['title'] = "Update User";
        $model = new UserModel();
        $id = $this->request->getVar('id');
        $model->update($id,[
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'phone'  => $this->request->getVar('phone')
        ]);
        $session->setFlashdata('message', 'Data Updates Successfully!');
        return redirect()->route('view');
    }
