<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Admin\SiteSetting;
use File;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function siteSetting()
    {
        $setting = SiteSetting::first();
        // dd($setting);
        return view('admin.setting.site_setting', compact('setting'));
    }

    public function updateSiteSetting(Request $request)
    {
        $setting = SiteSetting::find($request->id);

        $setting->phone_one = $request->phone_one;
        $setting->phone_two = $request->phone_two;
        $setting->email = $request->email;
        $setting->company_name = $request->company_name;
        $setting->company_address = $request->company_address;
        $setting->facebook = $request->facebook;
        $setting->youtube = $request->youtube;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;

        $setting->update();

        $notification = array(
            'messege' => 'Update Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function databaseBackup()
    {
        return view('admin.setting.db_backup')->with('files', File::allFiles('storage/app/Laravel'));
    }

    public function databaseBackupNow()
    {
        \Artisan::call('backup:run');

        $notification = array(
            'messege' => 'Database Backup Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteDatabase($getFilename)
    {
        Storage::delete('Laravel/'.$getFilename);

        $notification = array(
            'messege' => 'Successfully Deleted The Backup',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function downloadDatabase($getFilename)
    {
        $path = storage_path('app\Laravel/' . $getFilename);

        return response()->download($path);
    }
    
}
