<?php

namespace App\Repositories;

use App\Interfaces\DashboardRepositoryInterface;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function getChartData()
    {
        return Log::where(
            function ($query) {
                $query->where('type', 'conversion')
                    ->where('user_id', '<=', 15);
            }
        )->limit(1000)
        ->get();
    }

    public function getUserData($request)
    {
        $order_by = $request->order;
        $sort_by=$request->sortBy;
        $search=$request->search;
        $users = User::where(
            function ($query) {
                $query
                    ->where('id', '<=', 15);
            }
        )->withCount([
                'logs as conversion_count' => function ($query) {
                    $query->select(DB::raw('count(*) as conversion_count'))->where('type', 'conversion');
                },
                'logs as impression_count' => function ($query) {
                    $query->select(DB::raw('count(*) as conversion_count'))->where('type', 'impression');
                },
                'logs AS revenue_sum' => function ($query) {
                    $query->select(DB::raw('SUM(revenue) as revenue_sum'));
                },
                'logs AS conversion_min_date' => function ($query) {
                    $query->select(DB::raw('min(time) as conversion_min_date'));
                },
                'logs AS conversion_max_date' => function ($query) {
                    $query->select(DB::raw('max(time) as conversion_max_date'));
                }
            ])->when($search!=null, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('occupation', 'like', "%{$search}%");
            })
            ->get();


        $users = collect($users)->sortBy($sort_by, SORT_REGULAR, $order_by == 'asc' ? true : false)->values()->all();

        return $users;
    }

}
