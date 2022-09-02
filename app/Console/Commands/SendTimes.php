<?php

namespace App\Console\Commands;

use App\Http\Controllers\TestController;
use Illuminate\Console\Command;

class SendTimes extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'times:send';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Send orders times';

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
    $testController->avg();
    return 0;
  }
}
