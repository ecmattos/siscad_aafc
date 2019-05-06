<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\PatrimonialRequestRepository;
use SisCad\Repositories\MemberRepository;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    private $patrimonialRepository;
    private $patrimonial_requesRepository;
    private $memberRepository;

    public function __construct(
            PatrimonialRepository $patrimonialRepository,
            PatrimonialRequestRepository $patrimonial_requestRepository,
            MemberRepository $memberRepository
        )
    {
        $this->middleware('auth');

        $this->patrimonialRepository = $patrimonialRepository;
        $this->patrimonial_requestRepository = $patrimonial_requestRepository;
        $this->memberRepository = $memberRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nowMonthF = Carbon::now()->format('F');
        $nowMonthm = Carbon::now()->format('m');

        $plan1_last_members = $this->memberRepository->lastMembersByPlanStatusLimit(1, 2, 8);
        $plan2_last_members = $this->memberRepository->lastMembersByPlanStatusLimit(2, 2, 8);
        $plan3_last_members = $this->memberRepository->lastMembersByPlanStatusLimit(3, 2, 8);

        $birthday_last_members = $this->memberRepository->lastMembersBirthdaysByStatusMonthLimit(2, $nowMonthm, 8);

        $last_patrimonials = $this->patrimonialRepository->lastPatrimonialsByInvoiceDate(4);

        $last_patrimonials_requests = $this->patrimonial_requestRepository->lastPatrimonialRequestByDateLimit(8);

        return view('home', compact('nowMonthF', 'plan1_last_members', 'plan2_last_members', 'plan3_last_members', 'birthday_last_members', 'last_patrimonials', 'last_patrimonials_requests'));
    }
}
