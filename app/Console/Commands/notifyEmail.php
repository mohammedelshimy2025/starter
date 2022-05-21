<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\notify;
use App\User;

class notifyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email every day';

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
     * @return mixed
     */
    public function handle()
    {
      $emails = User::select('email')->get();
      //$emails = User::pluck('email')->toArray();
      $data = ['title' => 'Mohamed Elshimy' , 'body' => 'Software Eng'];
      foreach ($emails as $email){
          Mail::To($email)->send(new notify($data));
      }

    }
}
