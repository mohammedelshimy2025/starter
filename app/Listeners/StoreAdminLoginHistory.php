<?php

namespace App\Listeners;

use App\Events\AdminLoginHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class StoreAdminLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AdminLoginHistory $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $userinfo = $event ->writer;

        $saveHistory = DB::table('admin_history')->insert([
            'name' => $userinfo->name,
            'email' => $userinfo->email,
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp

        ]);

        return $saveHistory;
    }
}
