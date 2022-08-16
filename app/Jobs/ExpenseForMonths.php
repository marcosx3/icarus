<?php

namespace App\Jobs;

use App\Repositories\ExpenseRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExpenseForMonths implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected ExpenseRepository $expe;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $data)
    {
       $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
     $this->expe->create( $this->data);
       sleep(1);
    }

}
