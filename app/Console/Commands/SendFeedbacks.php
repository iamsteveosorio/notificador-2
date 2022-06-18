<?php

namespace App\Console\Commands;

use App\Http\Controllers\OrdersController;
use Illuminate\Console\Command;

class SendFeedbacks extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'feedbacks:send';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Send campaing feedbacks after turnero';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    // $calls_controller = new OrdersController;
    // $calls_controller::send_feedbacks($type);
    return 0;
  }
}
