<?php

namespace App\Console\Commands;

use App\Http\Controllers\TestController;
use Illuminate\Console\Command;

class GetSales extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'sales:get';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Get sales from siesa';

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
    $testController = new TestController;
    $testController::get_siesa();
    return 0;
  }
}
