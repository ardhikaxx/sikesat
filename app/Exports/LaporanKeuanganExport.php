<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanKeuanganExport implements FromView, ShouldAutoSize
{
    protected $viewName;
    protected $data;
    protected $tahun;
    protected $title;

    public function __construct($viewName, $data, $tahun, $title)
    {
        $this->viewName = $viewName;
        $this->data = $data;
        $this->tahun = $tahun;
        $this->title = $title;
    }

    public function view(): View
    {
        return view($this->viewName, [
            'data' => $this->data,
            'tahun' => $this->tahun,
            'title' => $this->title,
            'format' => 'excel'
        ]);
    }
}
