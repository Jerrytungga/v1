<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Itemjurnal;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class Item_JurnalController extends Controller
{
    //
    public function index()
    {
        $jurnal = Itemjurnal::all();
        $itemMenu = MenuItem::all();
        return view('Admin.content.view_Jurnal.index', [
            "title" => "jurnal",
            "jurnal" => $jurnal,
            "itemMenu" => $itemMenu,
        ]);
    }

    public function Inactive($id)
    {
        // Cari pesan berdasarkan ID
        $Inactive = Itemjurnal::findOrFail($id);

        // Perbarui status pesan menjadi 'inactive'
        $Inactive->status = 'inactive';
        $Inactive->save();  // Simpan perubahan

        // Redirect kembali dengan pesan sukses
        return redirect()->route('item.jurnal')->with('success', 'Successfully deactivated!');
    }
    public function Active($id)
    {
        // Cari pesan berdasarkan ID
        $Active = Itemjurnal::findOrFail($id);

        // Perbarui status pesan menjadi 'inactive'
        $Active->status = 'active';
        $Active->save();  // Simpan perubahan

        // Redirect kembali dengan pesan sukses
        return redirect()->route('item.jurnal')->with('success', 'Successfully activated!');
    }
    
    public function Inactive_Menu($id)
    {
        // Cari pesan berdasarkan ID
        $MenuItem = MenuItem::findOrFail($id);

        // Perbarui status pesan menjadi 'inactive'
        $MenuItem->status = 'inactive';
        $MenuItem->save();  // Simpan perubahan

        // Redirect kembali dengan pesan sukses
        return redirect()->route('item.jurnal')->with('success', 'Successfully deactivated!');
    }
    public function Active_Menu($id)
    {
        // Cari pesan berdasarkan ID
        $ActiveMenuItem = MenuItem::findOrFail($id);

        // Perbarui status pesan menjadi 'inactive'
        $ActiveMenuItem->status = 'active';
        $ActiveMenuItem->save();  // Simpan perubahan

        // Redirect kembali dengan pesan sukses
        return redirect()->route('item.jurnal')->with('success', 'Successfully activated!');
    }
}
