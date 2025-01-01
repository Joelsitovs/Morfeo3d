<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validar el archivo
        $request->validate([
            'file' => 'required'
        ]);
    
        // Verifica si el archivo fue cargado correctamente
        if ($request->hasFile('file')) {
            // Obtener el archivo
            $file = $request->file('file');
    
            // Generar un nombre único para el archivo y guardarlo
            $path = $file->store('uploads', 'public');
    
            // Realizar cualquier procesamiento adicional
            // Guardar el archibo
            // ...
    
            return response()->json([
                'message' => 'Archivo subido correctamente',
                'file_path' => $path
            ]);
        } else {
            return response()->json([
                'message' => 'No se ha cargado ningún archivo'
            ], 400);
        }
    }
    
}