<?php

namespace App\Exports;

use App\Models\Document;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DocumentsExport implements ShouldAutoSize, FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $documents = Document::join('containers', 'containers.document_id', '=', 'documents.id')
            ->get();
        //    dd($documents);
        return view('laporan.documents', [
            'documents' => $documents
        ]);
    }
}
