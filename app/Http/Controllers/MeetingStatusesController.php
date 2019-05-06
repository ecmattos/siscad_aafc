<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SisCad\Http\Requests\MeetingStatusCreateRequest;
use SisCad\Http\Requests\MeetingStatusUpdateRequest;
use SisCad\Repositories\MeetingStatusRepository;
use SisCad\Validators\MeetingStatusValidator;

/**
 * Class MeetingStatusesController.
 *
 * @package namespace SisCad\Http\Controllers;
 */
class MeetingStatusesController extends Controller
{
    /**
     * @var MeetingStatusRepository
     */
    protected $repository;

    /**
     * @var MeetingStatusValidator
     */
    protected $validator;

    /**
     * MeetingStatusesController constructor.
     *
     * @param MeetingStatusRepository $repository
     * @param MeetingStatusValidator $validator
     */
    public function __construct(MeetingStatusRepository $repository, MeetingStatusValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $meetingStatuses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $meetingStatuses,
            ]);
        }

        return view('meetingStatuses.index', compact('meetingStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MeetingStatusCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MeetingStatusCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $meetingStatus = $this->repository->create($request->all());

            $response = [
                'message' => 'MeetingStatus created.',
                'data'    => $meetingStatus->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meetingStatus = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $meetingStatus,
            ]);
        }

        return view('meetingStatuses.show', compact('meetingStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meetingStatus = $this->repository->find($id);

        return view('meetingStatuses.edit', compact('meetingStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MeetingStatusUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MeetingStatusUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $meetingStatus = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'MeetingStatus updated.',
                'data'    => $meetingStatus->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'MeetingStatus deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MeetingStatus deleted.');
    }
}
