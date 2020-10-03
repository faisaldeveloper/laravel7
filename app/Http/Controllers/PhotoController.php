<?php

namespace App\Http\Controllers;

use App\DataTables\PhotoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Repositories\PhotoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use DB;

class PhotoController extends AppBaseController
{
    /** @var  PhotoRepository */
    private $photoRepository;

    public function __construct(PhotoRepository $photoRepo)
    {
        $this->photoRepository = $photoRepo;
    }

    /**
     * Display a listing of the Photo.
     *
     * @param PhotoDataTable $photoDataTable
     * @return Response
     */
    public function index(PhotoDataTable $photoDataTable)
    {
        return $photoDataTable->render('photos.index');
    }

    /**
     * Show the form for creating a new Photo.
     *
     * @return Response
     */
    public function create()
    {
        $albums = DB::table('albums')->pluck('album_name', 'id');

        return view('photos.create')->with('albums', $albums);
    }

    /**
     * Store a newly created Photo in storage.
     *
     * @param CreatePhotoRequest $request
     *
     * @return Response
     */
    public function store(CreatePhotoRequest $request)
    {
        $input = $request->all();
        
        $imageName = time().'.'.$request->photo_path->extension();
        $request->photo_path->move(public_path('images'), $imageName);

        $input['photo_path'] = $imageName;

        $photo = $this->photoRepository->create($input);

        Flash::success('Photo saved successfully.');

        return redirect(route('photos.index'));
    }

    /**
     * Display the specified Photo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified Photo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $photo = $this->photoRepository->find($id);
        $albums = DB::table('albums')->pluck('album_name', 'id');

        //print_r($albums);     exit;

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        return view('photos.edit')->with('photo', $photo)->with('albums', $albums);
    }

    /**
     * Update the specified Photo in storage.
     *
     * @param  int              $id
     * @param UpdatePhotoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhotoRequest $request)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        $photo = $this->photoRepository->update($request->all(), $id);

        Flash::success('Photo updated successfully.');

        return redirect(route('photos.index'));
    }

    /**
     * Remove the specified Photo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        $this->photoRepository->delete($id);

        Flash::success('Photo deleted successfully.');

        return redirect(route('photos.index'));
    }
}
