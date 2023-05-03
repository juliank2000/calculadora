<?php

require_once '../Models/CalculadoraModel.php';

$controller = new CalculadoraController;

class CalculadoraController
{
// ....
    private $calculadora;

    public function __construct()
    {
        $this->calculadora = new CalculadoraModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case 2: //Ver usuario
                    self::show();
                    break;
                case 3: //Actualizar el registro 
                    self::update();
                    break;
                case 4: //Actualizar el registro 
                    self::delete();
                    break;
                default:
                    self::index();
                    break;
            }
        }
    }

    public function index()
    {
        $data = $this->calculadora->getAll();

        return $data;
    }
    //Método "store()": Este método obtiene los datos de la solicitud ($_REQUEST) para 
    // 'num_uno', 'num_dos' y 'operacion' y los guarda en un arreglo llamado "$datos".
    //  Luego, crea una nueva instancia de la clase "CalculadoraModel" y llama al método
    //   "store()" de esa clase, pasándole los datos. Si el resultado de la operación es 
    //   exitoso, redirige a una página de índice utilizando la función "header()" y la
    //    constante 'URL', y luego finaliza la ejecución con "exit()". 

    public function store()
    {
        $datos = [
            'num_uno' => $_REQUEST['num_uno'],
            'num_dos' => $_REQUEST['num_dos'],
            'operacion' => $_REQUEST['operacion']
        ];

        $result = $this->calculadora->store($datos);

        if ($result) {

            header("Location: ../Views/index.php");
            exit();
        }

        return $result;
    }

    public function delete()
    {
        $this->calculadora->delete($_REQUEST['id']);
        header("Location: ../Views/index.php");
    }

 
    public function update()
    {

        $datos = [
            'id'   => $_REQUEST['id'],
            'num_uno'   => $_REQUEST['num_uno'],
            'num_dos'   => $_REQUEST['num_dos'],
            'operacion' => $_REQUEST['operacion']
        ];

        $result = $this->calculadora->update($datos);

        if ($result) {
            header("Location:  ../Views/index.php?id=");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id = $_REQUEST['id'];
        header("Location:  ../Views/editar.php?id=".$id );
    }
}