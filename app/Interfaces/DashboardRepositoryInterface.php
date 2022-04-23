<?php

namespace App\Interfaces;

interface DashboardRepositoryInterface
{
    public function getChartData();
    public function getUserData($request);

}
