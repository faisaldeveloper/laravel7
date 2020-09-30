<?php

namespace App\Http\Controllers;

use App\DataTables\AlbumDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Repositories\AlbumRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AlbumController extends AppBaseController
{
    /** @var  AlbumRepository */
    private $albumRepository;

    public function __construct(AlbumRepository $albumRepo)
    {
        $this->albumRepository = $albumRepo;
    }

    /**
     * Display a listing of the Album.
     *
     * @param AlbumDataTable $albumDataTable
     * @return Response
     */
    public function index(AlbumDataTable $albumDataTable)
    {
        return $albumDataTable->render('albums.index');
    }

    /**
     * Show the form for creating a new Album.
     *
     * @return Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created Album in storage.
     *
     * @param CreateAlbumRequest $request
     *
     * @return Response
     */
    public function store(CreateAlbumRequest $request)
    {
        $input = $request->all();

        $album = $this->albumRepository->create($input);

        Flash::success('Album saved successfully.');

        return redirect(route('albums.index'));
    }

    /**
     * Display the specified Album.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $album = $this->albumRepository->find($id);

        if (empty($album)) {
            Flash::error('Album not found');

            return redirect(route('albums.index'));
        }

        return view('albums.show')->with('album', $album);
    }

    /**
     * Show the form for editing the specified Album.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $album = $this->albumRepository->find($id);

        if (empty($album)) {
            Flash::error('Album not found');

            return redirect(route('albums.index'));
        }

        return view('albums.edit')->with('album', $album);
    }

    /**
     * Update the specified Album in storage.
     *
     * @param  int              $id
     * @param UpdateAlbumRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlbumRequest $request)
    {
        $album = $this->albumRepository->find($id);

        if (empty($album)) {
            Flash::error('Album not found');

            return redirect(route('albums.index'));
        }

        $album = $this->albumRepository->update($request->all(), $id);

        Flash::success('Album updated successfully.');

        return redirect(route('albums.index'));
    }

    /**
     * Remove the specified Album from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $album = $this->albumRepository->find($id);

        if (empty($album)) {
            Flash::error('Album not found');

            return redirect(route('albums.index'));
        }

        $this->albumRepository->delete($id);

        Flash::success('Album deleted successfully.');

        return redirect(route('albums.index'));
    }
}
