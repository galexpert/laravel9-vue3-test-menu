<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClearAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Clears Cache All';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

      $this->call('cache:clear');
      $this->call('config:clear');
      $this->call('optimize:clear');
      $this->call('route:clear');
      $this->call('view:clear');

      //  $delimiter = $this->choice('Choise delimiter', [',', ';']);

    /*    $variant = $this->choice('Варіант пошуку дублікатів', ['По всім полям разом AND', 'По кожному полю OR']);

        $file_path = storage_path('app/data.csv');

        if (!file_exists($file_path) || !is_readable($file_path)){

            $this->error('file not found');
            return FALSE;
        }
        $file = fopen($file_path, "r");

        $all_data = array();

        while ( ($row = fgetcsv($file, 100000000, ";")) !==FALSE) {
            $all_data[] = $row;
        }
        array_shift($all_data);

        $assoc_array = array();
        foreach($all_data as $key => $val) {
            if(count($val) > 1){
                $assoc_array[$key]['name'] = isset($val[0]) ? $val[0] : '';
                $assoc_array[$key]['email'] = isset($val[1]) ? $val[1] : '';
                $assoc_array[$key]['password'] = isset($val[2]) ? $val[2] : '';
            }
        }*/

       /* if($variant == 'По всім полям разом AND'){
            // 1 вариант забираем дублікати у всіх полях зразу
            $ProductsArray= array_map("unserialize", array_unique( array_map("serialize", $assoc_array) ));
            dump($ProductsArray);
            $this->info('Вибрано унікальних рядів: '. count($ProductsArray));


            // 2 вариант забираем дублікати у всіх полях працює як вар 1
           // $ProductsArrayVar2 = array_unique($all_data, SORT_REGULAR);

            if ($this->confirm('Записати в базу данних', true)) {
                //
                  $users = $this->withProgressBar($ProductsArray, function ($user) {

                      DB::connection()->enableQueryLog();
                      $result = User::where('email', $user['email'])->orWhere('name', $user['name'])->first();
                      print_r($queries = DB::getQueryLog());

                          if(!$result){
                              User::create($user);
                          }

        });

            }

        }else{

            if (true){
                $column_arr = ['name', 'email', 'password'];

                $temp = array();

                foreach($column_arr as $k => $column) {
                    if($k == 0){
                        $temp[$k] =   $this->unique_multidim_array($assoc_array, $column);
                    } elseif ($k == 1) {
                        echo  '$k='.$k;
                        $temp[$k] =   $this->unique_multidim_array($temp[$k-1], $column);
                    } elseif ($k == 2) {
                        if(isset($temp[$k-1])){
                            $temp =   $this->unique_multidim_array($temp[$k-1], $column);
                        }
                    }
                }
                if(count($temp) > 0 ){

                    $this->info('Вибрано унікальних рядів: '. count($temp));


                    if ($this->confirm('Записати в базу даних?', true)) {
                        $users = $this->withProgressBar($temp, function ($user) {
                            //DB::connection()->enableQueryLog();
                            $result = User::where('email', $user['email'])->orWhere('name', $user['name'])->first();
                            //print_r($queries = DB::getQueryLog());

                            if(!$result){
                                User::create($user);
                            }
                        });
                    }

                }

            }


        }*/



        // $column = $this->ask('enter column name where to remove duplicates: id, name, phone');
       // $this->info('column:'.$column);

     //   dump($column);


       /* $this->table(
            ['Name', 'Email'],
            User::all(['name', 'email'])->toArray()
        );*/

      /*  $users = $this->withProgressBar(User::all(), function ($user) {
           // $this->performTask($user); так працює!!!
        });*/

  /*      $users = User::all();
        $bar = $this->output->createProgressBar(count($users));

        $bar->start();

        foreach ($users as $user) {
          //  $this->performTask($user);
            $this->info('user:'.$user->name .':'. $user->email);

            $bar->advance();
        }

        $bar->finish();*/

       // return Command::SUCCESS;
    }

  public  function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

}
