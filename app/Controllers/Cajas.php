<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;

class Cajas extends BaseController
{
    protected $cajas;
    protected $reglas;

    public function __construct()
    {
        $this->cajas = new CajasModel();
        helper(['form']);

        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],
            'nombre_corto' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ]
        ];
    }

    public function index($activo = 1)
    {
        $cajas = $this->cajas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Cajas', 'datos' => $cajas];

        echo view('header');
        echo view('cajas/cajas', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $cajas = $this->cajas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Cajas eliminadas', 'datos' => $cajas];

        echo view('header');
        echo view('cajas/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $data = ['titulo' => 'Agregar unidad'];
        echo view('header');
        echo view('cajas/nuevo', $data);
        echo view('footer');
    }


    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->cajas->save(
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'nombre_corto' => $this->request->getPost('nombre_corto')
                ]
            );
            return redirect()->to(base_url() . '/cajas');
        } else {
            $data = ['titulo' => 'Agregar unidad', 'validation' => $this->validator];
            echo view('header');
            echo view('cajas/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        $unidad = $this->cajas->where('id', $id)->first();
        
        if ($valid != null) {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];
        }

        echo view('header');
        echo view('cajas/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->cajas->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'nombre_corto' => $this->request->getPost('nombre_corto')
                ]
            );
            return redirect()->to(base_url() . '/cajas');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->cajas->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/cajas');
    }

    public function reingresar($id)
    {
        $this->cajas->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/cajas');
    }
}
