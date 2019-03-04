<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\min_wise_details as ms;
use App\programming_division_distribution_dtl;

class min_wise_details
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
    public function handle(ms $event)
    {
        
        foreach ($event->data['ministry_id'] as $key => $value) {
                   $data[]=[
                           'master_id'=>$event->master_id,
                           'ministry_id'=>$value,
                           'amount'=>convertToZiro($event->data['amount'][$key])
                   ];
                }
                programming_division_distribution_dtl::insert($data);
        
    }
}
