<?php

namespace App\DataTables;

use App\Models\Photo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Str;

class PhotoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->addColumn('photo_path', function($data){
            $contains = Str::contains($data->photo_path, '/');
            if($contains) $src = $data->photo_path;
            else $src = asset('images/'.$data->photo_path);
            
            return '<img src="'.$src.'" width="40" height="40" alt="image" />';
        })
        ->addColumn('action', 'photos.datatables_actions')
        ->rawColumns(['photo_path', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Photo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Photo $model)
    {
        return $model->newQuery()->with(['album']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'photo_path' => new \Yajra\DataTables\Html\Column(['title' => 'Photo', 'data' => 'photo_path', 'name' => 'id']),
            'photo_name',
            'photo_description',           
            
            //'photo_path' => new \Yajra\DataTables\Html\Column(['title' => 'Photo', 'data' => <img src="$photo_path'" width="30" alt="Product image" />, 'name' => 'photo_name']),
            // 'author_name' => new \Yajra\DataTables\Html\Column(['title' => 'Author Name', 'data' => 'author.name', 'name' => 'author.name'])
            //'id' => new \Yajra\DataTables\Html\Column(['title' => 'TIGEE', 'data' => 'id', 'name' => 'album.id']),     
            'album_id' => new \Yajra\DataTables\Html\Column(['title' => 'Album', 'data' => 'album.album_name', 'name' => 'album.album_name'])
            //'album_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'photos_datatable_' . time();
    }
}
