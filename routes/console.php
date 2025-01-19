<?php

use Illuminate\Support\Facades\Schedule;
use App\Jobs\ChangeWordDailyJob;

Schedule::job(new ChangeWordDailyJob)->daily();
