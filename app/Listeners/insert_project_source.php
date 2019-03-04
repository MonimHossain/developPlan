<?php

namespace App\Listeners;

use App\Events\project_source;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\approved_project_source_detail;
use App\programming_division_distribution_dtl;

class insert_project_source
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
     * @param  project_source  $event
     * @return void
     */
    public function handle(project_source $event)
    {
       approved_project_source_detail::where('unapprove_project_id',$event->project_id)->delete();
        foreach($event->data['source'] as $key=>$value)
        {
            $data[]=[
            'unapprove_project_id'=>$event->project_id,
            'finanacing_source'=>$value,
            'amount'=>$event->data['amount'][$key],
            'created_by'=>auth()->id(),
            'updated_by'=>auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        }
        approved_project_source_detail::insert($data);

      

    }
}
