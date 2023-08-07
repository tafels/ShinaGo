<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TranslationToJSON extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:translation-to-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $file_json = 'main.json';

        $lang_directory = array_diff(scandir(lang_path()), array('..', '.'));
        foreach ($lang_directory as $item_dir){
            $translation = [];
            $lang_file = array_diff(scandir(lang_path($item_dir)), array('..', '.', $file_json));
            foreach ($lang_file as $item_file) {
                $data_array = require_once lang_path($item_dir) . '/'. $item_file;
                $translation = array_merge($translation, $data_array);
            }
            file_put_contents(lang_path($item_dir) . '/' . $file_json, json_encode($translation));
        }
    }
}
