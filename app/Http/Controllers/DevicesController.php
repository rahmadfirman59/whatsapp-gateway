<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\DevicesControllerInterfaces;
use Illuminate\Http\Request;

class DevicesController extends Controller implements DevicesControllerInterfaces
{

    function listIt($path) {
        $items = scandir($path);


        $juml = 0;
        $session = array();

        foreach($items as $item) {
            // Ignore the . and .. folders
            if($item != "." AND $item != "..") {

                if (is_file($path . $item)) {
                    // this is the file
//                    echo "-> xxxxxxx" . $item . "<br>";
                } else {

                    $session['name'] = $item;
//                    echo "---> " . $item;
//                    echo "<div style='padding-left: 10px'>";
                    $this->listIt($path . $item . "/");
//                    echo "</div>";
                }
            }
//            $count++;
        }

        return $session;
    }

    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir")
                       $this->rrmdir($dir."/".$object);
                    else unlink   ($dir."/".$object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $path = base_path().'/server/wa_credentials/';

        $data = $this->listIt($path);

        return view('device.index')
            ->with('data',$data);
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function remove()
    {
        $path = base_path().'/server/wa_credentials/mysession_credentials';
        $this->rrmdir($path);
        $message = array('type' => "success", 'content' => "Devices Berhasil dihapus");
        return redirect()->route('devices')
            ->with('message', $message);
    }
}
