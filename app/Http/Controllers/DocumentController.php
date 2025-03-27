<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Http\Downloader;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia; 
class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255', // Vous avez probablement besoin d'un titre
            'document' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt', // Validation des types de fichier
        ]);

        if ($request->hasFile('document')) {
            $documentName = time() . '_' . $request->file('document')->getClientOriginalName();
            $documentPath = $request->file('document')->storeAs('documents', $documentName, 'public');
        } else {
            return response()->json(['message' => 'Aucun fichier téléchargé'], 400);
        }

        $document = Document::create([
            'titre' => $request->titre,
            'url' => Storage::url($documentPath),
        ]);

        return response()->json(['message' => 'Document téléchargé avec succès', 'document' => $document]);
    }
    

    
    public function index()
    {
        // Récupérer tous les documents
        $documents= Document::all();
    
        // Retourner la vue avec les documents
        return Inertia::render('DocumentList', [
            'documents' => $documents->toArray(), // Conversion en tableau
        ]);
    }
    
    

 /*   
public function showFiles()
{
    $data = Document::all(); // Retrieve all documents from the database
    return view('documents.list', compact('data')); // Pass the data to the view
}*/


   

public function download($url)
{
    // Construct the full file path
    $filePath = public_path('documents/' . $url);

    // If file exists, return it for download
    if (file_exists($filePath)) {
        return Response::download($filePath);
    } else {
        // If file doesn't exist, return an error
        return response()->json(['error' => 'File not found'], 404);
    }
}


    
}
