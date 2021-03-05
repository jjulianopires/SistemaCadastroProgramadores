<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use Exception;

class CandidatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Candidato::all();
    }

    /**
     * Store the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // $tec = array('java', 'php', 'javascript');
        // return json_encode($tec);

        $validator = $this->getValidationFactory()
            ->make($req->all(), [
                'nome' => 'required',
                'email' => 'required|email',
                'idade' => 'required|numeric|min:5|max:100',
                'linkedin' => 'required|url',
                'tecnologias' => 'required'
            ], [
                'nome.required' => 'O campo nome é obrigatório.',
                'email.required' => 'O campo e-mail é obrigatório.',
                'idade.required' => 'O campo idade é obrigatório.',
                'linkedin.required' => 'O campo URL linkedin é obrigatório.',
                'tecnologias.required' => 'Selecione pelo menos uma tecnologia.',

                'email.email' => 'O e-mail digitado é inválido.',
                'idade.numeric' => 'A idade digitada deve ser numérica.',
                'linkedin.url' => 'A URL digitada possui um formato inválido.',

                'idade.max' => 'A idade máxima são 100 anos.',
                'idade.min' => 'A idade máxima são 5 anos.',
            ]);

        if ($validator->fails()) {
            $mensagem = $validator->errors()->first();
            return ($mensagem);
        }

        $dados = $req->all();
        $nome = $dados['nome'];
        $email = $dados['email'];
        $idade = $dados['idade'];
        $linkedin = $dados['linkedin'];
        $tecnologias = $dados['tecnologias'];
        $lista = "";
        $tamanhoArray = count($dados['tecnologias']);

        for ($i = 0; $i < $tamanhoArray; $i++) {
            if ($i == 0) {
                $lista = $tecnologias[0];
            } else {
                $lista = $lista . ", " . $tecnologias[$i];
            }
        }

        $candidato = array(
            "nome" => "$nome",
            "email" => "$email",
            "idade" => "$idade",
            "linkedin" => "$linkedin",
            "tecnologias" => "$lista"
        );

        try {
            $candidatoCriado = Candidato::create($candidato);
            return response()->json($candidatoCriado, 200);
        } catch (Exception $e) {
            return "Falha de conexão com o banco";
        }
    }

    public function delete(Candidato $id)
    {
    }

    public function update(Request $req)
    {
    }

    public function show(Candidato $id)
    {
    }
}
