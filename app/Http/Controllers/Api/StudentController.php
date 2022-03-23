<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //inicia atributo interno da classe
    private $student;
   

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    //Função list all
    public function list_all()
    {
        $students = $this->student->all();

        return response()->json($students);
    }

    //Função list by id
    public function list_by_id($id)
    {
        $students = $this->student->find($id);

        return response()->json($students);
    }

    //função save student
    public function save(Request $request)
    {
        //recebe os dados do request e armazena na variavel data
        $data = $request->all();
        //efetua insert no banco e retorna para variavel student
        $student = $this->student->create($data);

        return response()->json($student);
    }

    //Função update
    public function update(Request $request)
    {
        //recebe os dados do request e armazena na variavel data
        $data = $request->all();

        //busca o usuario pelo id
        $student = $this->student->find($data['id']);
        //atualiza o student com base nos dados da variavel data
        $student->update($data);

        return response()->json($student);
    }

     //Função delete
     public function delete($id)
     {
         
         //busca o usuario pelo id
         $student = $this->student->find($id);
         //deleta o usuário
         $student->delete();
 
         return response()->json(['msg' => 'estudante excluido com Sucesso']);
     }
}
