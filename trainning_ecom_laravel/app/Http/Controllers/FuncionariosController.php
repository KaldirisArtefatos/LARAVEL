<?php

namespace App\Http\Controllers;

use App\Funcionarios;
use App\Perfil;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
// use Barryvdh\DomPDF\Facade as PDF;

class FuncionariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        
        // Isto foi substituido pelo select buscando os campos da outra tabela.
        // $funcionarios = Funcionarios::query()
        //                 ->orderBy('id')
        //                 ->get();   

        // ESQUEMA PARA PAGINAÇÂO - VEJA FOOTER DO INDEX>BLADE
        $from = $request->get('from') ? $request->get('from') : 1;
        $to = $request->get('to') ? $request->get('to') : 1;
        $per_page = 2; // $request->get('per_page') ?? 10;
 

        
        // Select com JOIN -  OFFSET E LIMIT Para PAGINAR AS COISAS
        $funcionarios = DB::table('funcionarios as f')
        ->join('users', 'f.user_id', '=', 'users.id')
        ->join('perfis', 'f.perfil_id', '=', 'perfis.id')
        ->select('f.id', 'users.name as nome', 'users.email as email', 'perfis.nome as perfil')
        ->orderBy('users.name')
        ->offset($to - 1)
        ->limit($per_page)
        ->get();

        // Arrey Pagination /  Ceil arredonda pra cima  
        $pagination = [
            'total' => ceil(Funcionarios::count() / $per_page),
            'from' => $from,
            'to' => $to,
            'per_page' => $per_page
        ];





        // return view('funcionarios.index',compact('funcionarios'));
        
        // Trocou o compact e mandou o array...
        return view('funcionarios.index', ['funcionarios' => $funcionarios , 'pagination' => $pagination]);
 
 



    }

    public function create(){
        $perfis = Perfil::all();
        
        return view('funcionarios.create',compact('perfis'));
    }

    public function store(Request $request){

        //Cadastrou NO user
        DB::beginTransaction();

        $data = $request->except('_token');  // TIROU O CAMPO HIDEN DO ARRAY
        $data['password'] = Hash::make($data['password']); // Poderia utilizar o MD5, mas utilizamos o Hash.make
        $user = User::create($data);



        $funcionario = New Funcionarios();
        $funcionario->NomeMae = $request->NomeMae;
        $funcionario->NomePai = $request->NomePai;
        $funcionario->perfil_id = $request->perfil_id;   // Sempre o Nome do campo definido na view
        $funcionario->user_id = $user->id;              // Pegou do create acima...
        
        $funcionario->save();

        DB::commit();


        request()->session()->flash(
            "mensagem",
            "Funcionario Criado  {$funcionario->id}"
        );

        return redirect()->route('listar_funcionarios');


    }
    public function destroy(Request $request){
        Funcionarios::destroy($request->id);
         request()->session()
        ->flash(
            "mensagem",
            "Funcionario {$request->id} excluído com sucesso."
        );
 
        return redirect()->route('listar_funcionarios');
    }


    // Exporta em CSV

    public function csv(){
 
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="funcionarios.csv"');
 
        $funcionarios = DB::table('funcionarios as f')
            ->join('users', 'f.user_id', '=', 'users.id')
            ->join('perfis', 'f.perfil_id', '=', 'perfis.id')
            ->select('f.id', 'users.name as nome', 'users.email as email', 'perfis.nome as perfil')
            ->orderBy('users.name')
            ->get();
 
        $csvContent = '';
        foreach ($funcionarios as $funcionario) {
            $csvContent .= $funcionario->id . ';' . $funcionario->nome . ";" . $funcionario->email . ";" . $funcionario->perfil . PHP_EOL;
        }
 
        echo $csvContent;
    }
 
    public function email(Request $request)
    {
        // Acessar GMAIL, clicar na sua foto e em Private Polices
        // Canto superior direito clicar em Google Account
        // Clicar em Security (Menu lateral esquerdo)
        // Na sessão Less secure app access marcar Turn on access para ON
        // Gmail é chato, pode enviar uma mensagem para você verificar sua atividade
 
        // Veja que o modelo está na pasta views/emails/mail.blade.php
 
        //após configurar o .env todar o comando php artisan config:cache
 
        $to_name = "Kaldiris";
        $to_email = "atendimento@kaldirisartefatos.com.br";
        $data = array("name"=>"Diego Santos Rodrigues", "body" => "Email de teste Trainning");
 
        Mail::send("email.mail", $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            // ->cc("diegosr.trainning@gmail.com")
            // ->bcc("diegosr.trainning@gmail.com")
            ->subject("Email da Turma de Laravel Fevereiro/2020");
            $message->from("diegosr.trainning@gmail.com","Email Laravel - Turma Fevereiro/2020");
        });
 
        $request->session()
        ->flash(
            'mensagem',
            "Email enviado com sucesso."
        );
 
        return redirect()->route('listar_funcionarios');
 



    }


 
    // public function pdf($id){
 
    //     $funcionario = DB::table('funcionarios as f')
    //         ->join('users', 'f.user_id', '=', 'users.id')
    //         ->join('perfis', 'f.perfil_id', '=', 'perfis.id')
    //         ->select('f.id', 'users.name as nome', 'users.email as email', 'perfis.nome as perfil')
    //         ->where('f.id', '=', $id)
    //         ->get()->first();
 
    //     $pdf = PDF::loadView('pdfs.pdf', compact('funcionario'));
 
    //     return $pdf->download('funcionarios.pdf');
    // }
 








}
