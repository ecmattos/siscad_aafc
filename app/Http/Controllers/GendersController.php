<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\GenderRepository;

class GendersController extends Controller
{
    private $genderRepository;

    public function __construct(GenderRepository $genderRepository)
    {
        $this->genderRepository = $genderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $genders = $this->genderRepository->allGenders();
        #dd($genders);
        return view('genders.index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('genders-create');

        return view('genders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\GenderRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $gender = $this->genderRepository->storeGender($input);

        return redirect('genders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('genders-show');

        $gender = $this->genderRepository->findGenderById($id);
        $logs = $gender->revisionHistory;

        return view('genders.show', compact('gender', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('genders-edit');

        $gender = $this->genderRepository->findGenderById($id);
        
        return view('genders.edit', compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\GenderRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $gender = $this->genderRepository->findGenderById($id);
        $gender->update($input);

        return redirect('genders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('genders-destroy');

        $this->genderRepository->findGenderById($id)->delete();

        return redirect('genders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->genderRepository->withTrashed()->findGenderById($id)->restore();

        return redirect('genders');
    }
}
