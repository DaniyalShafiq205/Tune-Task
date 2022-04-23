<?php

namespace App\Http\Controllers;

use App\Interfaces\DashboardRepositoryInterface;
use App\Models\Logs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private DashboardRepositoryInterface $dashboardRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getChartData()
    {
        $chartData=$this->dashboardRepository->getChartData();

        return  response()->json(
            [
                'data' => json_encode($chartData->groupBy('user_id'))
            ]
        );
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getUserData(Request $request)
    {
        $usersData=$this->dashboardRepository->getUserData($request);

        return  response()->json(
            [
                'data' => json_encode($usersData)
            ]
        );
    }
}
